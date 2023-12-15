<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "PendapatanController".
 */

use yii\filters\AccessControl;
use app\models\Pembayaran;

use app\models\Pendapatan;

use yii\helpers\ArrayHelper;

class PendapatanController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\Pendapatan';

    public function behaviors()
    {
        $parent = parent::behaviors();
        $parent['authentication'] = [
            "class" => "\app\components\CustomAuth",
            "only" => ["All", "One"],
        ];

        return $parent;
    }

    protected function verbs()
    {
        return [
            'all' => ['GET'],
            'one' => ['GET'],
        ];
    }

    public function actionAll()
    {
        $pendapatan = Pendapatan::find()->all();
        return [
            'success' => true,
            'message' => 'all',
            'data' => $pendapatan
        ];
    }

    public function actionOne($id, $pendanaan_id, $total_pendapatan_all)
    {
        $total_jumlah_lembaran = Pembayaran::find()->where(['user_id' => $id, 'pendanaan_id' => $pendanaan_id])->andWhere(['status_id' => 6])->andWhere(['>', 'jumlah_lembaran', 0])->sum('jumlah_lembaran');
        $total_pendapatan = $total_pendapatan_all * $total_jumlah_lembaran;
        return [
            'success' => true,
            'message' => 'all',
            'total_jumlah_lembaran' => $total_jumlah_lembaran,
            'total_pendapatan' => $total_pendapatan
        ];
    }


    // public function
}
