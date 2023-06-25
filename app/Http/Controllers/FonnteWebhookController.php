<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Services\FonnteService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FonnteWebhookController extends Controller
{
    public function getReplyMessage()
    {

    }

    public function postReplyMessage()
    {
        header('Content-Type: application/json; charset=utf-8');

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $device = $data['device'];
        $sender = $data['sender'];
        $message = $data['message'];
        $text = $data['text']; //button text
        $member = $data['member']; //group member who send the message
        $name = $data['name'];
        $location = $data['location'];
        //data below will only received by device with all feature package
        //start
        $url = $data['url'];
        $filename = $data['filename'];
        $extension = $data['extension'];
        //end

        $reply_message = 'hi ' . $name . ' your message is ' . $message;

        
        $fonnte = new FonnteService();
        
        $response = $fonnte->send_fonnte($reply_message, $sender);
        DB::table('chats')->insert([
            'text' => $message,
            'pengirim' => $sender,
            'penerima' => $device,
            'res_detail' => $response,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
