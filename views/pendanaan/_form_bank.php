<?php

use app\models\Bank;
use kartik\select2\Select2;

?>
    
            <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'bank_id', [
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
                ])->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(Bank::find()->all(), 'id', 'name'),
                    'language' => 'en',
                    'options' => ['multiple' => false, 'placeholder' => 'Pilih Bank untuk Pendanaan...'],
                    'pluginOptions' => [
                       'allowClear' => true
                    ],
                 ])->label('1. Bank'); ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'nomor_rekening', [
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
                ])->textInput(['maxlength' => 16,'type'=>'text'])->label('2. Nomor Rekening'); ?>
            </div>
        </div>
        <div class="row">
        <div class="col-lg-6">
                <?= $form->field($model, 'nama_nasabah', [
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
                ])->textInput(['maxlength' => true])->label('3. Nama Nasabah'); ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'nama_perusahaan', [
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
                ])->textInput(['maxlength' => true])->label('4. Nama Perusahaan'); ?>
            </div>
        </div>
        