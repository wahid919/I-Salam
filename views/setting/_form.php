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
        <?php $form = ActiveForm::begin(
            [
                'id' => 'Setting',
                'layout' => 'horizontal',
                'enableClientValidation' => true,
                'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
        );
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?= $form->field($model, 'nama_web', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?= $form->field($model, 'judul_web', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?= $form->field($model, 'pin', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textInput(['type' => 'password']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?= $form->field($model, 'instagram', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?= $form->field($model, 'facebook', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?= $form->field($model, 'twitter', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?= $form->field($model, 'link_download_apk', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?= $form->field($model, 'link_download_apk_marketing', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <?= $form->field($model, 'alamat', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textarea(['rows' => 4]) ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <?= $form->field($model, 'slogan_web', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textarea(['rows' => 4]) ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <?= $form->field($model, 'tentang_kami', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textarea(['rows' => 4]) ?>
            </div>
        </div>

        <div class="row">
            
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?= $form->field($model, 'visi', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textarea(['rows' => 6]) ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?= $form->field($model, 'misi', [
                    'template' => '
                        {label}
                        {input}
                        {error}
                    ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->textarea(['rows' => 6]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?= $form->field($model, 'logo', [
                    'template' => '
                                {label}
                                {input}
                                {error}
                            ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->widget(FileInput::classname(), [
                    'options' => ['accept' => 'file/*'],
                    'pluginOptions' => [
                        'allowedFileExtensions' => ['png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx'],
                        'maxFileSize' => 6500,
                        'dropZoneEnabled' => false,
                        'showCaption' => true,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseLabel' => 'Upload File',
                    ],
                ]); ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?= $form->field($model, 'bg_login', [
                    'template' => '
                                {label}
                                {input}
                                {error}
                            ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->widget(FileInput::classname(), [
                    'options' => ['accept' => 'file/*'],
                    'pluginOptions' => [
                        'allowedFileExtensions' => ['png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx'],
                        'maxFileSize' => 6500,
                        'dropZoneEnabled' => false,
                        'showCaption' => true,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseLabel' => 'Upload File',
                    ],
                ]); ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <?= $form->field($model, 'bg_pin', [
                    'template' => '
                                {label}
                                {input}
                                {error}
                            ',
                    'inputOptions' => [
                        'class' => 'form-control'
                    ],
                    'labelOptions' => [
                        'class' => 'control-label'
                    ],
                    'options' => ['tag' => false]
                ])->widget(FileInput::classname(), [
                    'options' => ['accept' => 'file/*'],
                    'pluginOptions' => [
                        'allowedFileExtensions' => ['png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx'],
                        'maxFileSize' => 6500,
                        'dropZoneEnabled' => false,
                        'showCaption' => true,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseLabel' => 'Upload File',
                    ],
                ]); ?>
            </div>

        </div>

        <?php echo $form->errorSummary($model); ?>
        <div class="row" style="padding-top: 2rem;">
            <div class="col-md-offset-3 col-md-10">
                <?= Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']); ?>
                <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>