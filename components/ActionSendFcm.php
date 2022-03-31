<?php

namespace app\components;

    class ActionSendFcm
    {
        
        public static function getMessage($token,$type,$id,$title,$body)
        {
            // $show =  $data = json_decode($value);
            $dt = [
                'type' => $type,
                'id' => $id
            ];
            $payload = array(
                'to' => $token,
                'data' => $dt,
                'sound' => 'default',
                'title' => $title,
                'body' => $body,
            );
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://exp.host/--/api/v2/push/send",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($payload),
          CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Accept-Encoding: gzip, deflate",
            "Content-Type: application/json",
            "cache-control: no-cache",
            "host: exp.host"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
            $data = json_decode($response);
            if(!isset($data->type)){
                $data->type = $type;
            }
            if(!isset($data->data->id_berita)){
                $data->data->id_berita = $id;
            }
            // var_dump($data);die;
            // $response["dat"]["id_transaksi"] = $id;
          return $data;
        }
        }        

        public static function getMessages($token, $data, $callback)
        {
            $url = 'https://fcm.googleapis.com/fcm/send';
    
            $msg = array
                (
                'body' => isset($data["body"]) ? $data["body"] : null,
                'title' => isset($data["title"]) ? $data["title"] : null,
                'image' => isset($data["image"]) ? $data["image"] : null,
                'vibrate' => 1,
                'sound' => "default",
                'largeIcon' => 'large_icon',
                'smallIcon' => 'small_icon',
            ); 
    
            if (isset($token)) {
                // var_dump(strtolower(gettype($token)));
                // die;
                if (strtolower(gettype($token)) == "array") {
                    $registration_ids = $token;
                } else {
                    $registration_ids = [$token];
                }
            } else {
                $registration_ids = [];
            }
            // var_dump($registration_ids);
            // die;
    
            if ($registration_ids != []) {
    
                $fields = [
                    'registration_ids' => $registration_ids,
                    'priority' => "high",
                    'notification' => $msg,
                    'data' => $callback($data),
                ];
    
                $headers = array(
                    'Authorization:key = AAAArDnQx_s:APA91bHLe3xp6Vyrgk45r2YoyJzjcrPHcIrZ5X-8g-aiXPiJCAQfj5bQ2tpqH1OPoytEFigKfdV0H7BRpz5KA6K6Kk82LW3mUx-_FSpMqhuzKfTS27p5K7qoDg-6LQR34odko5RkCBWf',
                    'Content-Type: application/json',
                );
    
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                $result = curl_exec($ch);
                if ($result === false) {
                    die('Curl failed: ' . curl_error($ch));
                }
                curl_close($ch);
                return $result;
            }
        }        
        

    }
