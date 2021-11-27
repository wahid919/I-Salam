<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Rekening $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="box box-info">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
        'id' => 'Rekening',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-error'
        ]
        );
        ?>
        
			<?= $form->field($model, 'jenis_bank')->textInput(['maxlength' => true,'placeholder' => 'Bank Negara Indonesia']) ?>
			<?= $form->field($model, 'jenis_rekening')->textInput(['maxlength' => true,'placeholder' => 'Penerima Wakaf']) ?>
			<?= $form->field($model, 'nama_rekening')->textInput(['maxlength' => true,'placeholder' => 'Yayasan Initiator Salam']) ?>
			<?= $form->field($model, 'nomor_rekening')->textInput(['maxlength' => true,'placeholder' => '681.8797.89767']) ?>     <hr/>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-offset-3 col-md-10">
                <?=  Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']); ?>
                <?=  Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>