<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var app\models\search\PenyaluranSearch $searchModel
*/

$this->title = 'Penyaluran';
$this->params['breadcrumbs'][] = $this->title;
?>



    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

    <div class="box box-info">
        <div class="box-body">
            <div class="table-responsive">
                <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                'pager'        => [
                'class'          => yii\widgets\LinkPager::className(),
                'firstPageLabel' => 'First',
                'lastPageLabel'  => 'Last'                ],
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class'=>'x'],
                'columns' => [

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
			// 'tanggal_penyaluran',
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
            </div>
        </div>
    </div>

    <?php \yii\widgets\Pjax::end() ?>

