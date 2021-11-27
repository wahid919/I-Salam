<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\search\RekeningSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="rekening-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'jenis_bank') ?>

		<?= $form->field($model, 'nomor_rekening') ?>

		<?= $form->field($model, 'nama_rekening') ?>

		<?= $form->field($model, 'jenis_rekening') ?>

		<?php // echo $form->field($model, 'flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
