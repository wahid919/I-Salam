<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "PembayaranController".
 */

use app\components\ActionSendFcm;
use app\models\Pembayaran;
use app\models\Pendanaan;
use app\models\JenisPembayaran;
use app\models\Pencairan;
use app\models\User;
use Midtrans\ActionMidtrans;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

use function igorw\retry;

class PembayaranController extends \yii\rest\ActiveController
{
    use \app\components\UploadFile;
    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent['authentication'] = [
            "class" => "\app\components\CustomAuth",
            "only" => ["bayar", "wakaf", "detail-wakaf", "status-midtrans","list-pewakaf"],
        ];

        return $parent;
    }

    protected function verbs()
    {
        return [
            'bayar' => ['POST'],
            'mid' => ['POST'],
            'upload-file' => ['POST'],
            'informasi' => ['GET'],
            'detail-wakaf' => ['GET'],
            'status-midtrans' => ['GET'],
            'wakaf' => ['GET'],
            'pewakaf' => ['GET'],
            'list-pewakaf' => ['GET'],
        ];
    }

    public $modelClass = 'app\models\Pembayaran';

    public function actionWakaf()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $wf = Pembayaran::find()->where(['user_id' => \Yii::$app->user->identity->id])->all();
        if ($wf != null) {
            if (\Yii::$app->user->identity->role_id == 2) {

                $wa = Pembayaran::find()->all();
                return [
                    "success" => true,
                    "message" => "Data Wakaf All ",
                    "data" => $wa,
                ];
            } else {

                return [
                    "success" => true,
                    "message" => "Wakaf ",
                    "data" => $wf,
                ];
            }
        } else {
            return [
                "success" => false,
                "message" => "Anda Belum Pernah melakukan Wakaf",
                "data" => null,
            ];
        }
    }
    public function actionDetailWakaf($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $wf = Pembayaran::find()->where(['id' => $id])->one();
        if ($wf != null) {
            if ($wf->user_id != \Yii::$app->user->identity->id) {
                return [
                    "success" => true,
                    "message" => "Mohon Maaf Data Tidak ditemukan",
                    "data" => null,
                ];
            } else {
                $a = $this->findMidtransProduction($wf->kode_transaksi);

                if($a->status_code == "404"){
                     $wf->status_id = 5;
                }else{
                    if($a->transaction_status == "pending"){
                         $wf->status_id = 5;
                    }elseif($a->transaction_status == "capture" || $a->transaction_status == "settlement" ){
                         $wf->status_id = 6;
                         $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
                    }elseif($a->transaction_status == "deny" || $a->transaction_status == "cancel" || $a->transaction_status == "expire" ){
                         $wf->status_id = 8;
                         $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
                    }
                }

                if($a->status_code == "404"){
                     $wf->jenis_pembayaran_id ="Tidak Ditemukan";
                }else{
                    if($a->payment_type == "cstore"){
                         $wf->jenis_pembayaran_id = $a->store;
                    }else{
                         $wf->jenis_pembayaran_id = $a->payment_type;
                    }
                }
                $wf->save();
                $hasil  = 'https://app.midtrans.com/snap/v2/vtweb/'.$wf->code;
                return [
                    "success" => true,
                    "message" => "Wakaf ",
                    "data" => $wf,
                    "code" => $wf->code,
                    "url" => $hasil,
                ];
            }
        } else {
            return [
                "success" => false,
                "message" => "Data Wakaf Tidak Ditemukan",
                "data" => null,
            ];
        }
    }

    public function actionPewakaf()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $wfs = Pembayaran::find()->where(['read' => 0])->all();
        if ($wfs != null) {
                foreach($wfs as $wf){
                    $a = $this->findMidtransProduction($wf->kode_transaksi);
    
                    if($a->status_code == "404"){
                         $wf->status_id = 5;
                         $wf->read = 1;
                         $msg = "Data Transaksi Tidak Ditemukan";
                    }else{
                        if($a->transaction_status == "pending"){
                             $wf->status_id = 5;
                             $msg = "Anda Belum Melakukan Pembayaran";
                        }elseif($a->transaction_status == "capture" || $a->transaction_status == "settlement" ){
                             $wf->status_id = 6;
                             $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
                             $msg = "Pembayaran Berhasil";
                             $wf->read = 1;
                        }elseif($a->transaction_status == "deny" || $a->transaction_status == "cancel" || $a->transaction_status == "expire" ){
                             $wf->status_id = 8;
                             $wf->tanggal_konfirmasi = date('Y-m-d H:i:s');
                             $msg = "Pembayaran Gagal";
                             $wf->read = 1;
                             
                        }
                    }
    
                    if($a->status_code == "404"){
                         $wf->jenis_pembayaran_id ="Tidak Ditemukan";
                    }else{
                        if($a->payment_type == "cstore"){
                             $wf->jenis_pembayaran_id = $a->store;
                        }else{
                             $wf->jenis_pembayaran_id = $a->payment_type;
                        }
                    }   
                    if($wf->save()){
                        $user = User::findOne(['id'=>$wf->user_id]);
                        if($user->fcm_token != ""){
                            ActionSendFcm::getMessage($user->fcm_token,"Pembayaran",$wf->id,"Status Pembayaran",$msg);
                        }
                        return [
                            "success" => true,
                            "message" => "Berhasil Ganti Status Pembayaran",
                            "data" => $wf,
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
    }

    public function actionBayar()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $model = new Pembayaran();

        $order_id_midtrans = rand();
        $model->pendanaan_id = $val['pendanaan_id'];
        // $model->kode_transaksi = Yii::$app->security->generateRandomString(10) . date('dmYHis');
        $model->kode_transaksi = $order_id_midtrans;
        
        $transaction_details = array(
            'order_id' => $order_id_midtrans,
            'gross_amount' => 10000, // no decimal allowed for creditcard
        );


        $pendanaan = \app\models\Pendanaan::find()
            ->where(['id' => $val['pendanaan_id']])->one();
        $model->nama = $val['nama'];
        if ($val['lembaran'] != 0) {


            $model->jumlah_lembaran = (int)$val['lembaran'];
            $total = (int)$pendanaan->nominal_lembaran * (int)$val['lembaran'];
            $model->nominal = (int)$total;
            // Optional
            $item1_details = array(
                'id' => '1',
                'price' => (int)$pendanaan->nominal_lembaran,
                'quantity' => (int)$val['lembaran'],
                'name' => $pendanaan->nama_pendanaan . "(Lembaran)"
            );
        } else {
            if ($val['nominal'] == NULL) {
                return ['success' => false, 'message' => 'Silahkan Isi nominal yang akan anda masukkan,nominal anda masih 0.'];
            } else {

                $model->jumlah_lembaran = 0;
                $model->nominal = $val['nominal'];

                // Optional
                $item1_details = array(
                    'id' => '1',
                    'price' => $val['nominal'],
                    'quantity' => 1,
                    'name' => $pendanaan->nama_pendanaan . "(Non Lembaran)"
                );
            }
        }
        $model->jenis_pembayaran_id = $val['jenis_pembayaran_id'] ?? '';
        $model->user_id = \Yii::$app->user->identity->id;
        $model->status_id = 5;
        $model->jenis ="wakaf";
        // $model->tanggal_pembayaran = date('Y-m-d');
        $bukti_transaksis = UploadedFile::getInstanceByName('bukti_transaksi');

        $shipping_address = array(
            'first_name'    => $pendanaan->nama_nasabah,
            'last_name'     => "(" . $pendanaan->nama_perusahaan . ")",
            // 'address'       => "Batu",
            //     'city'          => "Jakarta",
            //     'postal_code'   => "16602",
            //     'phone'         => "081122334455",
            'country_code'  => 'IDN'
        );

        $customer_details = array(
            'first_name'    => \Yii::$app->user->identity->name,
            'last_name'     => "(" . $val['nama'] . ")",
            'email'         => \Yii::$app->user->identity->username,
            'phone'         => \Yii::$app->user->identity->nomor_handphone,
            'billing_address'  => $shipping_address,
            'shipping_address' => $shipping_address
        );

        $hasil_code = \app\components\ActionMidtrans::toReadableOrder($item1_details, $transaction_details, $customer_details);
        $model->code = $hasil_code;
        $hasil = 'https://app.midtrans.com/snap/v2/vtweb/'.$hasil_code;
        if ($model->validate()) {
            $model->save();

            return ['success' => true, 'message' => 'success', 'data' => $model, 'code' => $hasil_code,'url'=>$hasil];
        } else {
            return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
        }




        // unset($model->password);
        // var_dump($bukti_transaksis);
        // die;
        // if ($bukti_transaksis != NULL) {
        //     # store the source bukti_transaksis name
        //     $model->bukti_transaksi = $bukti_transaksis->name;
        //     $arr = explode(".", $bukti_transaksis->name);
        //     $extension = end($arr);

        //     # generate a unique bukti_transaksis name
        //     $model->bukti_transaksi = Yii::$app->security->generateRandomString() . ".{$extension}";

        //     # the path to save bukti_transaksis
        //     // unlink(Yii::getAlias("@app/web/uploads/pengajuan/") . $oldFile);
        //     if (file_exists(Yii::getAlias("@app/web/uploads/pembayaran/bukti_transaksi/")) == false) {
        //         mkdir(Yii::getAlias("@app/web/uploads/pembayaran/bukti_transaksi/"), 0777, true);
        //     }
        //     $path = Yii::getAlias("@app/web/uploads/pembayaran/bukti_transaksi/") . $model->bukti_transaksi;
        //     $bukti_transaksis->saveAs($path);
        // }
    }
    public function actionUploadPembayaran()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $model = Pembayaran::findOne(['id' => $val["id_pembayaran"], 'status_id' => 5]);

        $bukti_transaksis = UploadedFile::getInstanceByName('bukti_transaksi');

        // var_dump($bukti_transaksis);
        // die;
        if ($model != null) {
            if ($bukti_transaksis != NULL) {
                # store the source bukti_transaksis name
                $model->bukti_transaksi = $bukti_transaksis->name;
                $arr = explode(".", $bukti_transaksis->name);
                $extension = end($arr);

                # generate a unique bukti_transaksis name
                $model->bukti_transaksi = Yii::$app->security->generateRandomString() . ".{$extension}";

                # the path to save bukti_transaksis
                // unlink(Yii::getAlias("@app/web/uploads/pengajuan/") . $oldFile);
                if (file_exists(Yii::getAlias("@app/web/uploads/pembayaran/bukti_transaksi/")) == false) {
                    mkdir(Yii::getAlias("@app/web/uploads/pembayaran/bukti_transaksi/"), 0777, true);
                }
                $path = Yii::getAlias("@app/web/uploads/pembayaran/bukti_transaksi/") . $model->bukti_transaksi;
                $bukti_transaksis->saveAs($path);
            }

            $model->tanggal_upload_bukti = date('Y-m-d H:i:s');
            $model->status_id = 10;
            if ($model->validate()) {
                $model->save();

                // unset($model->password);
                return ['success' => true, 'message' => 'success', 'data' => $model];
            } else {
                return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
            }
        } else {
            return ['success' => false, 'message' => 'Data tidak ditemukan', 'data' => null];
        }
    }


    public function actionInformasi($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $jumlah = Pembayaran::find()->where(['pendanaan_id' => $id, 'status_id' => 6])->count();

        $nominal = Pembayaran::find()->where(['pendanaan_id' => $id, 'status_id' => 6])->sum('nominal');
        if ($nominal == null) {
            $nominal = 0;
        }
        $pembayar = Pendanaan::find()->where(['id' => $id])->one();
        $uang_pendanaan = (int)$pembayar->nominal;
        $persen = $nominal / $uang_pendanaan  * 100;
        $cair = Pencairan::findOne(['pendanaan_id' => $id]);

        if ($pembayar->status_id == 3) {
            if ($cair != null) {
                return [
                    "success" => true,
                    "message" => "Pendanaan",
                    "data" => [
                        'selesai' => false,
                        'cair' => true,
                        "data-cair" => $cair,
                        'jumlah' => $jumlah,
                        'nominal' => $nominal,
                        'persen' => $persen,
                    ],
                ];
            } else {
                return [
                    "success" => true,
                    "message" => "Pendanaan",
                    "data" => [
                        'selesai' => false,
                        'cair' => false,
                        "data-cair" => $cair,
                        'jumlah' => $jumlah,
                        'nominal' => $nominal,
                        'persen' => $persen,
                    ],
                ];
            }
        } else {
            if ($pembayar->status_id == 4 || strtotime($pembayar->pendanaan_berakhir) <= date('Y-m-d H:i:s')) {
                if ($cair != null) {
                    return [
                        "success" => true,
                        "message" => "Pendanaan",
                        "data" => [
                            'selesai' => false,
                            'cair' => false,
                            "data-cair" => $cair,
                            'jumlah' => $jumlah,
                            'nominal' => $nominal,
                            'persen' => $persen,
                        ],
                    ];
                }
                return [
                    "success" => true,
                    "message" => "Pendanaan",
                    "data" => [
                        'selesai' => false,
                        'cair' => false,
                        "data-cair" => $cair,
                        'jumlah' => $jumlah,
                        'nominal' => $nominal,
                        'persen' => $persen,
                    ],
                ];
            }
        }
        return [
            "success" => true,
            "message" => "Pendanaan",
            "data" => [
                'selesai' => false,
                'cair' => false,
                "data-cair" => $cair,
                'jumlah' => $jumlah,
                'nominal' => $nominal,
                'persen' => $persen,
            ],
        ];
    }
    public function actionStatusMidtrans($id)
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
                "Authorization: Basic U0ItTWlkLXNlcnZlci1MV1RfNVJHdkhsUk9sSWJtYUU4SzBudGI6"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $a = json_decode($response);
        return $a;
    }

    public function actionMid()
    {
        try {
            $transaction_details = array(
                'order_id' => rand(),
                'gross_amount' => 10000, // no decimal allowed for creditcard
            );

            // Optional
            $item1_details = array(
                'id' => 'a1',
                'price' => 18000,
                'quantity' => 4,
                'name' => "Apple"
            );

            // Optional
            $item2_details = array(
                'id' => 'a2',
                'price' => 20000,
                'quantity' => 4,
                'name' => "Orange"
            );
            // $hasil = \app\components\ActionMidtrans::toReadableOrder($item1_details, $transaction_details);
            // // var_dump($transaction_details);die;
            // return [
            //     "success" => true,
            //     "message" => "Berhasil",
            //     "data" => $hasil,
            // ];
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function actionListPewakaf($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $pembayar =  \app\models\Pembayaran::find()->where(['pendanaan_id'=>$id,'status_id'=>6])->all();
        if ($pembayar != null) {
            

                return [
                    "success" => true,
                    "message" => "Wakaf",
                    "data" => $pembayar,
                ];
            
        } else {
            return [
                "success" => false,
                "message" => "Belum Ada Pewakaf",
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
                "Authorization: Basic U0ItTWlkLXNlcnZlci1MV1RfNVJHdkhsUk9sSWJtYUU4SzBudGI6"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $a = json_decode($response);
        return $a;
    }
    protected function findMidtransProduction($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.midtrans.com/v2/" . $id . "/status",
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
                "Authorization: Basic TWlkLXNlcnZlci1oV3hSekx0a3NmX0s4SUNhY3RjZ0Fwdl86"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $a = json_decode($response);
        return $a;
    }
}
