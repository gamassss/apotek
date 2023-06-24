<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FonnteService;
use App\Services\RabbitMQService;
use App\Http\Controllers\Controller;

class RabbitMQController extends Controller
{
    public function send_message(Request $request)
    {
        $message = $request->input('message');
        $no_telpon = $request->input('no_telpon');

        $mqService = new RabbitMQService();
        $mqService->publish($message);
        // $this->send_fonte($message);
        $fonnte = new FonnteService();
        $fonnte->send_fonnte($message, $no_telpon); // send to wa
        return view('message');
    }
}
