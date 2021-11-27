<?php

use kartik\file\FileInput;
?>
<div class="row">
            <div class="col-lg-3">
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
                        'dropZoneEnabled' => false,
                        'browseLabel' => 'Upload File',
                    ],
                ]); ?>
            </div>
            <div class="col-lg-3">
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
                        'dropZoneEnabled' => false,
                        'browseLabel' => 'Upload File',
                    ],
                ]); ?>
            </div>
            <div class="col-lg-3">
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
                        'dropZoneEnabled' => false,
                        'browseLabel' => 'Upload File',
                    ],
                ]); ?>
            </div>
            <div class="col-lg-3">
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
                        'dropZoneEnabled' => false,
                        'browseLabel' => 'Upload File',
                    ],
                ]); ?>
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
                ]); ?>
            </div>
           
           
        </div>