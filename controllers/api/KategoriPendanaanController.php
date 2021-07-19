<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "KategoriPendanaanController".
*/
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use app\models\KategoriPendanaan;

class KategoriPendanaanController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\KategoriPendanaan';

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
        $kategoris = KategoriPendanaan::find()->all();

        $list_kategori = [];
        foreach ($kategoris as $kategori) {
            $list_kategori[] = $kategori;
        }

        return [
            "success" => true,
            "data" => $list_kategori,
        ];
    }


}
