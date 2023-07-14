<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Member;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function getResponseTime($id)
    {
        $response_time = [];
        $avg_res_time=0;
        $memberPhone = Member::where('user_id',$id)->select('no_telpon')->get();
       
        foreach ($memberPhone as $key) {
        $chats = Chat::where('pengirim', $key->no_telpon)->orWhere('penerima', $key->no_telpon)->get();
        $chats_count = count($chats);
        foreach ($chats as $index => $chat) {
            if ($chats_count != ($index + 1)) {
                if ($chat->pengirim == $key->no_telpon && $chats[$index + 1]->penerima == $key->no_telpon) {
                    $diff_time = strtotime($chats[$index + 1]->created_at) - strtotime($chat->created_at);
                    array_push($response_time, ($diff_time));
                }
            } else {
                // last chat his
            }
        }
      }
      if (count($response_time)>0) {
        # code...
        $avg_res_time += array_sum($response_time) / count($response_time);
        $duration = Carbon::createFromTimestamp($avg_res_time)->format('H:i');
      }else{
        $duration = 0;
      }
      return $duration;
    }
}
