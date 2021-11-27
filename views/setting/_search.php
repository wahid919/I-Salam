<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\search\SettingSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="setting-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'pin') ?>

		<?= $form->field($model, 'logo') ?>

		<?= $form->field($model, 'bg_login') ?>

		<?= $form->field($model, 'bg_pin') ?>

		<?php // echo $form->field($model, 'link_download_apk') ?>

		<?php // echo $form->field($model, 'nama_web') ?>

		<?php // echo $form->field($model, 'alamat') ?>

		<?php // echo $form->field($model, 'slogan_web') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
