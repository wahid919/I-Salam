<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\file\FileInput;
/**
* @var yii\web\View $this
* @var app\models\Setting $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="box box-info">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
        'id' => 'Setting',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-error'
        ]
        );
        ?>
			<?= $form->field($model, 'pin')->textInput(['type'=>'number']) ?>
            
			<?= $form->field($model, 'link_download_apk')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'nama_web')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'slogan_web')->textarea(['rows' => 6]) ?>   
            <?= $form->field($model, 'logo',[
                    
                    'options' => ['tag' => false]])->widget(FileInput::classname(), [
                'options' => ['accept' => 'file/*'],
                'pluginOptions' => [
                    'allowedFileExtensions' => ['png','jpg','jpeg'],
                    'maxFileSize' => 6500,
                    'showRemove' => false,
                    'showUpload' => false,
                    'showCaption' => false,
                    'dropZoneEnabled' => false,
                    'browseLabel' => 'Upload File',
                ],
                ]);?>
                <br>
                <hr>
            <?= $form->field($model, 'bg_login',[
                    
                    'options' => ['tag' => false]])->widget(FileInput::classname(), [
                'options' => ['accept' => 'file/*'],
                'pluginOptions' => [
                    'allowedFileExtensions' => ['png','jpg','jpeg'],
                    'maxFileSize' => 6500,
                    'showRemove' => false,
                    'showUpload' => false,
                    'showCaption' => false,
                    'dropZoneEnabled' => false,
                    'browseLabel' => 'Upload File',
                ],
                ]);?>
                
                <br>
                <hr>
            <?= $form->field($model, 'bg_pin',[
                    
                    'options' => ['tag' => false]])->widget(FileInput::classname(), [
                'options' => ['accept' => 'file/*'],
                'pluginOptions' => [
                    'allowedFileExtensions' => ['png','jpg','jpeg'],
                    'maxFileSize' => 6500,
                    'showRemove' => false,
                    'showUpload' => false,
                    'showCaption' => false,
                    'dropZoneEnabled' => false,
                    'browseLabel' => 'Upload File',
                ],
                ]);?>
                <br>
                     <hr/>
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