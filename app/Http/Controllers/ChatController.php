<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // function untuk test data
    public function index()
    {
        $members_pegawai = Member::where('user_id', Auth::user()->id)->get();

        foreach($members_pegawai as $member) {
            $latest_chat = DB::select('select * from chats
            where pengirim = ' . $member->no_telpon . '
            order by created_at desc limit 1');
            $member['latest_chat'] = $latest_chat;
            // dd($member->latest_chat[0]->text);
        }
        // foreach ($members_pegawai as $member) {
        //     echo $member->nama_member . " " . $member->no_telpon . "<br>";
        //     $chats = Chat::where('pengirim', $member->no_telpon)->get();
        //     // dd($chats);
        //     foreach ($chats as $chat) {
        //         echo $chat->text . " " . $chat->created_at . "<br>";
        //     }
        // }
        return view('chat', compact('members_pegawai'));
    }
}
