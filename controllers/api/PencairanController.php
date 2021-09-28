<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "PencairanController".
 */
use app\models\Pembayaran;
use app\models\Pencairan;
use app\models\Pendanaan;
use app\models\Notifikasi;
use Yii;

class PencairanController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Pencairan';
    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent['authentication'] = [
            "class" => "\app\components\CustomAuth",
            "only" => ["add-pencairan"],
        ];

        return $parent;
    }
    protected function verbs()
    {
        return [
            'all' => ['GET'],
            'add-pencairan' => ['POST'],
            //    'deleted' => ['DELETE'],
        ];
    }
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['view']);
        unset($actions['create']);
        unset($actions['update']);
        unset($actions['delete']);
        return $actions;
    }

    public function actionAll()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $pencairans = Pencairan::find()->all();

        $list_pencairan = [];
        foreach ($pencairans as $pencairan) {
            $list_pencairan[] = $pencairan;
        }

        return [
            "success" => true,
            "message" => "List Pencairan",
            "data" => $list_pencairan,
        ];
    }
    public function actionAddPencairan()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $user = \Yii::$app->user->identity;
        $val = \yii::$app->request->post();
        $model = Pendanaan::findOne(['id' => $val["id_pendanaan"]]);
        try {
            //code...
            if ($user->pin == null) {
                return ['success' => false, 'message' => 'Anda Belum Menambahkan Pin'];
            } else {
                if ($user->pin != $val['pin']) {
                    return ['success' => false, 'message' => 'Pin Salah'];
                } else {
                    $bayar = Pembayaran::find()->where(['pendanaan_id' => $val["id_pendanaan"]])->sum('nominal');
                    $cair = new Pencairan;
                    if ($model->status_id == 4 || strtotime($model->pendanaan_berakhir) <= date('Y-m-d')) {

                        $model->status_id = 3;
                        $cair->pendanaan_id = $val['id_pendanaan'];
                        if (!isset($val['nominal'])) {
                            $cair->nominal = $bayar;
                        } else {
                            if ($bayar < $val['nominal']) {
                                return ['success' => false, 'message' => 'Nominal Melebihi Jumlah yang didapat'];
                            } else {
                                $cair->nominal = $val['nominal'];
                               
                            }
                        }
                        $cair->tanggal = date('Y-m-d');
                            $cair->save();
                            if ($model->save()) {
                                $pembayar = Pembayaran::find()->where(['pendanaan_id'=>$val["id_pendanaan"],'status_id'=>6])->all();
                                foreach($pembayar as $value){
                                   $notifikasi = new Notifikasi;
                                   $tgl = \app\components\Tanggal::toReadableDates(date('Y-m-d'));
                                   $notifikasi->message = "Hai ".$value->nama.",Pendanaan ".$model->nama_pendanaan." Telah di cairkan Pada Tanggal ".$tgl;
                                   $notifikasi->user_id = $value->user_id;
                                   $notifikasi->flag = 1;
                                   $notifikasi->date=date('Y-m-d H:i:s');
                                   $notifikasi->save();
                                }
                                $notifikasi2 = new Notifikasi;
                                $notifikasi2->message = "Pendanaan ".$model->nama_pendanaan." Telah anda Cairkan";
                                $notifikasi2->user_id = $model->user_id;
                                $notifikasi2->flag = 1;
                                $notifikasi2->date=date('Y-m-d H:i:s');
                                $notifikasi2->save();
                                return ['success' => true, 'message' => 'success', 
                                'data' => $cair,
                                'pendanaan' => $model,
                            ];
                            }

                        // return $this->redirect(Url::previous());
                    } else {
                        return ['success' => false, 'message' => 'Pendanaan Telah dicairkan/Belum selesai'];
                    }

                }
            }
        } catch (\Throwable $th) {
            return [
                'success' => false,
                'message' => $th->getMessage(),
            ];
        }
// $model->tanggal_received=date('Y-m-d H:i:s');

    }

    //         public function actionDeleted($id)
    // {
    //     \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    //     $val = \yii::$app->request->post();
    //     $agendas = AgendaPendanaan::findOne(['id'=>$id]);

    //     if($agendas->delete()){

    //     return [
    //         "success" => true,
    //         "message" => "Data Berhasil di hapus",
    //         "data" => $agendas
    //     ];
    //     }  else{

    //     return [
    //         "success" => false,
    //         "message" => "Data gagal terhapus",
    //     ];
    //     }
    // }

}
