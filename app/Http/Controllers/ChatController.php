<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Services\FonnteService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
