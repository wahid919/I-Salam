<hr class="mt-0">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
            <?= $this->render('component/sidemenu-profile') ?>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 col-12 profile-section">
            <h3 class="text-isalam-1 font-weight-bold text-detail-program">Notifikasi</h3>
            <div class="row">
                <?php foreach($pembayaran as $bayar){ ?>
                    <div class="col-lg-6 col-md-6 col-sm-8 col-8 text-left border-bottom-3">
                    <p class="font-weight-bold">Wakaf <?= $bayar->pendanaan->nama_pendanaan ?> atas nama <?= $bayar->nama ?></p>
                    <p class="font-size-08"><?= \app\components\Tanggal::toReadableDate($bayar->created_at); ?> | <span class="text-isalam-1"><?= \app\components\Angka::toReadableHarga($bayar->nominal); ?></span></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4 col-4 text-right border-bottom-3">
                    <p>Status Pembayaran</p>
                    <?php if($bayar->status_id == 5){
                        echo '
                        <p><a href="#" class="btn btn-sm btn-program btn-warning">'.$bayar->status->name.'</a></p>';
                    }elseif($bayar->status_id ==6){
                        echo '
                        <p><a href="#" class="btn btn-sm btn-program btn-success">'.$bayar->status->name.'</a></p>';
                    } elseif($bayar->status_id ==8){
                        echo '
                        <p><a href="#" class="btn btn-sm btn-program btn-danger">'.$bayar->status->name.'</a></p>';
                    }elseif($bayar->status_id ==10){
                        echo '
                        <p><a href="#" class="btn btn-sm btn-program btn-info">'.$bayar->status->name.'</a></p>';
                    }     
                    ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>