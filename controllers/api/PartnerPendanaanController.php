<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "PartnerPendanaanController".
*/
use Yii;
use app\models\PartnerPendanaan;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PartnerPendanaanController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\PartnerPendanaan';
protected function verbs()
    {
       return [
           'all' => ['GET'],
           'add-partner' => ['POST'],
           'deleted' => ['DELETE'],
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
        $partners = PartnerPendanaan::find()->all();

        $list_partner = [];
        foreach ($partners as $partner) {
            $list_partner[] = $partner;
        }

        return [
            "success" => true,
            "message" => "List Partner",
            "data" => $list_partner,
        ];
    }
    public function actionAddAgenda()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $model = new PartnerPendanaan;
            $model->nama_partner = $val['nama_partner'];
            // $model->foto =$fotos;
            $model->pendanaan_id = $val['pendanaan_id'] ?? '';
            $model->bank_partner = $val['bank_partner'] ?? '';
            $model->no_rekening_partner = $val['no_rekening_partner'] ?? '';    
            
            
    
            if ($model->validate()) {
                $model->save();
                
                // unset($model->password);
                return ['success' => true, 'message' => 'success', 'data' => $model];
            } else {
                return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
            }
            }

            public function actionDeleted($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $partners = PartnerPendanaan::findOne(['id'=>$id]);
        
        if($partners->delete()){
         
        return [
            "success" => true,
            "message" => "Data Berhasil di hapus",
            "data" => $partners
        ];     
        }  else{
            
        return [
            "success" => false,
            "message" => "Data gagal terhapus",
        ];  
        }
    }
}
