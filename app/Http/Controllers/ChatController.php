<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Member;
use App\Services\FonnteService;
use App\Services\MemberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        // chat non member
        if (Auth::user()->username == 'staff') {
            $member_service = new MemberService();
            $exist_phone_number = $member_service->get_members_phone_number();

            $members_pegawai = Chat::whereIn('id', function ($query) use ($exist_phone_number) {
                $query->selectRaw('MAX(id)')
                    ->from('chats')
                    ->whereNotIn('pengirim', $exist_phone_number)
                    ->groupBy('pengirim');
            })
                ->orderBy('created_at', 'DESC')
                ->get();

            foreach ($members_pegawai as $member) {
                $latest_chat = DB::select('select * from chats
                where pengirim = ' . $member->pengirim . '
                order by created_at desc limit 1');
                $member['latest_chat'] = $latest_chat;
            }
            // dd($members_pegawai);
            $chats = [];
            return view('chat', compact('members_pegawai'));
        }

        // chat dengan member
        $members_pegawai = Member::where('user_id', Auth::user()->id)->get();

        foreach ($members_pegawai as $member) {
            $latest_chat = DB::select('select * from chats
            where pengirim = ' . $member->no_telpon . '
            order by created_at desc limit 1');

            if (is_array($latest_chat) && empty($latest_chat)) {
                $member['latest_chat'] = null;
                $latest_pegawai_chat = DB::select('SELECT * FROM chats
                WHERE penerima = ' . $member->no_telpon . '
                ORDER BY id DESC
                LIMIT 1');

                $member['latest_chat'] = $latest_pegawai_chat;

                if (!empty($latest_pegawai_chat)) {
                    $res_detail = json_decode($latest_pegawai_chat[0]->res_detail, true);
                    if ($res_detail['status'] == 'true') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_pegawai_chat[0]->state == 'sent') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_pegawai_chat[0]->state == 'delivered') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_pegawai_chat[0]->state == 'read') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    }
                }
                // dd($member['latest_chat']);
            } else {

                $member['latest_chat'] = $latest_chat;

                if (!empty($latest_chat)) {
                    $latest_chat_id = $latest_chat[0]->id;

                    $newer_chats = DB::select('SELECT * FROM chats
                                WHERE penerima = ' . $member->no_telpon . '
                                AND id > ' . $latest_chat_id . '
                                ORDER BY id DESC
                                LIMIT 1');

                    if (!empty($newer_chats)) {
                        $latest_chat = $newer_chats;
                        $member['latest_chat'] = $latest_chat;

                        $res_detail = json_decode($latest_chat[0]->res_detail, true);
                        if ($res_detail['status'] == 'true') {
                            $latest_chat[0]->text = '<i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                        } else if ($res_detail['status'] == 'sent' && $latest_chat[0]->state == 'sent') {
                            $latest_chat[0]->text = '<i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                        } else if ($res_detail['status'] == 'sent' && $latest_chat[0]->state == 'delivered') {
                            $latest_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                        } else if ($res_detail['status'] == 'sent' && $latest_chat[0]->state == 'read') {
                            $latest_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                        }
                    }
                }
            }

        }
        // dd($members_pegawai);
        $members_pegawai = $members_pegawai->sortByDesc(function ($member) {
            if (isset($member['latest_chat']) && count($member['latest_chat']) > 0) {
                return $member['latest_chat'][0]->created_at;
            } else {
                // Atur tanggal yang sesuai jika 'latest_chat' tidak ada atau kosong
                return null;
            }
        });

        if ($request->ajax()) {
            return view('list_member', compact('members_pegawai'))->render();
        }

        $chats = [];
        return view('chat', compact('members_pegawai', 'chats'));
    }

    public function updateChatList()
    {
        $members_pegawai = Member::where('user_id', Auth::user()->id)->get();

        foreach ($members_pegawai as $member) {
            $latest_chat = DB::select('select * from chats
            where pengirim = ' . $member->no_telpon . '
            order by created_at desc limit 1');

            $member['latest_chat'] = $latest_chat;

            if (!empty($latest_chat)) {
                $latest_chat_id = $latest_chat[0]->id;

                $newer_chats = DB::select('SELECT * FROM chats
                            WHERE penerima = ' . $member->no_telpon . '
                            AND id > ' . $latest_chat_id . '
                            ORDER BY id DESC
                            LIMIT 1');

                if (!empty($newer_chats)) {
                    $latest_chat = $newer_chats;
                    $member['latest_chat'] = $latest_chat;
                    $res_detail = json_decode($latest_chat[0]->res_detail, true);
                    if ($res_detail['status'] == 'true') {
                        $latest_chat[0]->text = '<i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_chat[0]->state == 'sent') {
                        $latest_chat[0]->text = '<i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_chat[0]->state == 'delivered') {
                        $latest_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_chat[0]->state == 'read') {
                        $latest_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i>&nbsp;&nbsp;&nbsp;' . $latest_chat[0]->text;
                    }
                    // dd($member['latest_chat']);
                }
            }

            if (is_array($latest_chat) && empty($latest_chat)) {

                $latest_pegawai_chat = DB::select('SELECT * FROM chats
                WHERE penerima = ' . $member->no_telpon . '
                ORDER BY id DESC
                LIMIT 1');

                $member['latest_chat'] = $latest_pegawai_chat;

                if (!empty($latest_pegawai_chat)) {
                    $res_detail = json_decode($latest_pegawai_chat[0]->res_detail, true);
                    if ($res_detail['status'] == 'true') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-regular fa-clock fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_pegawai_chat[0]->state == 'sent') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-solid fa-check fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_pegawai_chat[0]->state == 'delivered') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: rgba(0, 0, 0, .7);"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    } else if ($res_detail['status'] == 'sent' && $latest_pegawai_chat[0]->state == 'read') {
                        $latest_pegawai_chat[0]->text = '<i class="fa-solid fa-check-double fa-xs" style="color: #3B71CA;"></i>&nbsp;&nbsp;&nbsp;' . $latest_pegawai_chat[0]->text;
                    }
                }
            }
        }

        $members_pegawai = $members_pegawai->sortByDesc(function ($member) {
            if (isset($member['latest_chat']) && count($member['latest_chat']) > 0) {
                return $member['latest_chat'][0]->created_at;
            } else {
                // Atur tanggal yang sesuai jika 'latest_chat' tidak ada atau kosong
                return null;
            }
        });

        $chats = [];

        return view('list_chat', compact('members_pegawai', 'chats'))->render();
    }

    public function updateChatListNonMember()
    {
        $member_service = new MemberService();
        $exist_phone_number = $member_service->get_members_phone_number();

        $members_pegawai = Chat::whereIn('id', function ($query) use ($exist_phone_number) {
            $query->selectRaw('MAX(id)')
                ->from('chats')
                ->whereNotIn('pengirim', $exist_phone_number)
                ->groupBy('pengirim');
        })
            ->orderBy('created_at', 'DESC')
            ->get();

        foreach ($members_pegawai as $member) {
            $member['latest_chat'] = DB::select('select * from chats
            where pengirim = ' . $member->pengirim . '
            order by created_at desc limit 1');
        }

        $chats = [];

        $members_pegawai = $members_pegawai->sortByDesc(function ($member) {
            if (isset($member['latest_chat']) && count($member['latest_chat']) > 0) {
                return $member['latest_chat'][0]->created_at;
            } else {
                // Atur tanggal yang sesuai jika 'latest_chat' tidak ada atau kosong
                return null;
            }
        });

        return view('list_chat_non_member', compact('members_pegawai', 'chats'))->render();
    }

    public function searchChat(Request $request)
    {
        $passed_data = $request->input('value');

        $members_pegawai = Member::where('user_id', Auth::user()->id)
            ->where(function ($query) use ($passed_data) {
                $query->where('nama_member', 'LIKE', '%' . $passed_data . '%')
                    ->orWhereHas('chats', function ($query) use ($passed_data) {
                        $query->where('text', 'LIKE', '%' . $passed_data . '%');
                    })
                    ->orWhereHas('chats_penerima', function ($query) use ($passed_data) {
                        $query->where('text', 'LIKE', '%' . $passed_data . '%');
                    });
            })
            ->get();

        foreach ($members_pegawai as $member) {
            $searched_chat = DB::select('select * from chats
            where pengirim = ' . $member->no_telpon . '
            and text LIKE "%' . $passed_data . '%"
            order by created_at desc limit 1');

            // cek chat pegawai
            if (is_array($searched_chat) && !empty($searched_chat)) {
                $searched_chat = DB::select('select * from chats
                    where penerima = 6287822771121
                    and text LIKE "%' . $passed_data . '%"
                    order by created_at desc limit 1');
                $searched_chat[0]->text = 'You: ' . $searched_chat[0]->text;
                $member['searched_chat'] = $searched_chat;
            } else {
                // jika yang dicari nomor telpom
                $latest_chat = DB::select('select * from chats
                where pengirim = ' . $member->no_telpon . '
                order by created_at desc limit 1');

                $member['latest_chat'] = $latest_chat;
            }

        }
        // dd($members_pegawai);

        $members_pegawai = $members_pegawai->sortByDesc(function ($member) {
            if (isset($member['searched_chat']) && count($member['searched_chat']) > 0) {
                return $member['searched_chat'][0]->created_at;
            } else {
                // Atur tanggal yang sesuai jika 'latest_chat' tidak ada atau kosong
                return null;
            }
        });

        $chats = [];

        return view('list_chat', compact('members_pegawai', 'chats'));
    }

    public function searchChatNonMember(Request $request)
    {
        $passed_data = $request->input('value');
        $member_service = new MemberService();
        $exist_phone_number = $member_service->get_members_phone_number();

        $members_pegawai = Chat::whereIn('id', function ($query) use ($passed_data) {
            $query->selectRaw('MAX(id)')
                ->from('chats')
                ->where('pengirim', 'like', '%' . $passed_data . '%')
                ->orWhere('text', 'like', '%' . $passed_data . '%')
                ->groupBy('pengirim');
        })
            ->get();

        foreach ($members_pegawai as $member) {
            $searched_chat = DB::select('select * from chats
            where pengirim = ' . $member->pengirim . '
            and text LIKE "%' . $passed_data . '%"
            order by created_at desc limit 1');
            // dd($searched_chat);
            // cek chat pegawai
            if (is_array($searched_chat) && !empty($searched_chat)) {
                if ($searched_chat[0]->pengirim == '088806388436') {
                    $searched_chat[0]->text = 'You: ' . $searched_chat[0]->text;
                }
                $member['searched_chat'] = $searched_chat;
            } else {
                // jika yang dicari nomor
                $latest_chat = DB::select('select * from chats
                where pengirim = ' . $member->pengirim . '
                order by created_at desc limit 1');

                $member['latest_chat'] = $latest_chat;
            }

        }

        $members_pegawai = $members_pegawai->sortByDesc(function ($member) {
            if (isset($member['searched_chat']) && count($member['searched_chat']) > 0) {
                return $member['searched_chat'][0]->created_at;
            } else {
                // Atur tanggal yang sesuai jika 'searched_chat' tidak ada atau kosong
                return null;
            }
        });

        // dd($members_pegawai);
        if ($passed_data == '') {
            $members_pegawai = $members_pegawai->filter(function ($member) {
                return $member['pengirim'] !== '088806388436';
            });
        }

        $chats = [];

        return view('list_chat_non_member', compact('members_pegawai', 'chats'));

    }

    public function getNameByPhoneNumber(Request $request)
    {
        $member = Member::where('no_telpon', $request->input('no_telpon'))->first();
        return $member->nama_member;
    }

    public function getChatByPhoneNumber(Request $request)
    {
        if (Auth::user()->username != 'staff') {
            $member = Member::where('no_telpon', $request->input('no_telpon'))->first();
            $chats = Chat::where('pengirim', $member->no_telpon)->orWhere('penerima', $member->no_telpon)->select('text', 'pengirim', 'res_detail', 'state', 'created_at')->get();
            $member_name = $member->nama_member;
            $member_no_telpon = $member->no_telpon;

            return view('layout.room_chat', compact('chats', 'member_name', 'member_no_telpon'))->render();
        } else {
            //  non member chat
            $member_service = new MemberService();
            $exist_phone_number = $member_service->get_members_phone_number();

            $chats = Chat::whereIn('id', function ($query) use ($request, $exist_phone_number) {
                $query->selectRaw('id')
                    ->from('chats')
                    ->groupBy('pengirim');
            })
                ->where('pengirim', $request->input('no_telpon'))
                ->whereNotIn('pengirim', $exist_phone_number)
                ->orWhere(function ($query) use ($request, $exist_phone_number) {
                    $query->where('penerima', $request->input('no_telpon'))
                        ->whereNotIn('penerima', $exist_phone_number);
                })
                ->select('text', 'pengirim', 'res_detail', 'state', 'created_at')
                ->get();

            $member_name = '';
            $member_no_telpon = $request->input('no_telpon');

            return view('layout.room_chat', compact('chats', 'member_name', 'member_no_telpon'))->render();
        }

    }

    public function getChatBoxByPhoneNumber(Request $request)
    {
        if (Auth::user()->username != 'staff') {
            $member = Member::where('no_telpon', $request->input('no_telpon'))->first();
            $chats = Chat::where('pengirim', $member->no_telpon)->orWhere('penerima', $member->no_telpon)->select('text', 'pengirim', 'res_detail', 'state', 'created_at')->get();
            $member_name = $member->nama_member;
            $member_no_telpon = $member->no_telpon;

            return view('layout.chat_box_content', compact('chats', 'member_name', 'member_no_telpon'))->render();
        } else {
            // chat non member
            $member_service = new MemberService();
            $exist_phone_number = $member_service->get_members_phone_number();

            $chats = Chat::whereIn('id', function ($query) use ($request, $exist_phone_number) {
                $query->selectRaw('id')
                    ->from('chats')
                    ->groupBy('pengirim');
            })
                ->where('pengirim', $request->input('no_telpon'))
                ->whereNotIn('pengirim', $exist_phone_number)
                ->orWhere(function ($query) use ($request, $exist_phone_number) {
                    $query->where('penerima', $request->input('no_telpon'))
                        ->whereNotIn('penerima', $exist_phone_number);
                })
                ->select('text', 'pengirim', 'res_detail', 'state', 'created_at')
                ->get();

            $member_name = '';
            $member_no_telpon = $request->input('no_telpon');

            // dd($chats);

            return view('layout.chat_box_content', compact('chats', 'member_name', 'member_no_telpon'))->render();
        }
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $no_telpon = $request->input('no_telpon');
        $fonnte = new FonnteService();

        $response = $fonnte->send_fonnte($message, $no_telpon);

        DB::table('chats')->insert([
            'text' => $message,
            'pengirim' => $fonnte::device,
            'penerima' => $no_telpon,
            'res_detail' => $response->body(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['response' => $response->body(), 'message' => $message]);
    }

}
