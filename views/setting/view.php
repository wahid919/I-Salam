<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\Setting $model
 */

$this->title = 'Setting ' . $model->nama_web;
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
<div class="giiant-crud setting-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>

    </p>

    <div class="clearfix"></div>
    <div id="map_canvas"></div>
    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <div class="box box-info">
        <div class="box-body">
            <div class="table-responsive">
                <?php $this->beginBlock('app\models\Setting'); ?>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'attribute' => 'logo',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::img(\Yii::$app->request->BaseUrl . '/uploads/setting/' . $model->logo, ['width' => 100]);
                            },
                        ],
                        [
                            'attribute' => 'bg_login',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::img(\Yii::$app->request->BaseUrl . '/uploads/setting/' . $model->bg_login, ['width' => 100]);
                            },
                        ],
                        [
                            'attribute' => 'bg_pin',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::img(\Yii::$app->request->BaseUrl . '/uploads/setting/' . $model->bg_pin, ['width' => 100]);
                            },
                        ],
                        [
                            'attribute' => 'banner',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::img(\Yii::$app->request->BaseUrl . '/uploads/setting/' . $model->banner, ['width' => 100]);
                            },
                        ],
                        [
                            'attribute' => 'daftar_wakaf',
                            'header' => 'Download Cara Daftar Wakaf',
                            'format' => 'raw',
                            'value' => function ($model) {
                                if ($model->daftar_wakaf != null) {
                                    return Html::a("<i class='fa fa-download'></i>" . ' Unduh Cara daftar wakaf', ["unduh", "id" => $model->id], [
                                        "class" => "btn btn-primary",
                                        "title" => "Unduh File",
                                        "data-confirm" => "Apakah Anda akan mengunduh File ini ?",
                                    ]);
                                } else {
                                    return "Belum Upload File";
                                }
                            }
                        ],
                        'link_download_apk',
                        'link_download_apk_marketing',
                        'nama_web',
                        'judul_web',
                        'email',
                        'phone',
                        'alamat:ntext',
                        'slogan_web:ntext',
                        'youtube_link',
                        'judul_video',
                        'deskripsi_video:ntext',
                        [
                            'attribute' => 'tentang_kami',
                            'format' => 'html',
                        ],
                        [
                            'attribute' => 'visi',
                            'format' => 'html',
                        ],
                        [
                            'attribute' => 'misi',
                            'format' => 'html',
                        ],
                        [
                            'attribute' => 'latar_belakang',
                            'format' => 'html',
                        ],
                        [
                            'attribute' => 'aturan_wakaf',
                            'format' => 'html',
                        ],
                        [
                            'attribute' => 'fiqih_wakaf',
                            'format' => 'html',
                        ],
                        [
                            'attribute' => 'regulasi_wakaf',
                            'format' => 'html',
                        ],
                        [
                            'attribute' => 'pesan',
                            'format' => 'html',
                        ],
                        [
                            'attribute' => 'text_apk',
                            'format' => 'html',
                        ],
                        [
                            'attribute' => 'instagram',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::a('Instagram', $model->instagram, ['target' => '_blank']);
                            },
                        ],
                        [
                            'attribute' => 'facebook',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::a('Facebook', $model->facebook, ['target' => '_blank']);
                            },
                        ],
                        [
                            'attribute' => 'twitter',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::a('Twitter', $model->twitter, ['target' => '_blank']);
                            },
                        ],
                        [
                            'attribute' => 'telegram',
                            'format' => 'html',
                            'value' => function ($model) {
                                return Html::a('Telegram', $model->telegram, ['target' => '_blank']);
                            },
                        ],
                    ],
                ]); ?>

                <hr />

                <!-- <?= Html::a(
                            '<span class="glyphicon glyphicon-trash"></span> ' . 'Delete',
                            ['delete', 'id' => $model->id],
                            [
                                'class' => 'btn btn-danger',
                                'data-confirm' => '' . 'Are you sure to delete this item?' . '',
                                'data-method' => 'post',
                            ]
                        ); ?> -->
                <?php $this->endBlock(); ?>



                <?= Tabs::widget(
                    [
                        'id' => 'relation-tabs',
                        'encodeLabels' => false,
                        'items' => [[
                            'label'   => '<b class=""># ' . $model->nama_web . '</b>',
                            'content' => $this->blocks['app\models\Setting'],
                            'active'  => true,
                        ],]
                    ]
                );
                ?>
            </div>
        </div>
    </div>
</div>
<?php

// if($model->coordinate!=null){
//     $coordinate = json_decode($model->coordinate);
//     $model->latitude = $coordinate->latitude;
//     $model->longitude = $coordinate->longitude;
// }
$lat = ($model->latitude) ? $model->latitude : 0;
$long = ($model->longitude) ? $model->longitude : 0;

$js = <<<JS
$(function() {
    let lat = $lat,
     lng = $long,
    
    map = L.map("map_canvas").setView([lat, lng], 13);
   let marker = L.marker([lat, lng]).addTo(map);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiZGVmcmluZHIiLCJhIjoiY2s4ZTN5ZjM0MDFrNzNsdG1tNXk2M2dlMSJ9.YXJM0PTu8PSsCCtYVjJNmw'
}).addTo(map);
});
JS;

$this->registerJs($js);
