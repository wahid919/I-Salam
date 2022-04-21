<?php

use app\components\Constant;
use yii\bootstrap\ActiveForm;

?>
<style>
    #FormRegister input {
        border-radius: 1.2rem;
        padding: .4rem 1rem;
        border: 1px solid #ccc;
    }

    #FormRegister .control-label {
        z-index: 9999;
        position: relative;
        bottom: -1.7rem;
        font-size: .8rem;
        left: 1.2rem;
        padding: .3rem;
        background: white;
    }

    /* Change autocomplete styles in WebKit */
    #FormRegister input:-webkit-autofill,
    #FormRegister input:-webkit-autofill:hover,
    #FormRegister input:-webkit-autofill:focus,
    #FormRegister textarea:-webkit-autofill,
    #FormRegister textarea:-webkit-autofill:hover,
    #FormRegister textarea:-webkit-autofill:focus,
    #FormRegister select:-webkit-autofill,
    #FormRegister select:-webkit-autofill:hover,
    #FormRegister select:-webkit-autofill:focus {
        -webkit-box-shadow: 0 0 0px 1000px whitesmoke inset;
    }

    .btn-registrasi {
        width: 100%;
        border-radius: 1rem;
        background-color: #f1a401;
        border-color: #f1a401;
    }
    label{
        color: #a5a5a5;
    }
    .btn-primary:hover {
  background-color: #d07400; /* Green */
border-color: #d07400;
}
</style>
<div style='text-align:center;width:100%'><h2>Mendaftar</h2> <p style="color: #a5a5a5;">Silahkan mengisi Data Anda untuk mendaftar</p></div>

<?php $form = ActiveForm::begin([
    'id' => 'FormRegister',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
]);
?>
<div class="row">
    <?= $form->field($model, "name", Constant::COLUMN(1))->textInput() ?>
    <?= $form->field($model, "nomor_handphone", Constant::COLUMN(1))->textInput([
        "onkeydown" => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');",
        "onkeyup" => "this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');",
    ])->label("No HP") ?>
    <?= $form->field($model, "username", Constant::COLUMN(1))->textInput(['type'=>'email'])->label("Email") ?>
    <?= $form->field($model, "password", Constant::COLUMN(2))->passwordInput() ?>
    <?= $form->field($model, "konfirmasi_password", Constant::COLUMN(2))->passwordInput() ?>
    <?= $form->field($model, "pin", Constant::COLUMN(2))->hiddenInput(['value' => "123456"])->label(false) ?>
    <?= $form->field($model, "konfirmasi_pin", Constant::COLUMN(2))->hiddenInput(['value' => "123456"])->label(false) ?>
    <?= $form->field($model, 'reCaptcha', ["template" => "{input}"])->widget(
        \app\components\ReCaptcha3::className(),
        [
            'siteKey' => Yii::$app->params['recaptcha3.clientKey'], // unnecessary is reCaptcha component was set up
            'action' => 'registrasi',
        ]
    ) ?>
    <div class="col-md-12">
        <div class="col-md-12">
            <button class="btn btn-primary btn-xs btn-registrasi">
                <?= Yii::t("cruds", "Registrasi Sekarang") ?>
            </button>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>