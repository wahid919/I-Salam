<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "KategoriBeritaController".
 */

use app\models\KategoriBerita;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class KategoriBeritaController extends \yii\rest\ActiveController
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
    public $modelClass = 'app\models\KategoriBerita';
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
        $kat_berita = KategoriBerita::find()->all();

        $list_katberita = [];
        foreach ($kat_berita as $kat_beritas) {
            $list_katberita[] = $kat_beritas;
        }

        return [
            "success" => true,
            "message" => "List Kegiatan Pendanaan",
            "data" => $list_katberita,
        ];
    }
}
