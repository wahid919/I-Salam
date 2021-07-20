<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\search\PembayaranSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="pembayaran-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nama') ?>

		<?= $form->field($model, 'nominal') ?>

		<?= $form->field($model, 'bukti_transaksi') ?>

		<?= $form->field($model, 'user_id') ?>

		<?php // echo $form->field($model, 'marketing_id') ?>

		<?php // echo $form->field($model, 'bank') ?>

		<?php // echo $form->field($model, 'pendanaan_id') ?>

		<?php // echo $form->field($model, 'tanggal_pembayaran') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'status_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
