<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "KegiatanPendanaanController".
 */

use app\models\KegiatanPendanaan;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class KegiatanPendanaanController extends \yii\rest\ActiveController
{
    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent['authentication'] = [
            "class" => "\app\components\CustomAuth",
            "only" => ["create", "update", "delete", "index"],
        ];

        return $parent;
    }
    public $modelClass = 'app\models\KegiatanPendanaan';
    protected function verbs()
    {
        return [
            'all' => ['GET'],
            'kegiatan-pendanaan' => ['GET'],
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
        $kegiatans = KegiatanPendanaan::find()->all();

        $list_kegiatan = [];
        foreach ($kegiatans as $kegiatan) {
            $list_kegiatan[] = $kegiatan;
        }

        return [
            "success" => true,
            "message" => "List Kegiatan Pendanaan",
            "data" => $list_kegiatan,
        ];
    }
    // public function actionAll()
    // {
    //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    //     $update_KegiatanPendanaans = KegiatanPendanaan::find()->all();

    //     $list_kegiatanpendanaan = [];
    //     foreach ($update_KegiatanPendanaans as $update_KegiatanPendanaan) {
    //         $list_kegiatanpendanaan[] = $update_KegiatanPendanaan;
    //     }
    //     return [
    //         "success" => true,
    //         "message" => "Kegiatan Pendanaan",
    //         "data" => $list_kegiatanpendanaan,
    //     ];
    // }

    // public function actionAll()
    // {
    //     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    //     $agendas = KegiatanPendanaan::find()->all();

    //     $list_agenda = [];
    //     foreach ($agendas as $agenda) {
    //         $list_agenda[] = $agenda;
    //     }

    //     return [
    //         "success" => true,
    //         "message" => "List Agenda",
    //         "data" => $list_agenda,
    //     ];
    // }
}
