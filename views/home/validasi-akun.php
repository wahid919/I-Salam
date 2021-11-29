<hr class="mt-0">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
            <?= $this->render('component/sidemenu-profile') ?>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 col-12 profile-section">
            <h3 class="text-isalam-1 font-weight-bold text-detail-program">Verifikasi Akun Anda</h3>
            <?php

            use yii\bootstrap\ActiveForm;
            use yii\helpers\Html;

            $form = ActiveForm::begin([
                'id' => 'otp',
                'layout' => 'horizontal',
                'enableClientValidation' => true,
                'errorSummaryCssClass' => 'error-summary alert alert-error',
                'enableClientScript' => false,
            ]);
            ?>
            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <?= $form->field(
                        $model,
                        'kode_otp',
                        [
                            'template' => '
                                {label}
                                {input}
                                {error}
                            ',
                            'inputOptions' => [
                                'class' => 'form-control'
                            ],
                            'labelOptions' => [
                                'class' => 'control-label'
                            ],
                            'options' => ['tag' => false]
                        ]
                    )->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <a href="<?= \Yii::$app->request->BaseUrl . "/home/kirim-otp/" ?>" class="btn btn-sm btn-program btn-info btn-block" style="padding:10px!important;">Kirim OTP</a>
                </div>
                <div class="col-6">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-sm btn-program btn-block', 'style' => 'padding:10px!important;width:100%']); ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>