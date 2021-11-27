<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\search\PendanaanSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="pendanaan-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nama_pendanaan') ?>

		<?= $form->field($model, 'foto') ?>

		<?= $form->field($model, 'uraian') ?>

		<?= $form->field($model, 'nominal') ?>

		<?php // echo $form->field($model, 'pendanaan_berakhir') ?>

		<?php // echo $form->field($model, 'user_id') ?>

		<?php // echo $form->field($model, 'kategori_pendanaan_id') ?>

		<?php // echo $form->field($model, 'status_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
