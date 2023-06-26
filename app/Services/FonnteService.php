<?php

namespace App\Services;

class FonnteService
{

    const device = '088806388436';

    public function send_fonnte($message, $no_telpon)
    {
        $csrfToken = csrf_token();
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $no_telpon,
                'message' => $message,
                'url' => 'https://md.fonnte.com/images/wa-logo.png',
                'filename' => 'filename',
                'schedule' => '0',
                'delay' => '2',
                'countryCode' => '62',
                '_token' => $csrfToken,
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: QI7VDZtc64p4Dg6_EjpX',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}
