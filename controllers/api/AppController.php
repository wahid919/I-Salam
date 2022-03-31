<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "BeritaController".
*/

use app\components\ActionSendFcm;
use app\models\Berita;
use app\models\Notifikasi;
use app\models\Pembayaran;
use app\models\Pendanaan;
use app\models\Setting;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class AppController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent['authentication'] = [
            "class" => "\app\components\CustomAuth",
            "only" => ["create", "update", "delete","index"],
        ];

        return $parent;
    }
public $modelClass = 'app\models\Setting';
protected function verbs()
    {
        return [
            'info' => ['GET'],
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

    public function actionInfo()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $beritas = Setting::find()->one();
        return [
            "success" => true,
            "message" => "List Sosial Media",
            "data" => $beritas,
        ];       
    }

}
