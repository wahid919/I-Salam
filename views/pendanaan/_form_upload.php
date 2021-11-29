<?php

use kartik\file\FileInput;
?>
<div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'foto', [
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
                        'allowedFileExtensions' => ['png', 'jpg', 'jpeg'],
                        'maxFileSize' => 6500,
                        'showRemove' => false,
                        'showUpload' => false,
                        'showCaption' => true,
                        'dropZoneEnabled' => true,
                        'browseLabel' => 'Upload File',
                    ],
                ])->label('1. Foto/Icon Pendanaan'); ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'file_uraian', [
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
                        'allowedFileExtensions' => ['doc', 'pdf', 'docx'],
                        'maxFileSize' => 6500,
                        'showRemove' => false,
                        'showUpload' => false,
                        'showCaption' => true,
                        'dropZoneEnabled' => true,
                        'browseLabel' => 'Upload File',
                    ],
                ])->label('2. File Uraian(Pdf)');?>
            </div>
        </div>
        
        <div class="row">
        <div class="col-lg-6">
                <?= $form->field($model, 'foto_ktp', [
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
                        'allowedFileExtensions' => ['png', 'jpg', 'jpeg'],
                        'maxFileSize' => 6500,
                        'showRemove' => false,
                        'showUpload' => false,
                        'showCaption' => true,
                        'dropZoneEnabled' => true,
                        'browseLabel' => 'Upload File',
                    ],
                ])->label('3. Foto Ktp Penanggung Jawab'); ?>
            </div>
        <div class="col-lg-6">
                <?= $form->field($model, 'foto_kk', [
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
                        'allowedFileExtensions' => ['png', 'jpg', 'jpeg'],
                        'maxFileSize' => 6500,
                        'showRemove' => false,
                        'showUpload' => false,
                        'showCaption' => true,
                        'dropZoneEnabled' => true,
                        'browseLabel' => 'Upload File',
                    ],
                ])->label('4. Foto KK Penanggung Jawab'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'poster', [
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
                        'allowedFileExtensions' => ['png', 'jpg', 'jpeg'],
                        'maxFileSize' => 6500,
                        // 'showRemove' => false,
                        // 'showUpload' => false,
                        // 'showCaption' => true,
                        // 'dropZoneEnabled' => false,
                        'browseLabel' => 'Upload File',
                    ],
                ])->label('5.Poster Pendanaan'); ?>
            </div>
           
           
        </div>