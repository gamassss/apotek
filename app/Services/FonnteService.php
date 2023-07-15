<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FonnteService
{

    const device = '6288806388458';
    
    public function send_fonnte($message, $no_telpon)
    {
        $csrfToken = csrf_token();

        $promise = Http::async()->withHeaders([
            'Authorization' => 'CYhTCDEaLNWB2z4cjnu+',
        ])->post('https://api.fonnte.com/send', [
            'target' => $no_telpon,
            'message' => $message,
            'url' => 'https://md.fonnte.com/images/wa-logo.png',
            'filename' => 'filename',
            'schedule' => '0',
            'delay' => '2',
            'countryCode' => '62',
            '_token' => $csrfToken,
        ]);
        
        return $promise->wait();
    }

}
