<?php

use kartik\file\FileInput;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
/**
 * @var yii\web\View $this
 * @var app\models\Pengajuan $model
 * @var yii\widgets\ActiveForm $form
 */

?>
<div class="box box-info">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
    'id' => 'dynamic-form',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error',
]
);
?>
        <!-- <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Addresses</h4></div> -->
        <div class="panel-body">
        <?php
    $wizard_config = [
        'id' => 'stepwizard',
        'steps' => [
            1 => [
                'title' => 'Data Pendanaan',
                'icon' => 'glyphicon glyphicon-user',
                'content' => $this->render('_form_awal',['model' => $model,'form' => $form]),
            ],
            2 => [
                'title' => 'Data Bank',
                'icon' => 'glyphicon glyphicon-credit-card',
                'content' => $this->render('_form_bank',['model' => $model,'form' => $form]),
            ],
            3 => [
                'title' => 'Upload File',
                'icon' => '	glyphicon glyphicon-picture',
                'content' => $this->render('_form_upload',['model' => $model,'form' => $form]),
            ],
        ],
        'complete_content' => $this->render('_action',['model' => $model,
        'form' => $form]), // Optional final screen
        'start_step' => 1, // Optional, start with a specific step
    ];
    ?>
    <?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>
			     <hr/>      
            </div>
        <?php echo $form->errorSummary($model); ?>
        <?php ActiveForm::end(); ?>

</div>