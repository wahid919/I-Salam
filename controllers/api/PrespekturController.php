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

class PrespekturController extends \yii\rest\ActiveController
{

    use \app\components\UploadFile;
    public $modelClass = 'app\models\Pencairan';


    protected function verbs()
    {
        return [
            'index' => ['GET']
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

    // public function actionYa($pendanaan_id)
    // {
    //         $models = $this->findModels($pendanaan_id);
    //         $model = $this->findModel($models->pendanaan_id);
    //         $file = $model->file_uraian;
    //         // $model->tanggal_received=date('Y-m-d H:i:s');
    //         $path = Yii::getAlias("@app/web/uploads/uraian/") . $file;
    //         $arr = explode(".", $file);
    //         $extension = end($arr);
    //         $nama_file= "File Uraian ".$model->nama_pendanaan.".".$extension;
            
    //             if (file_exists($path)) {
    //                 return Yii::$app->response->sendFile($path, $nama_file);
    //             } else {
    //                 throw new \yii\web\NotFoundHttpException("{$path} is not found!");
    //             }
       
    
    // }

    public function actionIndex($pendanaan_id)
    {
            // $models = $this->findModels($pendanaan_id);
            $model = $this->findModel($pendanaan_id);
            $file = $model->file_uraian;
            // $model->tanggal_received=date('Y-m-d H:i:s');
            $path = Yii::getAlias("@app/web/uploads/") . $file;
            // var_dump($path);die;
            $arr = explode(".", $file);
            $extension = end($arr);
            $nama_file= "File Uraian ".$model->nama_pendanaan.".".$extension;
            
                if (file_exists($path)) {
                    return Yii::$app->response->sendFile($path, $nama_file);
                } else {
                    throw new \yii\web\NotFoundHttpException("{$path} is not found!");
                }
       
    
    }
    
    protected function findModel($id)
    {
       if (($model = Pendanaan::findOne($id)) !== null) {
          return $model;
       } else {
          throw new HttpException(404, 'The requested page does not exist.');
       }
    }

    protected function findModels($pendanaan_id)
    {
       if (($model = Pencairan::findOne(['pendanaan_id'=>$pendanaan_id])) !== null) {
          return $model;
       } else {
          throw new HttpException(404, 'The requested page does not exist.');
       }
    }


}
