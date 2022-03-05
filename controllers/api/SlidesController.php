<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "SlidesController".
*/

use app\models\Slides;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class SlidesController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Slides';
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
        $slides = Slides::find()->where(['status'=> 1])->all();
        return [
            "success" => true,
            "message" => "List Slider",
            "data" => $slides,
        ];       
    }
}
