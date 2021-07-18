<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\HutangPiutang;
use app\models\TransaksiUang;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$month = date('m');
$mm = date('F');
$this->title = 'Hutang Piutang ';
$this->params['breadcrumbs'][] = $this->title;
// var_dump($mm);
// die;
$year = date('Y');
$datenow = date('Y-m-d');
$sum_piutang = HutangPiutang::find()
// ->where(['and', ['>=', 'created_at', "$year-$month-01"], ['<=', 'created_at', "$datenow"]])
->sum('piutang');
$sum_hutang = HutangPiutang::find()
// ->where(['and', ['>=', 'created_at', "$year-$month-01"], ['<=', 'created_at', "$datenow"]])
->sum('hutang');
?>
<div class="absensi-index">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <div class="box-body">
                    <!-- Date range -->
                    <div class="form-group">
                        <?php $form = ActiveForm::begin([
        'action' => ['list-hutang'],
        'method' => 'get',
    ]); ?>
<?=
 $form->field($searchModel, 'date_start')->widget(\kartik\datecontrol\DateControl::class, [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Pilih Tanggal Awal',
                'autoclose' => true
            ]
        ],
    ]); ?>
                        <?=
     $form->field($searchModel, 'date_end')->widget(\kartik\datecontrol\DateControl::class, [
            'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
            'saveFormat' => 'php:Y-m-d',
            'ajaxConversion' => true,
            'options' => [
                'pluginOptions' => [
                    'placeholder' => 'Pilih Tanggal akhir',
                    'autoclose' => true
                ]
            ],
        ]); ?>


                        <div class="form-group">
                            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
                            <!-- ?=Html::a('Print', ['cetak-list-perhitungan'], ['class' => 'btn btn-success'])?> -->
                        </div>

                        <?php ActiveForm::end(); ?>
                        <?php
$gridColumn = [
    ['class' => 'yii\grid\SerialColumn'],
    [

        'attribute' => 'created_at',
        'filter' => false,
        'format' => ['date', 'php:d F Y']

    ],    
    [    
        'attribute'=>'tanggal_tempo',
        'filter' => false,
        'format' => ['date', 'php: d F Y']
    ],
    [    
        'attribute'=>'perusahaan',
        'filter' => false,
    ],
    [    
        'attribute'=>'kelompok',
        'filter' => false,
    ],
    [
        'attribute' => 'piutang',
        'label' => 'Piutang',
        'format' => 'raw',
        'footer' =>"IDR  " . number_format($sum_piutang, 2, ",", "."),
        'filter' => false,
        'value' => function ($model) {

            return "IDR  " . number_format($model->piutang, 2, ",", ".");

        },
    ],
    [
        'attribute' => 'hutang',
        'label' => 'Hutang',
        'format' => 'raw',
        'footer' => "IDR  " . number_format($sum_hutang, 2, ",", "."),
        'filter' => false,
        'value' => function ($model) {
            return "IDR  " . number_format($model->hutang, 2, ",", ".");

        },
    ],
    [
        'attribute' => 'status',
        'filter'=>false,
        'value' => function($model){
            if($model->status == 1){
                return ($model->status == 1) ? "Sudah Dibayarkan" : "Belum Dibayarkan";

            }else{
                return ($model->status == 0) ? "Belum Dibayarkan" : "Belum Dibayarkan";
            }
        }
    ],

];
$pdfHeader = [
    'L'    => [
        'content' => $this->render('header_gambar'),
    ],
    'C'    => [
        'content'     => 'AMONG TANI FOUNDATION'."<br>".'
        JL.HASANUDIN NO.22 KOTA BATU,65313'."<br>".'
        Phone : (0341 3061627) Email : amongtanifound@gmail.com
        ',
        'font-size'   => 7,
        'font-style'  => 'B',
        'font-family' => 'arial',
        'color'       => '#333333',
    ],
    'R'    => [
        'content' => 'RIGHT CONTENT (HEAD)',
    ],
    'line' => true,
];

$pdfFooter = [
    'L'    => [
        'content'     =>  $this->render('footer_ttd_left'),
    ],
    'C' => [
        'content' => $this->render('footer_ttd_center'),
    ],
    'R' => [
        'content' => $this->render('footer_ttd_right'),
    ],
    'line' => true,
];
?>
                        <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'showFooter' => true,
    'columns' => $gridColumn,
    'pjax' => true,
    'pjaxSettings' => [ 
        'afterGrid' => $this->render('header_gambar'),
        'options' => ['id' => 'kv-pjax-container-list-hutang']
    ],
    'panel' => [
        //'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
    ],
    // 'export' => [
       'exportConfig' => [
            GridView::PDF => [
            'filename' => 'Hutang Piutang',
            'exportContent' => "p",
            'config' => [
              'methods' => [
                'SetHeader' => [
                  ['odd' => $pdfHeader, 'even' => $pdfHeader]
                ],
                'SetFooter' => [
                  ['odd' => $pdfFooter, 'even' => $pdfFooter]
                ],
                'WriteHTML' => [
                    '`',
                ],
              ],
              'options' => [
                'title' => 'Hutang Piutang',
                'subject' => 'Hutang Piutang',
                'keywords' => 'pdf, Hutang Piutang, export, other, keywords, here'
              ],
            ]   
          ],
           GridView::EXCEL => [
            'filename' => 'Hutang Piutang',
            'config' => [
              'methods' => [
                'SetHeader' => [
                  ['odd' => $pdfHeader, 'even' => $pdfHeader]
                ],
                'SetFooter' => [
                  ['odd' => $pdfFooter, 'even' => $pdfFooter]
                ],
              ],
              'options' => [
                'title' => 'Hutang Piutang',
                'subject' => 'Hutang Piutang',
                'keywords' => 'pdf, Hutang Piutang, export, other, keywords, here'
              ],
            ]   
    ],
    //    ]
     ],
]);?>
                    </div>
                </div>
            </div>
        </div>
    </div>