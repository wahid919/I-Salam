<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "MarketingDataUserController".
*/
use YIi;
use app\models\MarketingDataUser;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class MarketingDataUserController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\MarketingDataUser';
public function behaviors(){
    $parent = parent::behaviors();
    $parent['authentication'] = [
        "class" => "\app\components\CustomAuth",
        "only" => ["add",],
    ];

    return $parent;
}
protected function verbs()
    {
       return [
        'add' => ['POST'],
           'all' => ['GET'],
           'validate-pendanaan' => ['GET'],
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
        $marketings = MarketingDataUser::find()->all();

        $list_marketing = [];
        foreach ($marketings as $marketing) {
            $list_marketing[] = $marketing;
        }

        return [
            "success" => true,
            "message" => "List Marketing",
            "data" => $list_pendanaan,
        ];
    }

    public function actionValidatePendanaan()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $marketings = MarketingDataUser::find()->where(['user_id'=>\Yii::$app->user->identity->id])->asArray()->all();
        if($marketings != NULL){

           
    
            return [
                "success" => true,
                "message" => "List Marketing",
                "data" => $marketings,
            ];
        }else{
            return [
                "success" => false,
                "message" => "GAGAL",
                "data" => "Mohon Lengkapi Data Anda",
            ];
        }
    }
    public function actionAdd()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $val = \yii::$app->request->post();
        $marketing_data = MarketingDataUser::find()->where(['user_id'=>\Yii::$app->user->identity->id])->all();
        if($marketing_data ==  NULL){
            $model = new MarketingDataUser;
            
                    // var_dump($image);
                    // die;
            $model->nama = $val['nama'];
            // $model->foto =$fotos;
            $model->alamat = $val['alamat'] ?? '';
            $model->domisili = $val['domisili'] ?? '';
            $model->no_rekening = $val['no_rekening'] ?? '';
            $model->bank_id = $val['bank'] ?? '';
            $model->user_id = \Yii::$app->user->identity->id;
            
            
    
            if ($model->validate()) {
                $model->save();
                
                // unset($model->password);
                return ['success' => true, 'message' => 'success', 'data' => $model];
            } else {
                return ['success' => false, 'message' => 'gagal', 'data' => $model->getErrors()];
            }
    
            
            // throw new HttpException(419, "Data Anda Belum dilengkapi");
        }else{
            return ['success' => false, 'message' => 'gagal', 'data' => "Data Anda Telah dilengkapi"];
        }
            }


}
