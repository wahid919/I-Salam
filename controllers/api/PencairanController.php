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
public function behaviors()
{
    $parent = parent::behaviors();
    $parent['authentication'] = [
        "class" => "\app\components\CustomAuth",
        "only" => ["add-pencairan"],
    ];

    return $parent;
}
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
        $user = \Yii::$app->user->identity->pin;
        $val = \yii::$app->request->post();
        if($user == null){
            return ['success' => false, 'message' => 'Anda Belum membuat Pin', 'data' => null];
        }else{
            if($user == $val['pin']){
                $pendanaans = Pendanaan::findOne(['id'=>$val['pendanaan_id'],'status_id'=>4]);
                if($pendanaans != null){
                    $model = new Pencairan;
                    $model->nominal = $val['nominal'];
                    // $model->foto =$fotos;
                    $model->pendanaan_id = $val['pendanaan_id'] ?? '';
                    $model->tanggal = date('Y-m-d');
                    
                    
            
                    if ($model->validate()) {
                        $model->save();
                        $pendanaans->status_id=3;
                        $pendanaans->save();                        
                        // unset($model->password);
                        return ['success' => true, 'message' => 'success', 'data' => $model];
                    } else {
                        return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
                    }
                }else{
                    
                return ['success' => false, 'message' => 'Pendanaan Sudah di cairkan/tidak ditemukan', 'data' => null];
                }
                
            }else{
                
                return ['success' => false, 'message' => 'Pin salah', 'data' => null];
            }
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
