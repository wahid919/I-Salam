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
            <div class="col-md-12 col-lg-12 mb-12">
        <b>Cari Lokasi</b> : <input id="searchTextField" class="form-control" type="text" size="50" style="text-align: left;width:357px;direction: ltr;margin-bottom:1rem;">
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
    latlng = new google.maps.LatLng(lat, lng);
let mapOptions = {
        center: new google.maps.LatLng(lat, lng),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        panControl: true,
        panControlOptions: {
            position: google.maps.ControlPosition.TOP_RIGHT
        },
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.TOP_left
        }
    },
    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
    marker = new google.maps.Marker({
        position: latlng,
        map: map,
    });
let input = document.getElementById('searchTextField');
let autocomplete = new google.maps.places.Autocomplete(input, {
    types: ["geocode"]
});
autocomplete.bindTo('bounds', map);
let infowindow = new google.maps.InfoWindow();
google.maps.event.addListener(autocomplete, 'place_changed', function(event) {
        infowindow.close();
        let place = autocomplete.getPlace();
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        moveMarker(place.name, place.geometry.location);
        id_lat.val(place.geometry.location.lat());
        id_lng.val(place.geometry.location.lng());
        let pass = document.getElementById('searchTextField').value;
        $('#masterpuskesmas-alamat').val(pass);
    });
    google.maps.event.addListener(map, 'click', function(event) {
        id_lat.val(event.latLng.lat());
        id_lng.val(event.latLng.lng());
        infowindow.close();
        let geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            "latLng": event.latLng
        }, function(results, status) {
            // console.log(results, status);
            if (status == google.maps.GeocoderStatus.OK) {
                // console.log(results);
                let lat = results[0].geometry.location.lat(),
                    lng = results[0].geometry.location.lng(),
                    placeName = results[0].address_components[0].long_name,
                    latlng = new google.maps.LatLng(lat, lng);
                moveMarker(placeName, latlng);
                $("#searchTextField").val(results[0].formatted_address);
                $('#masterpuskesmas-alamat').val(results[0].formatted_address);
            }
        });
    });
    function moveMarker(placeName, latlng) {
        marker.setPosition(latlng);
        infowindow.setContent(placeName);
        //infowindow.open(map, marker);
    }
});
JS;

$this->registerJs($js);