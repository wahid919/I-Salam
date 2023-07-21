<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "SettingController".
 */

use app\models\Setting;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class SettingController extends \yii\rest\ActiveController
{
    use \app\components\UploadFile;
    public $modelClass = 'app\models\Setting';

    protected function verbs()
    {
        return [
            'all' => ['GET'],
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
        $setting = Setting::find()->all();

        return [
            "success" => true,
            "message" => "Data Setting",
            "data" => $setting,
        ];
    }
}
