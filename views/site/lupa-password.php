<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\LoginForm */

$set = \app\models\Setting::find()->all();
$this->title = 'Lupa Password - ' . Yii::$app->name;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">

        <?= Html::img(["uploads/setting/" . $set["0"]->logo], ["width" => "210px"]) ?>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Silakan masukkan email anda disini</p>
        <?php if (Yii::$app->session->hasFlash('success')) : ?>
                    <p style="color:#00f">
                        <?= Yii::$app->session->getFlash('success') ?>
                    </p>
                <?php endif; ?>

                <!-- display error message -->
                <?php if (Yii::$app->session->hasFlash('error')) : ?>
                    <p style="color:#f00">
                        <?= Yii::$app->session->getFlash('error') ?>
                    </p>
                <?php endif; ?>
        <?php $form = ActiveForm::begin([
                    'id' => 'forgot-form',
                    'enableClientValidation' => false,
                ]); ?>

        <div class="col-12">
        <label for="Email">Email</label>
                    <input class="form-control" name="Lupa[email]" id="ContactForm_email" type="email">
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-8">
            <?= Html::a(
                    '<svg fill="#000000" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="24px" height="24px">    <path d="M 12 2 A 1 1 0 0 0 11.289062 2.296875 L 1.203125 11.097656 A 0.5 0.5 0 0 0 1 11.5 A 0.5 0.5 0 0 0 1.5 12 L 4 12 L 4 20 C 4 20.552 4.448 21 5 21 L 9 21 C 9.552 21 10 20.552 10 20 L 10 14 L 14 14 L 14 20 C 14 20.552 14.448 21 15 21 L 19 21 C 19.552 21 20 20.552 20 20 L 20 12 L 22.5 12 A 0.5 0.5 0 0 0 23 11.5 A 0.5 0.5 0 0 0 22.796875 11.097656 L 12.716797 2.3027344 A 1 1 0 0 0 12.710938 2.296875 A 1 1 0 0 0 12 2 z"/></svg>',
                    ['home/index'],
                    ['class' => 'arrow']
                ) ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                
            <?= Html::submitButton('<i class="fa fa-lock"></i> Submit', ['class' => 'btn btn-primary btn-block btn-flat','id'=>'logIn', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->