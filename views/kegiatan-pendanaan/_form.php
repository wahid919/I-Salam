<?php

use app\models\Pendanaan;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use kartik\file\FileInput;
use kartik\select2\Select2;
/**
* @var yii\web\View $this
* @var app\models\KegiatanPendanaan $model
* @var yii\widgets\ActiveForm $form
*/
$this->registerJsFile(Yii::getAlias("@web/tinymce/tinymce.min.js"));
// $uploadlink = Url::to(['site/upload-image']);
// $csrf = Yii::$app->request->csrfToken;

$this->registerJs("
      tinymce.init({
        selector: '.tinymce-form',
        height: '400',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount',
        ],

        toolbar: 'undo redo | formatselect | ' +
        'bold italic backcolor | alignleft aligncenter ' +
        'alignright alignjustify | bullist numlist outdent indent | ' +
        'removeformat | help',
      });
");
?>

<div class="box box-info">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
        'id' => 'KegiatanPendanaan',
        'layout' => 'horizontal',
        'enableClientValidation' => true,
        'errorSummaryCssClass' => 'error-summary alert alert-error'
        ]
        );
        ?>
        
			<?= $form->field($model, 'pendanaan_id')->widget(Select2::classname(), [
                  'data' => \yii\helpers\ArrayHelper::map(Pendanaan::find()->all(), 'id', 'nama_pendanaan'),
                  'language' => 'en',
                  'options' => ['multiple' => false, 'placeholder' => 'Pilih Pendanaan...'],
                  'pluginOptions' => [
                     'allowClear' => true
                  ],
               ])->label('Pendanaan') ?>
			<?= $form->field($model, 'kegiatan')->textarea(['class' => 'tinymce-form form-control']) ?>
			<?= $form->field($model, 'foto')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'file/*'],
                    'pluginOptions' => [
                        'allowedFileExtensions' => ['png', 'jpg', 'jpeg'],
                        'maxFileSize' => 6500,
                        'showRemove' => false,
                        'showUpload' => false,
                        'showCaption' => true,
                        'dropZoneEnabled' => true,
                        'browseLabel' => 'Upload File',
                    ],
                ]); ?>        <hr/>
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