<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Order $model
*/

$this->title = 'Pencairan Pendanaan  ' . $model->nama_pendanaan;
?>

<p>
    <?= Html::a('<i class="fa fa-eye-open"></i> Lihat', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
</p>

<?php echo $this->render('_form_cair', [
'model' => $model,
'cair' => $cair,
]); ?>
