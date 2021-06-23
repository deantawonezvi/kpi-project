<?php


namespace App\Services;
use GuzzleHttp;
use Illuminate\Support\Facades\Log;


class SmsService
{
    public static function sendSMSOtp($mobile, $message){

        $client = new GuzzleHttp\Client(['verify'  => false]);

        $request_data = array('from' => 'GetBucks',
                              'to'   => $mobile,
                              'text' => $message);

        $res = $client->post('https://api.infobip.com/sms/1/text/single', ['json' => $request_data,'auth' => ['GTBUCKS1', 'Getbucks2018!#']]);
        Log::debug($res->getBody()->getContents());

        return json_decode($res->getBody()->getContents());


    }


}
