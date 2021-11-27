<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "NotifikasiController".
*/
use Yii;
use app\models\Notifikasi;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class NotifikasiController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent['authentication'] = [
            "class" => "\app\components\CustomAuth",
            "only" => ["all"],
        ];

        return $parent;
    }

    protected function verbs()
    {
        return [
            'all' => ['GET'],
            'detail' => ['GET'],
        ];
    }
public $modelClass = 'app\models\Notifikasi';

public function actionAll()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $wf = Notifikasi::find()->where(['user_id'=>\Yii::$app->user->identity->id])->all();
       if($wf != null){
           

            return [
                "success" => true,
                "message" => "Notifikasi ",
                "data" =>$wf,
            ];
           
       }else{
        return [
            "success" => false,
            "message" => "Tidak Ada Notifikasi",
            "data" =>null,
        ];
       }

    }
    public function actionDetail($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $wf = Notifikasi::find()->where(['id'=>$id])->one();
       if($wf != null){
        $wf->flag = 0;
        $wf->save();
            return [
                "success" => true,
                "message" => "Notifikasi ",
                "data" =>$wf,
            ];
           
       }else{
        return [
            "success" => false,
            "message" => "Tidak Ada Notifikasi",
            "data" =>null,
        ];
       }

    }
    
}
