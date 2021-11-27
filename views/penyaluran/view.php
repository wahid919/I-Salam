<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Penyaluran $model
*/

$this->title = 'Penyaluran ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penyaluran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud penyaluran-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'id' => $model->id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Tambah Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'Daftar Penyaluran', ['index'], ['class'=>'btn btn-default']) ?>
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
            <?php $this->beginBlock('app\models\Penyaluran'); ?>

            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                    
                    [
                        'attribute' => 'id_pendanaan',
                        'value' => function ($model) {
                            return $model->pendanaan->nama_pendanaan;
                        }
                    ],
                    [
                        'attribute' => 'nominal',
                        'label' => 'Nominal',
                        'format' => 'raw',
                        'filter' => false,
                        'value' => function ($model) {

                            return \app\components\Angka::toReadableHarga($model->nominal);
                        },
                    ],
                    [
                'attribute' => 'tanggal_penyaluran',
                'label' => 'Tanggal Penyaluran',
                'format' => 'raw',
                'filter' => false,
                'value' => function ($model) {
                    return \app\components\Tanggal::toReadableDate($model->tanggal_penyaluran);
                }
            ],
            ],
            ]); ?>

            <hr/>

            <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
            [
            'class' => 'btn btn-danger',
            'data-confirm' => '' . 'Are you sure to delete this item?' . '',
            'data-method' => 'post',
            ]); ?>
            <?php $this->endBlock(); ?>


            
            <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.$model->id.'</b>',
    'content' => $this->blocks['app\models\Penyaluran'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
