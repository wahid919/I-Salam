<?php

use app\components\Constant;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<style>
    #FormLogin input {
        border-radius: 1.2rem;
        padding: .4rem 1rem;
        border: 1px solid #ccc;
    }

    #FormLogin .control-label {
        z-index: 9999;
        position: relative;
        bottom: -1.7rem;
        font-size: .8rem;
        left: 1.2rem;
        padding: .3rem;
        background: whitesmoke;
    }

    /* Change autocomplete styles in WebKit */
    #FormLogin input:-webkit-autofill,
    #FormLogin input:-webkit-autofill:hover,
    #FormLogin input:-webkit-autofill:focus,
    #FormLogin textarea:-webkit-autofill,
    #FormLogin textarea:-webkit-autofill:hover,
    #FormLogin textarea:-webkit-autofill:focus,
    #FormLogin select:-webkit-autofill,
    #FormLogin select:-webkit-autofill:hover,
    #FormLogin select:-webkit-autofill:focus {
        -webkit-box-shadow: 0 0 0px 1000px whitesmoke inset;
    }

    .btn-registrasi {
        width: 100%;
        border-radius: 1rem;
        background-color: #f1a502;
        border-color: #f1a502;
    }
    label{
        color: #a5a5a5;
    }
</style>

<div style='text-align:center;width:100%'><h2>Login</h2> <p style="color: #a5a5a5;">Silahkan mengisi Data Anda untuk login</p></div>
<?php $form = ActiveForm::begin([
    'id' => 'FormLogin',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
]);
?>
<div class="row">
    <?= $form->field($model, "username", Constant::COLUMN(1))->textInput(['type' => 'email'])->label("Email") ?>
    <?= $form->field($model, "password", Constant::COLUMN(1))->passwordInput() ?>
    <?= $form->field($model, 'reCaptcha', ["template" => "{input}"])->widget(
        \app\components\ReCaptcha3::className(),
        [
            'siteKey' => Yii::$app->params['recaptcha3.clientKey'], // unnecessary is reCaptcha component was set up
            'action' => 'login',
        ]
    ) ?>
    <div class="col-12 pb-4 ml-4">
        <a id="btn-forgot" style="color:#a5a5a5;cursor:pointer">Lupa Password</a>
    </div>
    <div class="col-md-12">
        <div class="col-md-12">
            <button class="btn btn-primary btn-xs btn-registrasi">
                <?= Yii::t("cruds", "Login") ?>
            </button>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>