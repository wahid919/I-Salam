<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\file\FileInput;
/**
* @var yii\web\View $this
* @var app\models\Organisasi $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="box box-info">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
        'id' => 'Organisasi',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-error'
        ]
        );
        ?>
			<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'quotes')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'foto')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'allowedFileExtensions' => ['jpg', 'png', 'jpeg', 'gif', 'bmp', 'pdf', 'doc', 'docx', 'xlsx'],
                'maxFileSize' => 6500,
            ],
        ]); ?>
            <?= $form->field($model, 'flag')->dropDownList(['0' => 'Nonaktif', '1' => 'Aktif'], ['prompt' => 'Pilih']); ?>       <hr/>
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