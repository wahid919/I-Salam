<?php
$this->title = "Dashboard Pegawai";
$model = Yii::$app->user->identity;

?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h2>QR Code Untuk Presensi Anda</h2>
            </div>
            <div class="box-body">
                <img src="<?=Yii::getAlias("@web/uploads/user/qr_code/{$model->id}.png")?>" alt="" srcset=""
                    class="img img-responsive" style="margin: auto">
            </div>
        </div>
    </div>
</div>