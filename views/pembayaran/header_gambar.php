<?php

use app\models\Setting;
use yii\helpers\Html;
$model = Setting::find()->one();
?>
<?= Html::img(\Yii::$app->request->BaseUrl.'/uploads/setting/'.$model->logo,['width'=>175]); ?>