<?php

use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
?>
<div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'nama_pendanaan', [
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
            <div class="col-lg-6">
            <?= $form->field($model, 'uraian', [
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
            <div class="col-lg-6">
            <?= $form->field($model, 'deskripsi', [
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
            <div class="col-lg-3">
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
                ])->dropDownList(
                    \yii\helpers\ArrayHelper::map(app\models\Bank::find()->all(), 'id', 'name'),
                    [
                        'prompt' => 'Select',
                        'disabled' => (isset($relAttributes) && isset($relAttributes['bank_id'])),
                    ]
                ); ?>
            </div>
            <div class="col-lg-3">
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
                ])->textInput(['maxlength' => true,'type'=>'number']) ?>
            </div>
            <div class="col-lg-3">
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
                ])->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-3">
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
                ])->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($model, 'nominal', [
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
                ])->widget(\yii\widgets\MaskedInput::className(), [
                    'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true
                    ],
        
                ]) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'pendanaan_berakhir', [
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
                ])->widget(DateTimePicker::classname(), [
                    'options' => ['placeholder' => 'Pilih Tanggal Pendanaan Berakhir'],
                    'name' => 'event_time',
                    'readonly' => true,
                    'pluginOptions' => [
                        'format' => 'yyyy-m-d H:i:s',
                        'autocomplete' => "off",
                        'autoclose' => true,
                    ],
                ]); ?>
            </div>
            <div class="col-lg-4">
                <?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
                $form->field($model, 'kategori_pendanaan_id', [
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
                ])->dropDownList(
                    \yii\helpers\ArrayHelper::map(app\models\KategoriPendanaan::find()->all(), 'id', 'name'),
                    [
                        'prompt' => 'Select',
                        'disabled' => (isset($relAttributes) && isset($relAttributes['kategori_pendanaan_id'])),
                    ]
                ); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'status_lembaran', [
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
                ])->dropDownList(['1' => 'Aktif', '0' => 'Tidak'],['prompt'=>'Silahkan Pilih Status Lembaran']); ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'nominal_lembaran', [
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
                ])->widget(\yii\widgets\MaskedInput::className(), [
                    'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true
                    ],
        
                ]) ?>
            </div>
        </div>