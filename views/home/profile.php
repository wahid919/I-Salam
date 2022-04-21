<hr class="mt-0">
<!-- display success message -->
<?php if (Yii::$app->session->hasFlash('success')) : ?>
            <script>
            swal("Sukses", "<?= Yii::$app->session->getFlash('success') ?>", "success",{
              buttons:false
            })
  </script>
            <!-- <div class="alert alert-success alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <p><i class="icon fa fa-check"></i>Saved!</p>
              <?= Yii::$app->session->getFlash('success') ?>
            </div> -->
          <?php endif; ?>

          <!-- display error message -->
          <?php if (Yii::$app->session->hasFlash('error')) : ?>
            <script>
            swal("Gagal", "<?= Yii::$app->session->getFlash('error') ?>", "error",{
              buttons:false
            })
  </script>
            <!-- <div class="alert alert-danger alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <h4><i class="icon fa fa-check"></i>Saved!</h4>
              <?= Yii::$app->session->getFlash('error') ?>
            </div> -->
          <?php endif; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
            <?= $this->render('component/sidemenu-profile') ?>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 col-12 profile-section">
            <h3 class="text-isalam-1 font-weight-bold text-detail-program">Transaksi</h3>
            <div class="row">
                <?php

            use yii\helpers\Url;

 foreach ($pembayarans as $pembayaran) {
                    $code = $pembayaran->code; ?>
                    <div class="col-lg-6 col-md-6 col-sm-8 col-8 text-left border-bottom-3">
                        <p class="font-weight-bold"><?= $pembayaran->pendanaan->nama_pendanaan ?></p>
                        <p class="font-size-08"><?= \app\components\Tanggal::toReadableDate($pembayaran->created_at); ?> | <span class="text-isalam-1"><?= \app\components\Angka::toReadableHarga($pembayaran->nominal); ?></span></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4 col-4 text-right border-bottom-3">
                        <p>Status Pembayaran</p>
                        <?php
                        $status_pembayaran = $pembayaran->status->id;
                        if ($status_pembayaran == 1 || $status_pembayaran == 2) {
                            $status = "btn-info";
                            $cancel_aktif = "tidak-aktif";
                        }
                        if ($status_pembayaran == 3 || $status_pembayaran == 4 || $status_pembayaran == 6) {
                            $status = "btn-success";
                            $cancel_aktif = "tidak-aktif";
                        }
                        if ($status_pembayaran == 5 || $status_pembayaran == 9 || $status_pembayaran == 10) {
                            $status = "btn-warning";
                            $cancel_aktif = "aktif";
                        }
                        if ($status_pembayaran == 7 || $status_pembayaran == 8 || $status_pembayaran == 12 || $status_pembayaran == 13 ) {
                            $status = "btn-danger";
                            $cancel_aktif = "tidak-aktif";
                        }
                        ?>
                          <?php if($cancel_aktif == "aktif" && $sts =="Ada"){?>
                          <button id="cancel-<?=$pembayaran->id ?>" class="btn btn-sm btn-program btn-danger" style="margin-top:2px;"><i class='fa fa-times'></i> Membatalkan Transaksi</button>
                          <?php } ?>
                          <button id="pay-button-<?=$pembayaran->id ?>" class="btn btn-sm btn-program <?= $status ?>" style="margin-top:2px;"> <?= $pembayaran->status->name ?></button>
                          <!-- <p><a href="#" class="btn btn-sm btn-program <?= $status ?>"><?= $pembayaran->status->name ?></a></p> -->
                    </div>

<!-- Production -->
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-IzRsb2KnAzGzaaBr"></script>
<!-- //sandbox -->
<!-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-lrPe45BCGoT9yG2O"></script> -->
<script type="text/javascript">
    let kode_snap_<?=$pembayaran->id ?> = "<?= $code ?>";
      document.getElementById('pay-button-<?=$pembayaran->id ?>').onclick = function(){
          if(kode_snap_<?= $pembayaran->id ?> == null){
            alert("Data Tidak Ditemukan");
          }else{
            window.snap.pay('<?=$pembayaran->code?>', {
          // Optional
          onSuccess: function(result) {
        /* You may add your own js here, this is just example */
        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        Swal.fire("Peringatan!", "Pembayaran Berhasil", "success").then((result) => {
          window.location = "<?= Yii::$app->request->baseUrl . "/home/profile" ?>";
        });
        // alert("payment success!"); console.log(result);
      },
      // Optional
      onPending: function(result) {
        Swal.fire("Peringatan!", "Transaksi Menunggu Pembayaran", "success").then((result) => {
          window.location = "<?= Yii::$app->request->baseUrl . "/home/profile" ?>";
        });
        /* You may add your own js here, this is just example */
        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
      },
      // Optional
      onError: function(result) {
        /* You may add your own js here, this is just example */
        // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        Swal.fire("Peringatan!", "Pembayaran Gagal", "error");
      },
      onClose: function() {
        /* You may add your own implementation here */
        Swal.fire("Peringatan!", "Anda Belum Menyelesaikan Pembayaran", "error");
      }
        });
          }
        // SnapToken acquired from previous step
        
      };
      document.querySelector("#cancel-<?=$pembayaran->id ?>").addEventListener("click", () => {
        let text = "Apakah anda yakin ingin membatalkan transaksi ini?";
        if (confirm(text) == true) {
          window.location.href = `<?= Url::to(['/home/cancel-transaksi', 'id' => $pembayaran->id]) ?>`;
          alert("Berhasil Membatalkan Transaksi");
  }
      });
    </script>
                <?php } ?>
            </div>
            <div class='d-flex justify-content-center pt-4'>
                <?php echo \yii\widgets\LinkPager::widget([
                    'pagination' => $pagination,
                ]); ?>
            </div>
        </div>
    </div>
</div>
