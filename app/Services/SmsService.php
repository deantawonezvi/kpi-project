<?php


namespace App\Services;
use GuzzleHttp;


class SmsService
{
    public static function sendSMSOtp($mobile, $message){

        $headers = array(
            'Accept'        => 'application/json',
            'Authorization' => 'Basic R1RCVUNLUzE6R2V0YnVja3MyMDE4ISM=',
        );
        $client = new GuzzleHttp\Client(['verify'  => false,
                                         'headers' => $headers]);

        $request_data = array('from' => 'InfoSMS (KPI)',
                              'to'   => $mobile,
                              'text' => $message);

        $res = $client->post('https://api.infobip.com/sms/1/text/single', ['json' => $request_data]);

        return json_decode($res->getBody()->getContents());


    }


}
