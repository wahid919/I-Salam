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

\app\components\MapAsset::register($this);
?>
<style>
    #map_canvas {
        width: 100%;
        height: 70vh;
        margin-bottom: 1rem;
        border-radius: 20px;
        box-shadow: 0 8px 4px 5px #eee;
    }
</style>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#setting-tentang_kami',
        height : '400',
    });
    tinymce.init({
        selector: 'textarea#setting-visi',
        height : '400',
    });
    tinymce.init({
        selector: 'textarea#setting-misi',
        height : '400',
    });
    tinymce.init({
        selector: 'textarea#setting-deskripsi_video',
        height : '400',
    });
</script>

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
            <div class="col-sm-12 col-md-6 col-lg-3">
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
            <div class="col-sm-12 col-md-6 col-lg-3">
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
            <div class="col-sm-12 col-md-6 col-lg-3">
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
            <div class="col-sm-12 col-md-6 col-lg-3">
                <?= $form->field($model, 'telegram', [
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
            <div class="col-sm-12 col-md-6 col-lg-6">
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
            <div class="col-sm-12 col-md-6 col-lg-6">
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
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?= $form->field($model, 'youtube_link', [
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
                <?= $form->field($model, 'judul_video', [
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
            <div class="col-sm-12 col-md-12 col-lg-12">
                <?= $form->field($model, 'deskripsi_video', [
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
                ])->textarea(['rows' => 8]) ?>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
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
                ])->textarea(['rows' => 8]) ?>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12">
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
            <div class="col-sm-12 col-md-12 col-lg-12">
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
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?= $form->field($model, 'banner', [
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
                        'dropZoneEnabled' => false,
                        'showCaption' => true,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseLabel' => 'Upload File',
                    ],
                ]); ?>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?= $form->field($model, 'ikut_wakaf', [
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
            <div class="col-md-12 col-lg-12 mb-12">
                <b>Cari Lokasi</b> : <input id="searchTextField" class="form-control" type="text" size="50" style="text-align: left;width:100%;direction: ltr;margin-bottom:1rem;">
                <div id="map_canvas"></div>
            </div>
            <?= $form->field($model, 'longitude', \app\components\Constant::COLUMN(2, false))->textInput(['type' => 'hidden', 'maxlength' => true]) ?>
            <?= $form->field($model, 'latitude', \app\components\Constant::COLUMN(2, false))->textInput(['type' => 'hidden', 'maxlength' => true]) ?>
            <div class="clearfix"></div>
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
<?php
$js = <<<JS
$(function() {
    console.log($('#setting-latitude').val());
let id_lat = $('#setting-latitude'),
    id_lng = $('#setting-longitude'),
    lat = (id_lat.val() != "") ? id_lat.val() : -7.883065,
    lng = (id_lng.val() != "")  ? id_lng.val() : 112.533447,
    
    maps2 = L.map("map_canvas").setView([lat, lng], 13);
        // document.getElementById("latitudepenerima").value = posisiTitik.lat();
        // document.getElementById("longitudepenerima").value = posisiTitik.lng();
        marker2 = L.marker([lat, lng]).addTo(maps2);
    function onMapClickPenerima(e) {
            // alert(this.getLatLng());
            
            maps2.setView(e.latlng, 15);
        document.getElementById("setting-latitude").value = e.latlng.lat;
        document.getElementById("setting-longitude").value = e.latlng.lng;
        let lat = e.latlng.lat;
        let lon = e.latlng.lng;
        $.get('https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat='+lat+'&lon='+lon, function(data){
    // console.log(data.address.road);
    
    // document.getElementById("alamatPenerimaKiramBarang<?=$penerima?>").value = data.address.road;
    });
    // console.log(marker2);
        if (marker2) { // check
          maps2.removeLayer(marker2); // remove
    }
      marker2 = L.marker([e.latlng.lat, e.latlng.lng]).addTo(maps2);
    
    
}
maps2.on('click', onMapClickPenerima);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiZGVmcmluZHIiLCJhIjoiY2s4ZTN5ZjM0MDFrNzNsdG1tNXk2M2dlMSJ9.YXJM0PTu8PSsCCtYVjJNmw'
}).addTo(maps2);
});
JS;

$this->registerJs($js);
