<hr class="mt-0">
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
            <?= $this->render('component/sidemenu-profile') ?>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12 col-12 profile-section">
            <h3 class="text-isalam-1 font-weight-bold text-detail-program">Transaksi</h3>
            <div class="row">
                <?php foreach ($pembayarans as $pembayaran) {
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
                        }
                        if ($status_pembayaran == 3 || $status_pembayaran == 4 || $status_pembayaran == 6) {
                            $status = "btn-success";
                        }
                        if ($status_pembayaran == 5 || $status_pembayaran == 9 || $status_pembayaran == 10) {
                            $status = "btn-warning";
                        }
                        if ($status_pembayaran == 7 || $status_pembayaran == 8) {
                            $status = "btn-danger";
                        }
                        ?>
                        <button id="pay-button-<?=$pembayaran->id ?>" class="btn btn-sm btn-program <?= $status ?>"> <?= $pembayaran->status->name ?></button>
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
            snap.pay('<?=$pembayaran->code?>', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ 
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ 
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ 
            // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
      onClose: function() {
        /* You may add your own implementation here */
        // Swal.fire("Peringatan!", "Anda Belum Menyelesaikan Pembayaran", "error");
      }
        });
          }
        // SnapToken acquired from previous step
        
      };
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
