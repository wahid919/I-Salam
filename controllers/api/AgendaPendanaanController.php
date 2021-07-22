<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "AgendaPendanaanController".
*/
use Yii;
use app\models\AgendaPendanaan;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class AgendaPendanaanController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\AgendaPendanaan';


protected function verbs()
    {
       return [
           'all' => ['GET'],
           'by-pendanaan' => ['GET'],
           'add-agenda' => ['POST'],
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
        $agendas = AgendaPendanaan::find()->all();

        $list_agenda = [];
        foreach ($agendas as $agenda) {
            $list_agenda[] = $agenda;
        }

        return [
            "success" => true,
            "message" => "List Agenda",
            "data" => $list_agenda,
        ];
    }
    public function actionByPendanaan($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $pendanaans = AgendaPendanaan::findOne(['pendanaan_id' => $id]);


        return [
            "success" => true,
            "message" => "List Agenda Pendanaan",
            "data" => $pendanaans,
        ];
    }

    public function actionAddAgenda()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $model = new AgendaPendanaan;
            $model->nama_agenda = $val['nama_agenda'];
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

            public function actionDeleted($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $agendas = AgendaPendanaan::findOne(['id'=>$id]);
        
        if($agendas->delete()){
         
        return [
            "success" => true,
            "message" => "Data Berhasil di hapus",
            "data" => $agendas
        ];     
        }  else{
            
        return [
            "success" => false,
            "message" => "Data gagal terhapus",
        ];  
        }
    }
}
