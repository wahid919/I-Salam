<?php

use yii\web\View;
use yii\helpers\Url;
use app\models\Pembayaran;
?>
<style>
    /* .owl-nav {
        position: absolute;
        top: 45%;
        left: -1.5rem;
        right: -1.5rem;
        display: flex;
        justify-content: space-between;
        overflow: hidden;
    }

    .owl-nav .owl-prev,
    .owl-nav .owl-next {
        font-size: 1rem;
        padding: 0 .5rem;
        margin: 0 1rem;
        border-radius: 100%;
        background: #fff;
        box-shadow: 0 0 3px 0 #ccc;
        color: #aaa;
    }

    .owl-stage,
    .owl-item {
        overflow: hidden;
        border-radius: 1rem;
    }

    .owl-dots,
    .owl-thumbs {
        display: none;
    }

    .btn-more {
        padding: 0;
        background-color: #F1A527;
    }


    .ad {
        margin: 20px auto;
        max-width: 768px;
        background-image: url('https://tribratanewspolrestasidoarjo.com/img/berita/Berita-20210706085545.jpg');
        background-size: cover;
        background-position: left center;
        border: 1px solid #333;

    }

    .link {
        background-color: rgba(245, 160, 25, .8);
        padding: 10px 20px;
        font-size: 2.15em;
        line-height: 90px;
        font-family: 'Oswald', sans-serif;
        text-transform: uppercase;
        transition: all .15s ease;
        text-align: center;
    }

    .link:hover {
        background-color: rgba(245, 160, 25, .8);
        transition: all .15s ease;
    }

    .conten {
        clear: both;
        padding: 1px 0 0 0;
    }

    .logo {
        width: 283px;
        height: 50px;
        margin: 30px auto;
        background-image: url('https://tribratanewspolrestasidoarjo.com/img/berita/Berita-20210706085545.jpg');
        background-size: cover;
        background-position: center center;
    }

    a {
        display: block;
        color: #ffffff;
        text-decoration: none;
    }

    @media screen and (min-width: 525px) {
        .ad {
            height: 150px;
        }

        .conten {
            padding: 0 25px;
        }

        .logo {
            float: left;
        }

        .link {
            float: right;
            background-color: rgba(255, 255, 255, .25);
        }
    }

    @media (min-width:1200px) {
        .container {
            max-width: 1540px
        }
    } */
    .btn {
        text-transform: capitalize;
        position: relative;
        font-size: 14px;
        font-weight: 700;
        /* width: 170px; */
        height: 50px;
        line-height: 48px;
        border-radius: 3px;
        text-align: right;
        padding: 0;
        margin-top: -10%;
        /* letter-spacing: 0.4px; */
        border-radius: 2px;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .btn-danger {
        color: #000 !important;
        background-color: white !important;
        border-color: white !important;
    }

    .btn-danger:hover {
        color: #000 !important;
        background-color: white !important;
        border-color: white !important;
    }

    .btn:focus {
        color: #000 !important;
        background-color: white !important;
        border-color: white !important;
    }

    .btn {
        width: auto;
    }
</style>
<hr class="mt-0">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
            <?= $this->render('component/sidemenu-profile') ?>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 col-12 profile-section">
            <h3 class="text-isalam-1 font-weight-bold text-detail-program">Laporan Wakaf</h3>
            <div class="header-panel-wrap">
                <ul class="nav nav-tabs pb-0 border-d-program" id="isalam" role="tablist">
                    <li class="nav-item text-center">
                        <a class="nav-link font-weight-bold font-size-1 font-grey-78 active" id="detail-tab" data-toggle="tab" href="#wakaf" role="tab" aria-controls="wakaf" aria-selected="true">Wakaf</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link font-weight-bold font-size-1 font-grey-78" id="produktif-tab" data-toggle="tab" href="#produktif" role="tab" aria-controls="produktif" aria-selected="false">Wakaf Produktif</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link font-weight-bold font-size-1 font-grey-78" id="pendapatan-tab" data-toggle="tab" href="#pendapatan" role="tab" aria-controls="pendapatan" aria-selected="false">Pendapatan Wakaf Produktif</a>
                    </li>
                </ul>
                <div class="tab-content pt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="wakaf" role="tabpanel" aria-labelledby="wakaf-tab">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card shadow-br3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="border-r10" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/money-icon.png" width="100px">
                                            </div>
                                            <div class="col-8">
                                                <p class="text-isalam-1 font-weight-bold font-size-1-3"><?= \app\components\Angka::toReadableHarga($jumlah_pembayaran); ?></p>
                                                <p class="font-weight-bold font-size-08">Total Dana Tersalurkan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 pb-4">
                                <div class="card shadow-br3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="border-r10" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/success.png" width="100px">
                                            </div>
                                            <div class="col-8">
                                                <p class="text-isalam-1 font-weight-bold font-size-1-3"><?= $pembayaran_sukses ?></p>
                                                <p class="font-weight-bold font-size-08">Total Pembayaran Sukses</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($proyek_didanai as $proyek) {
                                $total_donasi = Pembayaran::find()
                                    ->where([
                                        'user_id' => Yii::$app->user->identity->id,
                                        'pendanaan_id' => $proyek->pendanaan->id,
                                        'status_id' => 6,
                                    ])
                                    ->andWhere(['=', 'jumlah_lembaran', 0])
                                    ->sum('nominal');

                                // Tampilkan proyek hanya jika total_donasi tidak sama dengan 0
                                if ($total_donasi !== null) {
                            ?>
                                    <div class="col-lg-6 col-md-6 col-sm-8 col-8 text-left border-bottom-3">
                                        <a href="<?= \Yii::$app->request->BaseUrl . '/home/detail-program/' . $proyek->pendanaan->id ?>">
                                            <p class="font-weight-bold"><?= $proyek->pendanaan->nama_pendanaan ?></p>
                                            <p class="font-size-08"><?= \app\components\Tanggal::toReadableDate($proyek->pendanaan->created_at); ?></p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-4 col-4 text-right border-bottom-3">
                                        <p>Pendanaan</p>
                                        <p class="font-weight-bold"> <?= \app\components\Angka::toReadableHarga($total_donasi, false)  ?></p>
                                        </a>
                                    </div>
                            <?php
                                }
                            } ?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="produktif" role="tabpanel" aria-labelledby="produktif-tab">
                        <?php
                        $jumlah_pembayaran_produktif = Pembayaran::find()
                            ->where([
                                'user_id' => Yii::$app->user->getId(), // Menggunakan getId() untuk mendapatkan id pengguna yang masuk
                                'status_id' => 6,
                            ])
                            ->andWhere(['>', 'jumlah_lembaran', 0]) // Menggunakan '>' agar jumlah_lembaran harus lebih besar dari 0
                            ->sum('nominal');
                        $pembayaran_sukses = Pembayaran::find()
                            ->where([
                                'user_id' => Yii::$app->user->getId(), // Menggunakan getId() untuk mendapatkan id pengguna yang masuk
                                'status_id' => 6,
                            ])
                            ->andWhere(['>', 'jumlah_lembaran', 0]) // Menggunakan '>' agar jumlah_lembaran harus lebih besar dari 0
                            ->count('status_id');
                        ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card shadow-br3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="border-r10" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/money-icon.png" width="100px">
                                            </div>
                                            <div class="col-8">
                                                <p class="text-isalam-1 font-weight-bold font-size-1-3"><?= \app\components\Angka::toReadableHarga($jumlah_pembayaran_produktif); ?></p>
                                                <p class="font-weight-bold font-size-08">Total Dana Tersalurkan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 pb-4">
                                <div class="card shadow-br3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="border-r10" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/success.png" width="100px">
                                            </div>
                                            <div class="col-8">
                                                <p class="text-isalam-1 font-weight-bold font-size-1-3"><?= $pembayaran_sukses ?></p>
                                                <p class="font-weight-bold font-size-08">Total Pembayaran Sukses</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $totallembar = 0;
                            foreach ($proyek_didanai as $proyek) {

                                $total_donasi = Pembayaran::find()
                                    ->where([
                                        'user_id' => Yii::$app->user->identity->id,
                                        'pendanaan_id' => $proyek->pendanaan->id,
                                        'status_id' => 6,
                                    ])
                                    ->andWhere(['>', 'jumlah_lembaran', 0])
                                    ->sum('nominal');

                                $totallembar = Pembayaran::find()
                                    ->where([
                                        'user_id' => Yii::$app->user->identity->id,
                                        'pendanaan_id' => $proyek->pendanaan->id,
                                        'status_id' => 6,
                                    ])
                                    ->andWhere(['>', 'jumlah_lembaran', 0])
                                    ->sum('jumlah_lembaran');
                                // Tampilkan proyek hanya jika total_donasi tidak sama dengan 0
                                if ($total_donasi !== null) {
                            ?>
                                    <div class="col-lg-6 col-md-6 col-sm-8 col-8 text-left border-bottom-3">
                                        <a href="<?= \Yii::$app->request->BaseUrl . '/home/detail-program/' . $proyek->pendanaan->id ?>">
                                            <p class="font-weight-bold"><?= $proyek->pendanaan->nama_pendanaan ?></p>
                                            <p class="" style="font-size: 12px; margin-bottom: -2px"><?= \app\components\Tanggal::toReadableDate($proyek->pendanaan->created_at); ?></p>
                                            <p class="font-weight-bold" style="margin-bottom: 0px;"> Total Donasi</p>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-4 col-4 text-right border-bottom-3 don" id="don" ku="<?= $total_donasi ?>">
                                        <a href="<?= \Yii::$app->request->BaseUrl . '/home/detail-program/' . $proyek->pendanaan->id ?>">
                                            <p style="text-right">Pendanaan</p>
                                            <div class="text-right" id="lembar" value="<?= $totallembar ?>" style="font-size: 11px;">
                                                Total Lembaran : <?= $totallembar ?>
                                            </div>
                                            <p class="font-weight-bold donasi" id="donasi" aku="<?= $total_donasi ?>" style="text-right;"> <?= \app\components\Angka::toReadableHarga($total_donasi, false)  ?></p>
                                        </a>
                                        <!-- <a href="<?= Url::to(["sertifikat"]) ?>">
                                            <a href="http://localhost:8080/i-salam/web/sertifikat/sertifikatuang.php"> -->
                                        <div style="margin-top: -5%">
                                            <a class="cetak_sertifikat" id="cetak_sertifikat" target="_blank" style="cursor: pointer; margin-top:-5%;">
                                                Sertifikat
                                            </a>
                                        </div>
                                    </div>

                                    <script>

                                    </script>
                            <?php
                                }
                            } ?>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pendapatan" role="tabpanel" aria-labelledby="pendapatan-tab">
                        <?php
                        $jumlah_pembayaran_produktif = Pembayaran::find()
                            ->where([
                                'user_id' => Yii::$app->user->getId(), // Menggunakan getId() untuk mendapatkan id pengguna yang masuk
                                'status_id' => 6,
                            ])
                            ->andWhere(['>', 'jumlah_lembaran', 0]) // Menggunakan '>' agar jumlah_lembaran harus lebih besar dari 0
                            ->sum('nominal');
                        $pembayaran_sukses = Pembayaran::find()
                            ->where([
                                'user_id' => Yii::$app->user->getId(), // Menggunakan getId() untuk mendapatkan id pengguna yang masuk
                                'status_id' => 6,
                            ])
                            ->andWhere(['>', 'jumlah_lembaran', 0]) // Menggunakan '>' agar jumlah_lembaran harus lebih besar dari 0
                            ->count('status_id');
                        // 
                        // 
                        // 

                        ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card shadow-br3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="border-r10" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/money-icon.png" width="100px">
                                            </div>
                                            <div class="col-8">
                                                <p class="text-isalam-1 font-weight-bold font-size-1-3"><?= \app\components\Angka::toReadableHarga($total_pendapatan_user); ?></p>
                                                <p class="font-weight-bold font-size-08">Total Pendapatan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 pb-4">
                                <div class="card shadow-br3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <img class="border-r10" src="<?= \Yii::$app->request->BaseUrl ?>/uploads/success.png" width="100px">
                                            </div>
                                            <div class="col-8">
                                                <p class="text-isalam-1 font-weight-bold font-size-1-3"><?= $total_jumlah_lembaran_user ?></p>
                                                <p class="font-weight-bold font-size-08">Total jumlah lembaran</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($pendapatan as $pendapatan1) {
                                $total_jumlah_lembaran_all = Pembayaran::find()->where(['pendanaan_id' => $pendapatan1->id_pendanaan])->andWhere(['status_id' => 6])->andWhere(['!=', 'jumlah_lembaran', 0])->sum('jumlah_lembaran');
                                // var_dump($total_jumlah_lembaran_all);
                                // die;
                                $total_pendapatan_all = $pendapatan1->nominal / $total_jumlah_lembaran_all;
                                $total_jumlah_lembaran = Pembayaran::find()->where(['user_id' => Yii::$app->user->identity->id, 'pendanaan_id' => $pendapatan1->id_pendanaan])->andWhere(['status_id' => 6])->andWhere(['>', 'jumlah_lembaran', 0])->sum('jumlah_lembaran');

                                $total_pendapatan = $total_pendapatan_all * $total_jumlah_lembaran;
                                $total_donasi = Pembayaran::find()
                                    ->where(['user_id' => Yii::$app->user->identity->id, 'pendanaan_id' => $proyek->pendanaan->id])
                                    ->andWhere(['status_id' => 6])
                                    ->andWhere(['>', 'jumlah_lembaran', 0])
                                    ->sum('nominal');
                            ?>
                                <div class="col-lg-6 col-md-6 col-sm-8 col-8 text-left ">
                                    <a href="<?= \Yii::$app->request->BaseUrl . '/home/detail-program/' . $proyek->pendanaan->id ?>">
                                        <p class="font-weight-bold" style="margin-bottom: 33px;"><?= $pendapatan1->pendanaan->nama_pendanaan ?></p>
                                    </a>
                                    <p class="font-size-08"><?= \app\components\Tanggal::toReadableDate($pendapatan1->created_at); ?></p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-4 col-4 text-right ">
                                    <p style="margin-bottom: 33px;">Pendapatan</p>
                                    <!-- <div class=" text-right" style="font-size: 11px;">
                                        <?= \app\components\Angka::toReadableHarga($total_pendapatan_all, false)  ?> / Lembar
                                    </div> -->
                                    <div class=" text-right" style="font-size: 11px;">
                                        Total Lembaran : <?= $total_jumlah_lembaran ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-8 col-8 text-left border-bottom-3">
                                    <p class="font-weight-bold" style="margin-top: -6%;"> Total Pendapatan</p>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-4 col-4 text-right border-bottom-3">
                                    <p class="font-weight-bold" style="margin-top: -11%;"></p> <?= \app\components\Angka::toReadableHarga($total_pendapatan, false)  ?></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Uncomment the following lines to enable datepicker
            // $(".datepicker").datepicker({
            //     format: "d-M-yyyy"
            // });

            $("#spinner").hide();

            $(".cetak_sertifikat").click(function() {
                var akuValue = ""; // Replace this with the appropriate value from the "donasi" element.
                var akuValue = $('#donasi').attr('aku');
                console.log(akuValue);
                var total_donasi_sanitized = JSON.stringify(akuValue);

                // Replace 'nama_pendanaan_value' with the actual value of nama_pendanaan
                var nama_pendanaan_sanitized = JSON.stringify('nama_pendanaan_value');

                var url = Yii.app.homeUrl + "/home/sertifikat?" +
                    "total_donasi=" + total_donasi_sanitized +
                    "&kegiatan=" + nama_pendanaan_sanitized +
                    "&t2=" + $("#lembar").val();

                // Properly encode the URL parameters to avoid security issues
                url = encodeURI(url);

                window.open(url, "_blank", "height=400,width=300");
            });
        });
    </script> -->
    <?php
    // Sanitize the PHP variables before using them in JavaScript
    $total_donasi_sanitized = json_encode($total_donasi, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    $nama_pendanaan_sanitized = json_encode($proyek->pendanaan->nama_pendanaan, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    $my_js = '
                                        $(document).ready(function(){
                                            // $(".datepicker").datepicker({
                                            // format: "d-M-yyyy"
                                            // });
                                            $("#spinner").hide();
                                            
                                            $(".cetak_sertifikat").click(function() {
                                                var akuValue = $("#don").attr("ku");
                                                console.log("akuValue:", akuValue);
                                                
                                                var url = "' . Yii::$app->homeUrl . '/home/sertifikat?" +
                                                    "total_donasi=" + akuValue +
                                                    "&kegiatan=" + ' . $nama_pendanaan_sanitized . ' +
                                                    "&t2=" + $("#lembar").val();
                                                window.open(url, "_blank","height=400,width=300");
                                            });
                                        });
                                    ';
    $this->registerJs($my_js, View::POS_END);
    ?>