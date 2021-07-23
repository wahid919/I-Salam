<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "PembayaranController".
 */

use app\models\Pembayaran;
use app\models\Pendanaan;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

class PembayaranController extends \yii\rest\ActiveController
{
    use \app\components\UploadFile;
    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent['authentication'] = [
            "class" => "\app\components\CustomAuth",
            "only" => ["bayar","wakaf"],
        ];

        return $parent;
    }

    protected function verbs()
    {
        return [
            'bayar' => ['POST'],
            'upload-file' => ['POST'],
            'informasi' => ['GET'],
            'wakaf' => ['GET'],
        ];
    }

    public $modelClass = 'app\models\Pembayaran';

    public function actionWakaf()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $wf = Pembayaran::find()->where(['user_id'=>\Yii::$app->user->identity->id])->all();
       if($wf != null){
           if(\Yii::$app->user->identity->role_id == 2){

            $wa = Pembayaran::find()->all();
            return [
                "success" => true,
                "message" => "Data Wakaf All ",
                "data" =>$wa,
            ];
           }else{

            return [
                "success" => true,
                "message" => "Wakaf ",
                "data" =>$wf,
            ];
           }
       }else{
        return [
            "success" => false,
            "message" => "Anda Belum Pernah melakukan Wakaf",
            "data" =>null,
        ];
       }

    }
    
    public function actionBayar()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $model = new Pembayaran();

        // var_dump($model->nama);
        // die;

        $model->pendanaan_id = $val['pendanaan_id'];
        $model->nama = $val['nama'];
        $model->nominal = $val['nominal'];
        $model->bank = $val['bank'];
        $model->user_id = \Yii::$app->user->identity->id;
        $model->status_id = 5;
        $model->tanggal_pembayaran = date('Y-m-d');
        $bukti_transaksis = UploadedFile::getInstanceByName('bukti_transaksi');

        // var_dump($bukti_transaksis);
        // die;
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
        if ($model->validate()) {
            $model->save();

            // unset($model->password);
            return ['success' => true, 'message' => 'success', 'data' => $model];
        } else {
            return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
        }
    }
    public function actionUploadFile()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $model = Pembayaran::findOne(['id'=>$val["id_pembayaran"],'status_id'=>5]);

        $bukti_transaksis = UploadedFile::getInstanceByName('bukti_transaksi');

        // var_dump($bukti_transaksis);
        // die;
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
        if ($model->validate()) {
            $model->save();

            // unset($model->password);
            return ['success' => true, 'message' => 'success', 'data' => $model];
        } else {
            return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
        }
    }


    public function actionInformasi($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $jumlah = Pembayaran::find()->where(['pendanaan_id'=>$id,'status_id'=>6])->count();
        $nominal = Pembayaran::find()->where(['pendanaan_id'=>$id,'status_id'=>6])->sum('nominal');
        $pembayar = Pendanaan::find()->where(['id'=>$id])->one();
        $uang_pendanaan = (int)$pembayar->nominal;
        $persen = $nominal / $uang_pendanaan  * 100;


        return [
            "success" => true,
            "message" => "Pendanaan",
            "data" => [
                'jumlah' => $jumlah,
                'nominal' => $nominal,
                'persen' => $persen,
            ],
        ];
    }
}
