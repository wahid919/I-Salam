<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "BankController".
*/
use Yii;
use app\models\Bank;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class BankController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent['authentication'] = [
            "class" => "\app\components\CustomAuth",
            "only" => ["create", "update", "delete","index","all"],
        ];

        return $parent;
    }
public $modelClass = 'app\models\Bank';

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
        $banks = Bank::find()->all();

        $list_bank = [];
        foreach ($banks as $bank) {
            $list_bank[] = $bank;
        }

        return [
            "success" => true,
            "message" => "List Bank",
            "data" => $list_bank,
        ];
    }

}
