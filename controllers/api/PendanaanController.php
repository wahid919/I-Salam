<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "PendanaanController".
*/
use Yii;
use app\models\Pendanaan;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use app\components\Constant;
use app\components\SSOToken;
use app\models\MarketingDataUser;
use yii\web\HttpException;

class PendanaanController extends \yii\rest\ActiveController
{
    
    use \app\components\UploadFile;
public $modelClass = 'app\models\Pendanaan';

public function behaviors(){
    $parent = parent::behaviors();
    $parent['authentication'] = [
        "class" => "\app\components\CustomAuth",
        "only" => ["add-pendanaan","draf-pendanaan",],
    ];

    return $parent;
}

protected function verbs()
    {
       return [
           'all' => ['GET'],
           'show-pendanaan' => ['GET'],
           'add-pendanaan' => ['POST'],
           'draf-pendanaan' => ['POST'],
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
        $pendanaans = Pendanaan::find()->all();

        $list_pendanaan = [];
        foreach ($pendanaans as $pendanaan) {
            $list_pendanaan[] = $pendanaan;
        }

        return [
            "success" => true,
            "message" => "List Pendanaan",
            "data" => $list_pendanaan,
        ];
    }

    public function actionShowPendanaan($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $pendanaans = Pendanaan::findOne(['id'=>$id]);
        

        return [
            "success" => true,
            "message" => "List Pendanaan",
            "data" => $pendanaans,
        ];
    }

    public function actionDrafPendanaan()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $marketing_data = MarketingDataUser::find()->where(['user_id'=>\Yii::$app->user->identity->id])->all();
        if($marketing_data ==  NULL){
            return ['success' => false, 'message' => 'gagal', 'data' => "Data Anda Belum dilengkapi"];
            // throw new HttpException(419, "Data Anda Belum dilengkapi");
        }else{
            $model = new Pendanaan;
            // $model->name = $val['name'];
            $image = UploadedFile::getInstanceByName("foto");
            if ($image) {
                $response = $this->uploadImage($image, "pendanaan");
                if ($response->success == false) {
                    throw new HttpException(419, "Gambar gagal diunggah");
                }
                $model->foto = $response->filename;
            }
                    // var_dump($image);
                    // die;
            $model->nama_pendanaan = $val['nama_pendanaan'];
            // $model->foto =$fotos;
            $model->uraian = $val['uraian'] ?? '';
            $model->deskripsi = $val['deskripsi'] ?? '';
            $model->nama_nasabah = $val['nama_nasabah'] ?? '';
            $model->nama_perusahaan = $val['nama_perusahaan'] ?? '';
            $model->bank_id = $val['bank'] ?? '';
            $model->nomor_rekening = $val['nomor_rekening'] ?? '';
            $model->nominal = $val['nominal'];
            $model->pendanaan_berakhir = $val['pendanaan_berakhir'];
            $model->user_id = \Yii::$app->user->identity->id;
            $model->kategori_pendanaan_id = $val['kategori_pendanaan'];
            $model->status_id = 9;
            
            
    
            if ($model->validate()) {
                $model->save();
                
                // unset($model->password);
                return ['success' => true, 'message' => 'success', 'data' => $model];
            } else {
                return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
            }
    
        }
            }


public function actionAddPendanaan()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $marketing_data = MarketingDataUser::find()->where(['user_id'=>\Yii::$app->user->identity->id])->all();
        if($marketing_data ==  NULL){
            return ['success' => false, 'message' => 'gagal', 'data' => "Data Anda Belum dilengkapi"];
            // throw new HttpException(419, "Data Anda Belum dilengkapi");
        }else{
            $model = new Pendanaan;
            // $model->name = $val['name'];
            $image = UploadedFile::getInstanceByName("foto");
            if ($image) {
                $response = $this->uploadImage($image, "pendanaan");
                if ($response->success == false) {
                    throw new HttpException(419, "Gambar gagal diunggah");
                }
                $model->foto = $response->filename;
            }
                    // var_dump($image);
                    // die;
            $model->nama_pendanaan = $val['nama_pendanaan'];
            // $model->foto =$fotos;
            $model->uraian = $val['uraian'] ?? '';
            $model->deskripsi = $val['deskripsi'] ?? '';
            $model->nama_nasabah = $val['nama_nasabah'] ?? '';
            $model->nama_perusahaan = $val['nama_perusahaan'] ?? '';
            $model->bank_id = $val['bank'] ?? '';
            $model->nomor_rekening = $val['nomor_rekening'] ?? '';
            $model->nominal = $val['nominal'];
            $model->pendanaan_berakhir = $val['pendanaan_berakhir'];
            $model->user_id = \Yii::$app->user->identity->id;
            $model->kategori_pendanaan_id = $val['kategori_pendanaan'];
            $model->status_id = 1;
            
            
    
            if ($model->validate()) {
                $model->save();
                
                // unset($model->password);
                return ['success' => true, 'message' => 'success', 'data' => $model];
            } else {
                return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
            }
    
        }
            }

}
