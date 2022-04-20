<?php

use app\models\KategoriPendanaan;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;

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
<div class="row">
            <div class="col-lg-4">
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
                ])->textInput(['maxlength' => true])->label('1. Nama Pendanaan'); ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'tempat', [
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
                ])->textInput(['maxlength' => true])->label('2. Tempat'); ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'penerima_wakaf', [
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
                ])->textInput(['maxlength' => true])->label('3. Penerima Wakaf'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
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
                ])->textarea(['class' => 'tinymce-form form-control'])->label('4. Deskripsi Pendanaan');?>
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
        
                ])->label('5. Uang Yang Dibutuhkan'); ?>
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
                ])->label('6. Pendanaan Berakhir'); ?>
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
                ])->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(KategoriPendanaan::find()->all(), 'id', 'name'),
                    'language' => 'en',
                    'options' => ['multiple' => false, 'placeholder' => 'Pilih Kategori Pendanaan...'],
                    'pluginOptions' => [
                       'allowClear' => true
                    ],
                 ])->label('7. Kategori Pendanaan'); ?>

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
                ])->dropDownList(['1' => 'Aktif', '0' => 'Tidak'],['prompt'=>'Silahkan Pilih Status Lembaran'])->label('8. Status Lembaran'); ?>
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
        
                ])->label('9. Nominal Perlembar'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <?= $form->field($model, 'is_wakaf', [
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
                ])->dropDownList(['1' => 'Aktif', '0' => 'Tidak'],['prompt'=>'Silahkan Pilih Aktif/Tidak'])->label('10. Wakaf'); ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'is_zakat', [
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
                ])->dropDownList(['1' => 'Aktif', '0' => 'Tidak'],['prompt'=>'Silahkan Pilih Aktif/Tidak'])->label('11. Zakat'); ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'is_infak', [
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
                ])->dropDownList(['1' => 'Aktif', '0' => 'Tidak'],['prompt'=>'Silahkan Pilih Aktif/Tidak'])->label('12. Infak'); ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'is_sedekah', [
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
                ])->dropDownList(['1' => 'Aktif', '0' => 'Tidak'],['prompt'=>'Silahkan Pilih Aktif/Tidak'])->label('13. Sedekah'); ?>
            </div>
        </div>