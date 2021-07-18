<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\KategoriPendanaan $model
*/

$this->title = 'Kategori Pendanaan ' . $model->name . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Pendanaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>

<p>
    <?= Html::a('<i class="fa fa-eye-open"></i> Lihat', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
</p>

<?php echo $this->render('_form', [
'model' => $model,
]); ?>
