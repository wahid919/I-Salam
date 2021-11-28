<?php

require_once 'Custom.php';
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'ISALAM',
    'timeZone' => 'Asia/Jakarta',
    'language' => 'id_ID',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'reCaptcha' => [
            'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            'siteKeyV2' => 'your siteKey v2',
            'secretV2' => 'your secret key v2',
            'siteKeyV3' => '6LcyvGQdAAAAACirnhRzfPQZMeUSA-D7kPzkemcw',
            'secretV3' => '6LcyvGQdAAAAAO0jnH15hnIV0qQV06wAUUKevkuK',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'secret',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'formatter' => [
            'class' => \app\formatter\CustomFormatter::class,
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'en',
                    'fileMap'        => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],
        /*        'mailer' => [
             'class' => 'yii\swiftmailer\Mailer',
             'useFileTransport' => false,
             'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.gmail.com',
                    'username' => 'ds.popcafe@gmail.com',
                    'password' => 'dspopcafe',
                    'port' => '587',
                    'encryption' => 'tls'
             ],
         ],
*/
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'Inisiatorsalam@gmail.com',
                'password' => 'Adminsalam701',
                'port' => '587',
                'encryption' => 'tls'
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => array(

                //User
                'user/login' => '/user/login',
                'user/register' => '/user/register',
                'user/check-otp' => '/user/check-otp',
                'user/refresh-otp' => '/user/refresh-otp',


                //pembayaran
                'marketing-data-user/all' => '/marketing-data-user/all',
                'marketing-data-user/validate-pendanaan' => '/marketing/validate-pendanaan',

                //bank
                'bank/all' => '/bank/all',

                //pendanaan

                // 'pendanaan/show-pendanaan/<id:[\w\_\-]+>/<id:\d+>' => 'pendanaan/show-pendanaan',

                'pendanaan/show-pendanaan/<unique_id:[\w\_\-]+>' => 'pendanaan/show-pendanaan',

                'pendanaan/approve-pendanaan' => 'pendanaan/approve-pendanaan',
                'pendanaan/pendanaan-cair' => 'pendanaan/pendanaan-cair',
                'pendanaan/pendanaan-selesai' => 'pendanaan/pendanaan-selesai',
                'pendanaan/pendanaan-tolak' => 'pendanaan/pendanaan-tolak',
                'pendanaan/pendanaan-batal' => 'pendanaan/pendanaan-batal',
                'pendanaan/pendanaan-diterima' => 'pendanaan/pendanaan-diterima',
                'pendanaan/pendanan-wakaf/<unique_id:[\w\_\-]+>' => 'pendanaan/pendanan-wakaf',
                // 'pendanaan/all' => '/pendanaan/all',


                'program' => 'home/program',
                'news' => 'home/news',
                'about' => 'home/about',
                'detail-berita' => 'home/detail-berita',
                'unduh-file-uraian' => 'home/unduh-file-uraian',
                'registrasi' => 'home/registrasi',

                //pembayaran
                'pembayaran/all' => '/pembayaran/all',
                'pembayaran/bayar' => 'pembayaran/bayar',
                'pembayaran/wakaf' => 'pembayaran/wakaf',
                'pembayaran/upload-file' => 'pembayaran/upload-file',
                'pembayaran/informasi/<unique_id:[\w\_\-]+>' => 'pembayaran/informasi',
                'pembayaran/detail-wakaf/<unique_id:[\w\_\-]+>' => 'pembayaran/detail-wakaf',

                //kategori pendanaans
                // 'kategori-pendanaan/all' => 'kategori-pendanaan/all',

                //agenda-pendanaan
                'agenda-pendanaan/all' => 'agenda-pendanaan/all',
                'agenda-pendanaan/add-agenda' => 'agenda-pendanaan/add-agenda',
                'agenda-pendanaan/deleted' => 'agenda-pendanaan/deleted',
                'agenda-pendanaan/by-pendanaan/<unique_id:[\w\_\-]+>' => 'agenda-pendanaan/by-pendanaan',

                //pencairan
                'pencairan/all' => 'pencairan/all',
                'pencairan/add-pencairan' => 'pencairan/add-pencairan',


                //partner-pendanaan
                'partner-pendanaan/all' => 'partner-pendanaan/all',
                'partner-pendanaan/add-partner' => 'partner-pendanaan/add-partner',
                'partner-pendanaan/deleted' => 'partner-pendanaan/deleted',
                'partner-pendanaan/by-pendanaan/<unique_id:[\w\_\-]+>' => 'partner-pendanaan/by-pendanaan',


                //notifikasi
                'notifikasi/all' => 'notifikasi/all',
                'notifikasi/detail/<unique_id:[\w\_\-]+>' => 'notifikasi/detail',

                // 
                '<controller:[\w\_\-]+>/<id:\d+>' => '<controller>/view',
                '<controller:[\w\_\-]+>/<action:[\w\_\-]+>/<id:\d+>' => '<controller>/<action>',
                '<controller:[\w\_\-]+>/<action:[\w\_\-]+>' => '<controller>/<action>',
            ),
        ],
        /*
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        */
        'db' => require(__DIR__ . '/db.php'),
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'datecontrol' =>  [
            'class' => '\kartik\datecontrol\Module'
        ]
    ],
    'params' => $params,
    'defaultRoute' => "home",
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
