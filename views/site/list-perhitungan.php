<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\Debit;
use app\models\Kredit;
use app\models\TransaksiUang;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


$month = date('m');
$mm = date('F');
$this->title = 'Laba / Rugi Detail di Tahun '.date('Y');
$this->params['breadcrumbs'][] = $this->title;
// var_dump($mm);
// die;
$year = date('Y');
$datenow = date('Y-m-d');
$sum_debit = TransaksiUang::find()
    ->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
    ->sum('debit');
$sum_kredit = TransaksiUang::find()
    ->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
    ->sum('kredit');
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
        'action' => ['list-perhitungan'],
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
          <?= $form->field($searchModel, 'id_perusahaan')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Perusahaan::find()->asArray()->all(), 'id_perusahaan', 'nama_perusahaan'),
        'options' => ['placeholder' => 'Pilih Perusahaan'],
        'pluginOptions' => [
            'allowClear' => true
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
        'attribute' => 'tanggal',
        'filter' => false,
    ],
    [
        'attribute' => 'id_kelompok_rekening',
        'label' => 'Jurnal Rekening',
        'filter' => false,
        'value' => function ($model) {
            return $model->kelompokRekening->nama;

        },
    ],
    [
        'attribute' => 'id_jenis_transaksi',
        'filter' => false,
        'value' => function ($model) {
            return $model->jenisTransaksi->nama;

        },
    ],
    [
        'attribute' => 'id_perusahaan',
        'filter' => false,
        'value' => function ($model) {
            return $model->perusahaan->nama_perusahaan;

        },
    ],
    [
        'attribute' => 'id_kelompok_rekening',
        'filter' => false,
        'value' => function ($model) {
            return $model->kelompokRekening->kelompok;

        },
    ],
    [
        'attribute' => 'debit',
        'label' => 'Debit',
        'format' => 'raw',
        'footer' =>"IDR  " . number_format($sum_debit, 2, ",", "."),
        'filter' => false,
        'value' => function ($model) {

            return "IDR  " . number_format($model->debit, 2, ",", ".");

        },
    ],
    [
        'attribute' => 'kredit',
        'label' => 'Kredit',
        'format' => 'raw',
        'footer' => "IDR  " . number_format($sum_kredit, 2, ",", "."),
        'filter' => false,
        'value' => function ($model) {
            return "IDR  " . number_format($model->kredit, 2, ",", ".");

        },
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
    // 'R'    => [
    //     'content'     => 'RIGHT CONTENT (FOOTER)',
    //     'font-size'   => 10,
    //     'color'       => '#333333',
    //     'font-family' => 'arial',
    // ],
    'line' => true,
];
?>
                    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'showFooter' => true,
    'columns' => $gridColumn,
    'pjax' => true,
    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-absensi']],
    'panel' => [
        //'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
    ],
    // 'export' => [
       'exportConfig' => [
            GridView::PDF => [
            'filename' => 'Laba Rugi',
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
                'title' => 'Laba Rugi',
                'subject' => 'Laba Rugi',
                'keywords' => 'pdf, Laba Rugi, export, other, keywords, here'
              ],
            ]   
          ],
    //    ]
     ],
    // your toolbar can include the additional full export menu
    // 'toolbar' => [
    //     '{export}',
    //     ExportMenu::widget([
    //         'dataProvider' => $dataProvider,
    //         'columns' => $gridColumn,
    //         'target' => ExportMenu::TARGET_BLANK,
    //         'fontAwesome' => true,
    //         'dropdownOptions' => [
    //             'label' => 'Full',
    //             'class' => 'btn btn-default',
    //             'itemsBefore' => [
    //                 '<li class="dropdown-header">Export All Data</li>',
    //             ],
    //         ],
    //         'exportConfig' => [
    //             ExportMenu::FORMAT_HTML => false,
    //             ExportMenu::FORMAT_TEXT => false,
    //             // ExportMenu::FORMAT_PDF => false,
    //         ],
    //         'filename' => 'Export '.date('d-F-Y')
    //     ]),
    // ],
]);?>
                </div>
            </div>
        </div>
    </div>
</div>