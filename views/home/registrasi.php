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
        background: whitesmoke;
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
        border-radius: 1rem
    }
</style>

<?php $form = ActiveForm::begin([
    'id' => 'FormRegister',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
]);
?>
<div class="row">
    <?= $form->field($model, "name", Constant::COLUMN(1))->textInput() ?>
    <?= $form->field($model, "nomor_handphone", Constant::COLUMN(1))->textInput()->label("No HP") ?>
    <?= $form->field($model, "username", Constant::COLUMN(1))->textInput()->label("Email") ?>
    <?= $form->field($model, "password", Constant::COLUMN(2))->passwordInput() ?>
    <?= $form->field($model, "konfirmasi_password", Constant::COLUMN(2))->passwordInput() ?>
    <?= $form->field($model, "pin", Constant::COLUMN(2))->passwordInput() ?>
    <?= $form->field($model, "konfirmasi_pin", Constant::COLUMN(2))->passwordInput() ?>
    <div class="col-md-12">
        <div class="col-md-12">
            <button class="btn btn-primary btn-xs btn-registrasi">
                <?= Yii::t("cruds", "Registrasi Sekarang") ?>
            </button>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>