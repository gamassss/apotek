<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // function untuk test data
    public function index()
    {
        $members_pegawai = Member::where('user_id', Auth::user()->id)->get();
        foreach ($members_pegawai as $member) {
            echo $member->nama_member . " " . $member->no_telpon . "<br>";
            $chats = Chat::where('pengirim', $member->no_telpon)->get();
            // dd($chats);
            foreach ($chats as $chat) {
                echo $chat->text . " " . $chat->created_at . "<br>";
            }
        }
        return view('chat');
    }
}
