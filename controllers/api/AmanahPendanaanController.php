<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "AmanahPendanaanController".
*/

use app\models\AmanahPendanaan;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class AmanahPendanaanController extends \yii\rest\ActiveController
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
public $modelClass = 'app\models\AmanahPendanaan';
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

    public function actionAll($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $amanahs = AmanahPendanaan::find()->where(['pendanaan_id' => $id])->all();
        if($amanahs != null){
            return [
                "success" => true,
                "message" => "List Amanah Pendanaan",
                "data" => $amanahs,
            ];       
        }else{
            return [
                "success" => false,
                "message" => "Tidak Ada List Amanah Pendanaan",
                "data" => [],
            ];
        }
    }
}
