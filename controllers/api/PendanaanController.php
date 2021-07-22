<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "PendanaanController".
 */

use Yii;
use app\models\Pendanaan;
use app\models\Pembayaran;
use app\models\Pencairan;
use app\models\PartnerPendanaan;
use app\models\AgendaPendanaan;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use app\components\Constant;
use app\components\SSOToken;
use app\models\MarketingDataUser;
use yii\helpers\Json;
use yii\web\HttpException;

class PendanaanController extends \yii\rest\ActiveController
{

    use \app\components\UploadFile;
    public $modelClass = 'app\models\Pendanaan';

    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent['authentication'] = [
            "class" => "\app\components\CustomAuth",
            "only" => ["add-pendanaan", "draf-pendanaan", "all","pendanaan-diterima",],
        ];

        return $parent;
    }

    protected function verbs()
    {
        return [
            'all' => ['GET'],
            'show-pendanaan' => ['GET'],
            'pendanaan-diterima' => ['GET'],
            'add-pendanaan' => ['POST'],
            'draf-pendanaan' => ['POST'],
            'approve-pendanaan' => ['POST'],
            'pendanaan-cair' => ['POST'],
            'pendanaan-selesai' => ['POST'],
            'pendanaan-tolak' => ['POST'],
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
        $pendanaans = Pendanaan::find()->where(['user_id' => \Yii::$app->user->identity->id])->all();

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
        $pendanaans = Pendanaan::findOne(['id' => $id]);


        return [
            "success" => true,
            "message" => "List Pendanaan",
            "data" => $pendanaans,
        ];
    }

    public function actionPendanaanDiterima()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $pendanaans = Pendanaan::find(['status_id' => 1])->all();


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
        $marketing_data = MarketingDataUser::find()->where(['user_id' => \Yii::$app->user->identity->id])->all();
        if ($marketing_data ==  NULL) {
            return ['success' => false, 'message' => 'gagal', 'data' => "Data Anda Belum dilengkapi"];
            // throw new HttpException(419, "Data Anda Belum dilengkapi");
        } else {
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

            $check = Pendanaan::findOne(['nomor_rekening' => $model->nomor_rekening]);
            if ($check != null) {
                return ['success' => false, 'message' => 'Nomor Rekening telah digunakan'];
            }

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

        $model = Pendanaan::findOne(['id' => $val["id"], 'status_id' => 9]);
        // $model->name = $val['name'];
        if ($model != null) {
            $image = UploadedFile::getInstanceByName("foto");
            if ($image) {
                $response = $this->uploadImage($image, "pendanaan");
                if ($response->success == false) {
                    throw new HttpException(419, "Gambar gagal diunggah");
                }
                $model->foto = $response->filename;
            }
            $image_ktp = UploadedFile::getInstanceByName("foto_ktp_nasabah");
            if ($image_ktp) {
                $response_ktp = $this->uploadImage($image_ktp, "pendanaan");
                if ($response_ktp->success == false) {
                    throw new HttpException(419, "Foto KTP gagal diunggah");
                }
                $model->foto_ktp = $response_ktp->filename;
            }
            $image_kk = UploadedFile::getInstanceByName("foto_kk");
            if ($image_kk) {
                $response_kk = $this->uploadImage($image_kk, "pendanaan");
                if ($response_kk->success == false) {
                    throw new HttpException(419, "Foto KK gagal diunggah");
                }
                $model->foto_kk = $response_kk->filename;
                $model->status_id = 1;

            
            if ($model->validate()) {
                $model->save();
            // gunakan ini jika ada gambar yang gagal di upload
                $images_success_uploaded = [];

                $date = date("Y-m-d");
                $images_title = $_POST['nama_partner'];

                foreach ($images_title as $index => $title) {
                    $file = UploadedFile::getInstanceByName("foto_ktp_partner[$index]");
                    $response = $this->uploadImage($file, "partner-pendanaan/$date");
                    
                    if ($response->success == false) {
                        foreach ($images_success_uploaded as $img) {
                            $this->deleteOne($img);
                        }

                        return [
                            "success" => false,
                            "message" => "Gagal menambahkan gambar",
                        ];
                    }

                    array_push($images_success_uploaded, $response->filename);

                    $new_image = new PartnerPendanaan();
                    $new_image->nama_partner = $title;
                    $new_image->pendanaan_id = $model->id; // set default

                    $new_image->foto_ktp_partner = $response->filename;

                    if ($new_image->validate() == false) {

                        foreach ($images_success_uploaded as $img) {
                            $this->deleteOne($img);
                        }

                        return [
                            "success" => false,
                            "message" => "Validasi gagal",
                        ];
                    }

                    $new_image->save();
                }



            foreach ($_POST['nama_agenda'] as $index=>$value) {
                $agendas = new AgendaPendanaan(); // creating new instance of agendas 
                $agendas->nama_agenda = $value;
                $agendas->tanggal = $_POST['tanggal_agenda'][$index];
                $agendas->pendanaan_id = $model->id;
                $agendas->save();
              }

                    // unset($model->password);
                    return ['success' => true, 'message' => 'success', 'data' => $model];
                } else {
                    return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
                }
            }
        } else {
            return ['success' => false, 'message' => 'Data Pendanaan Tidak ditemukan'];
        }
    
}

public function actionApprovePendanaan(){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $val = \yii::$app->request->post();
    $model = Pendanaan::findOne(['id'=>$val['id_pendanaan'],'status_id' => 1]);
      //return print_r($model);
      if ($model) {
         $model->status_id = 2;
         if ($model->save()){
            
            return ['success' => true, 'message' => 'success', 'data' => $model];
         } else {
            
            return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
         }
      }
}

public function actionPendanaanCair()
{
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
$model = Pendanaan::findOne(['id'=>$val["id_pendanaan"],'status_id' => 4]);
$bayar = Pembayaran::find()->where(['pendanaan_id'=>$val["id_pendanaan"]])->sum('nominal');
$cair= new Pencairan;
// $model->tanggal_received=date('Y-m-d H:i:s');
if ($model != null) {
   $model->status_id = 3;
   $cair->pendanaan_id = $val['id_pendanaan'];
   if($bayar < $val['nominal']){
    return ['success' => false, 'message' => 'Nominal Melebihi Jumlah yang didapat'];
   }else{
      $cair->nominal = $val['nominal'];
      $cair->tanggal = date('Y-m-d');
   $cair->save();
        if($model->save()){
            return ['success' => true, 'message' => 'success', 'data' => $model];
        }
   }
   
// return $this->redirect(Url::previous());
}else{
    return ['success' => false, 'message' => 'Data Tidak Ditemukan'];
  }
}

public function actionPendanaanSelesai(){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $val = \yii::$app->request->post();
    $model = Pendanaan::findOne(['id'=>$val['id_pendanaan'],'status_id' => 2]);
      //return print_r($model);
      if ($model) {
         $model->status_id = 4;
         if ($model->save()){
            
            return ['success' => true, 'message' => 'success', 'data' => $model];
         } else {
            return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
         }
      }else{
        return ['success' => false, 'message' => 'Data Tidak Ditemukan'];
      }
}

public function actionPendanaanTolak(){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $val = \yii::$app->request->post();
    $model = Pendanaan::findOne(['id'=>$val['id_pendanaan'],'status_id' => 1]);
      //return print_r($model);
      if ($model) {
         $model->status_id = 7;
         if ($model->save()){
            
            return ['success' => true, 'message' => 'success', 'data' => $model];
         } else {
            return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
         }
      }else{
        return ['success' => false, 'message' => 'Data Tidak Ditemukan'];
      }
}
public function actionPendanaanBatal(){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    $val = \yii::$app->request->post();
    $model = Pendanaan::findOne(['id'=>$val['id_pendanaan'],'status_id' => 1]);
      //return print_r($model);
      if ($model) {
         if ($model->delete()){
            
            return ['success' => true, 'message' => 'success membatalkan pendanaan', 'data' => $model];
         } else {
            return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
         }
      }else{
        return ['success' => false, 'message' => 'Data Tidak Ditemukan'];
      }
    }




}
