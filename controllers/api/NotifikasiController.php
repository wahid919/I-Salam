<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "NotifikasiController".
 */

use Yii;
use app\components\ActionSendFcm;
use yii\web\Response;

use app\models\Pembayaran;
use app\models\User;

use app\models\Notifikasi;
use app\models\Pendanaan;
use LDAP\Result;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class NotifikasiController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent['authentication'] = [
            "class" => "\app\components\CustomAuth",
            "only" => [""],
        ];

        return $parent;
    }

    protected function verbs()
    {
        return [
            'all' => ['GET'],
            'detail' => ['GET'],
            'NotPenggalangan' => ['GET'],
        ];
    }
    public $modelClass = 'app\models\Notifikasi';

    public function actionAll($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // $val = \yii::$app->request->post();
        $wfs = Pembayaran::find()->where(['read' => 0])->all();
        if ($wfs != null) {
            foreach ($wfs as $wf) {
                $a = $this->findMidtrans($wf->kode_transaksi);

                if ($a->status_code == "404") {
                    $wf->status_id = 5;
                    $wf->read = 1;
                    $msg = "Data Transaksi Tidak Ditemukan";
                } else {
                    if ($a->transaction_status == "pending") {
                        $wf->status_id = 5;
                        $msg = "Anda Belum Melakukan Pembayaran";
                    } elseif ($a->transaction_status == "capture" || $a->transaction_status == "settlement") {
                        $wf->status_id = 6;
                        $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
                        $msg = "Pembayaran Berhasil";
                        $wf->read = 1;
                    } elseif ($a->transaction_status == "deny" || $a->transaction_status == "cancel" || $a->transaction_status == "expire") {
                        $wf->status_id = 8;
                        $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
                        $msg = "Pembayaran Gagal";
                        $wf->read = 1;
                    }
                }

                if ($a->status_code == "404") {
                    $wf->jenis_pembayaran_id = "Tidak Ditemukan";
                } else {
                    if ($a->payment_type == "cstore") {
                        $wf->jenis_pembayaran_id = $a->store;
                    } else {
                        $wf->jenis_pembayaran_id = $a->payment_type;
                    }
                }

                if ($wf->save()) {
                    $user = User::findOne(['id' => $id]);
                    if ($user->fcm_token != "") {
                        // ActionSendFcm::getMessages($user->fcm_token, [
                        //     'title' => 'ISALAM PAYMENT',
                        //     'body' => $wf->nama_pendanaan,
                        //     'image' => 'https://img.okezone.com/content/2021/02/14/33/2361702/cerita-maria-ozawa-batal-syuting-menculik-miyabi-di-indonesia-karena-didemo-BUMCIELSk0.jpg'
                        // ], function ($data) {
                        //     return $data;
                        // });
                        ActionSendFcm::getMessage($user->fcm_token, "Pembayaran", $wf->id, "Status Pembayaran", $msg);
                    }
                    return [
                        "success" => true,
                        "message" => "Berhasil Ganti Status Pembayaran",
                        // "pendanaan" => $pendanaan,
                        "data" => $wfs,
                        // "code" => $wf->code,
                        // "url" => $hasil,
                    ];
                }
                // else{
                //     return [
                //         "success" => false,
                //         "message" => "Gagal Ganti Status Pembayaran",
                //         "data" => $wf,
                //         // "code" => $wf->code,
                //         // "url" => $hasil,
                //     ];
                // }
                // $hasil  = 'https://app.midtrans.com/snap/v2/vtweb/'.$wf->code;
            }
        } else {
            return [
                "success" => false,
                "message" => "Data Tidak Ada",
                "data" => null,
            ];
        }
        // Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // // $val = \yii::$app->request->post();
        // $wf = Notifikasi::find()->where(['user_id' => $id])->orderBy(['id' => SORT_DESC])->all();
        // if ($wf != null) {


        //     return [
        //         "success" => true,
        //         "message" => "Notifikasi ",
        //         "data" => $wf,
        //     ];
        // } else {
        //     return [
        //         "success" => false,
        //         "message" => "Tidak Ada Notifikasi",
        //         "data" => null,
        //     ];
        // }
    }

    public function actionNotPenggalangan($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $pendanaan = Pendanaan::find()->where(['id' => $id])->one();
        return [
            "success" => true,
            "message" => "pendanaan getting",
            // "pendanaan" => $pendanaan,
            "data" => $pendanaan,
        ];
    }

    public function actionDetail($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $wf = Notifikasi::find()->where(['id' => $id])->one();
        if ($wf != null) {
            $wf->flag = 0;
            $wf->save();
            return [
                "success" => true,
                "message" => "Notifikasi ",
                "data" => $wf,
            ];
        } else {
            return [
                "success" => false,
                "message" => "Tidak Ada Notifikasi",
                "data" => null,
            ];
        }
    }
    protected function findMidtrans($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $id . "/status",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "\n\n",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Content-Type: application/json",
                "Authorization: Basic U0ItTWlkLXNlcnZlci1ReFc2V2RLNVNVSWpRLUpKck1zdWk4X0E="
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $a = json_decode($response);
        return $a;
    }
}
