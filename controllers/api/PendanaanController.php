<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "PendanaanController".
 */

use Yii;
use app\models\Pendanaan;
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
            "only" => ["add-pendanaan", "draf-pendanaan", "all",],
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

            
            
            // $agenda_pendanaan = new AgendaPendanaan;
            // $agenda_pendanaan->nama_agenda = $val['nama_agenda'];
            // // $agenda_pendanaan->foto =$fotos;
            // $agenda_pendanaan->pendanaan_id = $model->id;
            // $agenda_pendanaan->tanggal = $val['tanggal_agenda'] ?? '';

            // $modelsagendas= [new AgendaPendanaan];

        //Send at least one model to the form
        // $agenda_pendanaan = [new AgendaPendanaan()];

        // //Create an array of the products submitted
        // for($i = 1; $i < $count; $i++) {
        //     $agenda_pendanaans[] = new AgendaPendanaan();
        // }

        // //Load and validate the multiple models
        // if (Model::loadMultiple($agenda_pendanaans, Yii::$app->request->post()) && Model::validateMultiple($agenda_pendanaans)) {

        //     foreach ($agenda_pendanaans as $product) {

        //         //Try to save the models. Validation is not needed as it's already been done.
        //         $product->save(false);

        //     }
        //     return $this->redirect('view');
        // }
            
            
            
            
            
            if ($model->validate()) {
                // $model->save();

            foreach ($_POST['nama_partner'] as $index=>$value) {
                $partner = new PartnerPendanaan(); // creating new instance of partner 
                $partner->nama_partner = $value;
                $image_ktp_partner = UploadedFile::getInstanceByName("foto_ktp_partner");
            // $image_ktp_partner = UploadedFile::getInstances($partner, $_POST['foto_ktp_partner'[$index]]);
            // var_dump($image_ktp_partner);
            // die;
                if ($image_ktp_partner) {
                    $response_ktp_partner = $this->uploadImage($image_ktp_partner, "foto_ktp_partner");
                    if ($response_ktp_partner->success == false) {
                        throw new HttpException(419, "Foto KTP Partner gagal diunggah");
                    }
                    $partner->foto_ktp_partner = $response_ktp_partner[$index]->filename;
                }

                // $partner->tanggal = $_POST['tanggal_agenda'][$index];
                $partner->pendanaan_id = $model->id;
                $partner->save();
              }


            foreach ($_POST['nama_agenda'] as $index=>$value) {
                $agendas = new AgendaPendanaan(); // creating new instance of agendas 
                $agendas->nama_agenda = $value;
                $agendas->tanggal = $_POST['tanggal_agenda'][$index];
                $agendas->pendanaan_id = $model->id;
                $agendas->save();
              }


                
                $partners = Json::decode($_POST["partner"]);

                foreach($partners as $part)
                {
                    $partner = new PartnerPendanaan;
                    $partner->nama = $part->nama;
                    $_FILES['image'] = $part->foto_ktp;
                    $image_ktp_partner = UploadedFile::getInstance($partner, "image");

                    return $image_ktp_partner;
                    die;
                    if ($image_ktp_partner) {
                        $response_ktp_partner = $this->uploadImage($image_ktp_partner, "foto_ktp_partner");
                        if ($response_ktp_partner->success == false) {
                            throw new HttpException(419, "Foto KTP Partner gagal diunggah");
                        }
                        $partner->foto_ktp_partner = $response_ktp_partner->filename;
                    }
                }

                $partner = new PartnerPendanaan;
                $partner->nama_partner = $val['nama_partner'] ?? '';
                $partner->pendanaan_id = $model->id;
                $image_ktp_partner = UploadedFile::getInstanceByName("foto_ktp_partner");
                if ($image_ktp_partner) {
                    $response_ktp_partner = $this->uploadImage($image_ktp_partner, "foto_ktp_partner");
                    if ($response_ktp_partner->success == false) {
                        throw new HttpException(419, "Foto KTP Partner gagal diunggah");
                    }
                    $partner->foto_ktp_partner = $response_ktp_partner->filename;
                }

                $agenda_pendanaan = new AgendaPendanaan;
                $agenda_pendanaan->nama_agenda = $val['nama_agenda'];
                // $agenda_pendanaan->foto =$fotos;
                $agenda_pendanaan->pendanaan_id = $model->id;
                $agenda_pendanaan->tanggal = $val['tanggal_agenda'] ?? '';





                if ($model->validate()) {
                    $model->save();
                    $partner->save();
                    $agenda_pendanaan->save();

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
}
}
