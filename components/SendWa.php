<?php

namespace app\components;

use Throwable;
use Yii;

trait SendWa
{
    public static function send($no_wa, $content, $img = null)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://wa-api.ptpromedia.co.id:8178/send-message',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => array('number' => $no_wa,'message' => $content,'tokens' => 'UFQuIFByb21lZGlhIENpdHJhIEluZm9ybWF0aW5kbw=='),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
    }
}
