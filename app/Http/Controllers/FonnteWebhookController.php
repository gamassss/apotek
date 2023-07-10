<?php

namespace App\Http\Controllers;

use App\Events\IncomingMessageEvent;
use App\Events\MessageDeliveredEvent;
use App\Events\MessageReadEvent;
use App\Events\MessageSentEvent;
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

        if (isset($status) && isset($id)) { // first call set status to sent
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

            broadcast(new MessageSentEvent($id)); // send broadcast that msg with $id is sent

        } else if (!isset($stateid) && isset($id)) { // third call set state to read
            $results = DB::select("
                SELECT *
                FROM chats
                WHERE JSON_UNQUOTE(JSON_EXTRACT(res_detail, '$.id[0]')) = '" . $id . "'
            ");

            $chat = collect($results)->first();

            $fonnte_chat_id = json_decode($chat->res_detail, true)['id'][0] ?? '';

            $resDetail = json_decode($chat->res_detail, true);
            $resDetail['status'] = $status;
            $resDetailEncoded = json_encode($resDetail);

            DB::table('chats')
                ->where('id', $chat->id)
                ->update([
                    'res_detail' => $resDetailEncoded,
                ]);

            broadcast(new MessageReadEvent($fonnte_chat_id));

        } else { // second call set state to delivered
            $chat = DB::table('chats')
                ->where('state_id', $stateid)
                ->first();

            if ($chat) {
                DB::table('chats')
                    ->where('id', $chat->id)
                    ->update(['state' => $state]);
                $fonnte_chat_id = json_decode($chat->res_detail, true)['id'][0] ?? '';

                if ($state == 'delivered') {
                    broadcast(new MessageDeliveredEvent($fonnte_chat_id)); // send broadcast that msg with $id is sent
                } else if ($state == 'read') {
                    broadcast(new MessageReadEvent($fonnte_chat_id));

                    $previous_chats = DB::table('chats')
                        ->where('id', '<', $chat->id)
                        ->where(function ($query) {
                            $query->where('state', 'delivered')
                                ->orWhere('state', 'sent');
                        })
                        ->get();

                    if ($previous_chats->isNotEmpty()) {
                        foreach ($previous_chats as $previous_chat) {
                            DB::table('chats')
                                ->where('id', $previous_chat->id)
                                ->update(['state' => 'read']);
                            // $res_detail = $previous_chat->res_detail;

                            $fonnte_chat_id = json_decode($previous_chat->res_detail, true)['id'][0] ?? '';
                            broadcast(new MessageReadEvent($fonnte_chat_id));
                        }
                    }
                }

            }
        }
    }

    public function get_update_message_status()
    {

    }
}
