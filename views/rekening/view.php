<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Rekening $model
*/

$this->title = 'Rekening ' . $model->jenis_bank;
$this->params['breadcrumbs'][] = ['label' => 'Rekening', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud rekening-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'id' => $model->id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Tambah Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'Daftar Rekening', ['index'], ['class'=>'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

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
            <?php $this->beginBlock('app\models\Rekening'); ?>

            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
        'jenis_bank',
        'nomor_rekening',
        'nama_rekening',
        'jenis_rekening',
        [
            'attribute' => 'Status',
            'format' => 'html',
            'value' => function ($model) {
              if ($model->flag == 0) {
                return '<span class="label label-danger">Nonaktif</span>';
              } elseif ($model->flag == 1) {
                return '<span class="label label-success">Aktif</span>';
              }
            }
        ],
            ],
            ]); ?>

            <hr/>

            <?php
            if($model->flag == 1){
                echo Html::a('<span class="glyphicon glyphicon-remove"></span> ' . 'Non Aktif', ['delete', 'id' => $model->id],
            [
            'class' => 'btn btn-danger',
            'data-confirm' => '' . 'Apakah Anda Yakin Menonaktifkan Data ini?' . '',
            'data-method' => 'post',
            ]);
            }else{
                echo Html::a('<span class="glyphicon glyphicon-ok"></span> ' . 'Aktifkan Data', ['delete', 'id' => $model->id],
            [
            'class' => 'btn btn-success',
            'data-confirm' => '' . 'Apakah Anda Yakin Mengaktifkan Data ini?' . '',
            'data-method' => 'post',
            ]);
            }
             ?>
            <?php $this->endBlock(); ?>


            
            <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.$model->id.'</b>',
    'content' => $this->blocks['app\models\Rekening'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
