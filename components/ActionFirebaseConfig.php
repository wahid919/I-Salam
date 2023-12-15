<?php

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FirebaseConfig
{
    public static function getFirebaseConfig()
    {
        return [
            'apiKey' => 'AIzaSyA2k9puWuPoPsbYbMnDPMvRqOHJT6ofJpg',
            'authDomain' => 'i-salam.firebaseapp.com',
            'databaseURL' => 'YOUR_DATABASE_URL',
            'projectId' => 'i-salam.appspot.com',
            'storageBucket' => '926703579629',
            'messagingSenderId' => '926703579629',
            'appId' => '1:926703579629:web:c2c3f31c7259659d3ef7e4',
        ];
    }
}
