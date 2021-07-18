<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\Debit;
use app\models\Kredit;
use app\models\TransaksiUang;
use yii\widgets\ActiveForm;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = 'List Jurnal';
$this->params['breadcrumbs'][] = $this->title;
$month = date('m');
$mm = date('F');
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
// $saldo_last = TransaksiUang::find()
// ->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
// ->select(['saldo_akhir'])
// ->limit(1)
// ->orderBy(['id' => SORT_DESC])
// ->findAll();
// $saldo_last = (new \yii\db\Query())
//     ->select('saldo_akhir')
//     ->from('transaksi_uang')
//     ->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
//     ->limit(1)
//     ->orderBy(['id' => SORT_DESC])
//     ->all();
// $saldo_last = $query->all();
// echo $saldo_last->createCommand()->sql;
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
        'action' => ['jurnal'],
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
     <?= $form->field($searchModel, 'pilihan')->widget(\kartik\select2\Select2::className(),[
            'data' => \yii\helpers\ArrayHelper::map(
                \app\models\KelompokRekening::find()
                ->groupBy('kelompok')->select('kelompok')->all(), 
            'kelompok', 
            'kelompok'),
            'value' => $kelompok,
            'options' => ['id' => 'kelompok', 'placeholder' => 'Pilih Debit / Kredit'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
     <?= $form->field($searchModel, 'id_kelompok_rekening')->widget(\kartik\depdrop\DepDrop::classname(), [
        'type' => \kartik\depdrop\DepDrop::TYPE_SELECT2,
        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
        'options'=>['id'=>'id_kelompok_rekening'],
        'pluginOptions'=>[
            'depends'=>['kelompok'],
            'initialize' => true,
            'placeholder'=>'Pilih Kelompok Rekening...',
            'url'=>\yii\helpers\Url::to(['/transaksi-uang/kelompok'])
        ]
    ]); ?>

   
   <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
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
        'label' => 'Kode Rekening',
        'filter' => false,
        'value' => function ($model) {
            return $model->kelompokRekening->id;

        },
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
        'attribute' => 'id_kelompok_rekening',
        'label' => 'Jenis Rekening',
        'filter' => false,
        'value' => function ($model) {
            return $model->kelompokRekening->jenis;

        },
    ],
    [
        'attribute' => 'kelompok',
        'label' => 'Kelompok Rekening',
        'filter' => false,
        'value' => function ($model) {
            return $model->kelompokRekening->kelompok;

        },
    ],
    [
        'attribute' => 'keterangan',
        'label'=>'Keterangan Transaksi',
        'filter' => false,
    ],
    [
        'attribute' => 'debit',
        'label' => 'Debit',
        'format' => 'raw',
        // 'footer' => "Rp " . $sum_debit,
        'filter' => false,
        'value' => function ($model) {

            return "IDR  " . number_format($model->debit, 2, ",", ".");

        },
    ],
    [
        'attribute' => 'kredit',
        'label' => 'Kredit',
        'format' => 'raw',
        // 'footer' => "Rp " . $sum_kredit,
        'filter' => false,
        'value' => function ($model) {
            return "IDR  " . number_format($model->kredit, 2, ",", ".");

        },
    ],
    // [
    //     'attribute' => 'k',
    //     'label' => 'Saldo',
    //     'footer' => "Rp " . $saldo_last[0]['saldo_akhir'],
    //     'filter' => false,
    //     'value' => function ($model) {
    //         return "Rp " . $model->saldo_akhir;

    //     },
    // ],

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
    // 'R'    => [
    //     'content' => 'RIGHT CONTENT (HEAD)',
    // ],
    'line' => true,
];

$pdfFooter = [
    'L'    => [
        'content'     =>  $this->render('header_gambar'),
    ],
    // 'C'    => [
    //     'AMONG TANI FOUNDATION'."<br>".'
    //     JL.HASANUDIN NO.22 KOTA BATU,65313'."<br>".'
    //     Phone : (0341 3061627) Email : amongtanifound@gmail.com
    //     ',
    // ],
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
    'columns' => $gridColumn,
    'pjax' => true,
    'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-absensi']],
    'panel' => [
        //'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
    ],
    'exportConfig' => [
        GridView::PDF => [
        'filename' => 'Jurnal Export '.date('d F Y'),
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
            'title' => 'Jurnal',
            'subject' => 'Jurnal',
            'keywords' => 'pdf, Jurnal, export, other, keywords, here'
          ],
        ]   
      ],
    ],
    // your toolbar can include the additional full export menu
    // 'toolbar' => [
    //     '{export}',
    //     ExportMenu::widget([
    //         'dataProvider' => $dataProvider,
    //         'columns' => $gridColumn,
    //         'panel' => [
    //             'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Countries</h3>',
    //             'type'=>'success',
    //             'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Country', ['create'], ['class' => 'btn btn-success']),
    //             'after'=>Html::a('<i class="fas fa-redo"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
    //             'footer'=>false
    //         ],
    //         // 'target' => ExportMenu::TARGET_BLANK,
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