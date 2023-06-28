<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Member;
use App\Services\FonnteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    // function untuk test data
    public function index(Request $request)
    {
        $members_pegawai = Member::where('user_id', Auth::user()->id)->get();

        foreach ($members_pegawai as $member) {
            $latest_chat = DB::select('select * from chats
            where pengirim = ' . $member->no_telpon . '
            order by created_at desc limit 1');
            $member['latest_chat'] = $latest_chat;
        }

        if ($request->ajax()) {
            return view('list_member', compact('members_pegawai'))->render();
        }

        $chats = [];
        return view('chat', compact('members_pegawai', 'chats'));
    }

    public function searchChat(Request $request)
    {
        $passed_data = $request->input('value');

        // search by nama and chats
        // $members_pegawai = Member::where('user_id', Auth::user()->id)
        //                     ->where('nama_member', $passed_data)
        //                     ->orWhereHas('chats', function ($query) use ($passed_data) {
        //                         $query->where('text', 'LIKE', '%'.$passed_data.'%');
        //                     })
        //                     ->get();
        $members_pegawai = Member::where('user_id', Auth::user()->id)
            ->where(function ($query) use ($passed_data) {
                $query->where('nama_member', 'LIKE', '%' . $passed_data . '%')
                    ->orWhereHas('chats', function ($query) use ($passed_data) {
                        $query->where('text', 'LIKE', '%' . $passed_data . '%');
                    });
            })
            ->get();
        // showed chats
        // foreach ($members_pegawai as $member) {
        //     $showed_chat = DB::select('SELECT * FROM chats WHERE');
        // }
        foreach ($members_pegawai as $member) {
            $searched_chat = DB::select('select * from chats
            where pengirim = ' . $member->no_telpon . '
            and text LIKE "%' . $passed_data . '%"
            order by created_at desc limit 1');
            $member['searched_chat'] = $searched_chat;

            $latest_chat = DB::select('select * from chats
            where pengirim = ' . $member->no_telpon . '
            order by created_at desc limit 1');
            $member['latest_chat'] = $latest_chat;
        }
        // dd($members_pegawai);
        $chats = [];

        return view('list_chat', compact('members_pegawai', 'chats'));
    }

    public function getNameByPhoneNumber(Request $request)
    {
        $member = Member::where('no_telpon', $request->input('no_telpon'))->first();
        return $member->nama_member;
    }

    public function getChatByPhoneNumber(Request $request)
    {
        $member = Member::where('no_telpon', $request->input('no_telpon'))->first();
        $chats = Chat::where('pengirim', $member->no_telpon)->orWhere('penerima', $member->no_telpon)->select('text', 'pengirim', 'created_at')->get();
        $member_name = $member->nama_member;
        $member_no_telpon = $member->no_telpon;

        return view('layout.room_chat', compact('chats', 'member_name', 'member_no_telpon'))->render();
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $no_telpon = $request->input('no_telpon');
        $fonnte = new FonnteService();
        // dd($message, $no_telpon);
        $response = $fonnte->send_fonnte($message, $no_telpon);
        // dd($response);
        DB::table('chats')->insert([
            'text' => $message,
            'pengirim' => $fonnte::device,
            'penerima' => $no_telpon,
            'res_detail' => $response,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['response' => json_decode($response), 'message' => $message]);
    }

    public function getResponseTime()
    {
        $response_time = [];
        $chats = Chat::where('pengirim', '6282232763556')->orWhere('penerima', '6282232763556')->get();
        $chats_count = count($chats);
        foreach ($chats as $index => $chat) {
            if ($chats_count != ($index + 1)) {
                if ($chat->pengirim == '6282232763556' && $chats[$index + 1]->penerima == '6282232763556') {
                    $diff_time = strtotime($chats[$index + 1]->created_at) - strtotime($chat->created_at);
                    array_push($response_time, ($diff_time));
                }
            } else {
                // last chat his
            }
        }
        $avg_res_time = array_sum($response_time) / count($response_time);
        dd($avg_res_time);
        // return $chats;
    }
}
