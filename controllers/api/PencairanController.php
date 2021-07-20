<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "PencairanController".
*/
use Yii;
use app\models\Pencairan;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PencairanController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Pencairan';
protected function verbs()
    {
       return [
           'all' => ['GET'],
           'add-pencairan' => ['POST'],
        //    'deleted' => ['DELETE'],
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
        $pencairans = Pencairan::find()->all();

        $list_pencairan = [];
        foreach ($pencairans as $pencairan) {
            $list_pencairan[] = $pencairan;
        }

        return [
            "success" => true,
            "message" => "List Pencairan",
            "data" => $list_pencairan,
        ];
    }
    public function actionAddPencairan()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $model = new Pencairan;
            $model->nominal = $val['nominal'];
            // $model->foto =$fotos;
            $model->pendanaan_id = $val['pendanaan_id'] ?? '';
            $model->tanggal = $val['tanggal'] ?? '';
            
            
    
            if ($model->validate()) {
                $model->save();
                
                // unset($model->password);
                return ['success' => true, 'message' => 'success', 'data' => $model];
            } else {
                return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
            }
            }

    //         public function actionDeleted($id)
    // {
    //     \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    //     $val = \yii::$app->request->post();
    //     $agendas = AgendaPendanaan::findOne(['id'=>$id]);
        
    //     if($agendas->delete()){
         
    //     return [
    //         "success" => true,
    //         "message" => "Data Berhasil di hapus",
    //         "data" => $agendas
    //     ];     
    //     }  else{
            
    //     return [
    //         "success" => false,
    //         "message" => "Data gagal terhapus",
    //     ];  
    //     }
    // }

}
