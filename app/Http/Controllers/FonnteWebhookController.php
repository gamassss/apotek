<?php

namespace App\Http\Controllers;

use App\Events\IncomingMessageEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        $text = $data['text'];
        $member = $data['member'];
        $name = $data['name'];
        $location = $data['location'];
        $url = $data['url'];
        $filename = $data['filename'];
        $extension = $data['extension'];

        $reply_message = 'hi ' . $name . ' your message is ' . $message;

        DB::table('chats')->insert([
            'text' => $message,
            'pengirim' => $sender,
            'penerima' => $device,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        broadcast(new IncomingMessageEvent($sender));
        broadcast(new IncomingMessageEvent());
    }

    public function update_message_status()
    {
        // sleep(20);
        header('Content-Type: application/json; charset=utf-8');

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $device = $data['device'];
        // $id = $data['id']; //cause error idk
        $stateid = $data['stateid'];
        // $status = $data['status']; //cause error too
        $state = $data['state'];

        if (isset($data['id'])) {
            $id = $data['id'];
        }

        if (isset($data['status'])) {
            $status = $data['status'];
        }

        if (isset($status) && isset($id)) { // first call
            $results = DB::select("
                SELECT *
                FROM chats
                WHERE JSON_UNQUOTE(JSON_EXTRACT(res_detail, '$.id[0]')) = '" . $id . "'
            ");

            $chat = collect($results)->first();

            $resDetail = json_decode($chat->res_detail, true);
            $resDetail['status'] = $status;
            $resDetailEncoded = json_encode($resDetail);

            DB::table('chats')
                ->where('id', $chat->id)
                ->update([
                    'state' => $state,
                    'res_detail' => $resDetailEncoded,
                    'state_id' => $stateid,
                ]);

        } else if (!isset($stateid) && isset($id)) {
            $results = DB::select("
                SELECT *
                FROM chats
                WHERE JSON_UNQUOTE(JSON_EXTRACT(res_detail, '$.id[0]')) = '" . $id . "'
            ");

            $chat = collect($results)->first();

            $resDetail = json_decode($chat->res_detail, true);
            $resDetail['status'] = $status;
            $resDetailEncoded = json_encode($resDetail);

            DB::table('chats')
                ->where('id', $chat->id)
                ->update([
                    'res_detail' => $resDetailEncoded,
                ]);
        } else { // second call
            $chat = DB::table('chats')
                ->where('state_id', $stateid)
                ->first();

            if ($chat) {
                DB::table('chats')
                    ->where('id', $chat->id)
                    ->update(['state' => $state]);
            }
        }
    }

    public function get_update_message_status()
    {

    }
}
