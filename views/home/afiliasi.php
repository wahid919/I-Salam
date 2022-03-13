<hr class="mt-0">
<section id="services" class="services pb-90" style="padding-top: 10px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="text-left">
          <h2 style="color: #ffa500;">Afiliasi</h>
        </div>
      </div>
      
    </div>
    <div class="row">
      <?php foreach ($afiliasis as $afiliasi) {
      ?>
        <div class="col-lg-4 col-md-6 mt-3">
          <div class="card shadow-br2" style="border-radius: 15px;">
            <!-- <img src="" class="card-img-top" alt="..."> -->
            <div class="team-img" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/afiliasi/" . $afiliasi->foto ?>);border-radius: 15px;">
            </div>
            <div class="card-body">
              <h6 class="card-title"><?= $afiliasi->nama_produk ?></h6>
              <!-- <div class="row">
                <div class="col-12">
                  <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $nilai_sekarang ?>%" aria-valuenow="<?= $nilai_sekarang ?>" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-6 text-left pt-4 font-weight-bold font-size-08">
                  Sudah Terkumpul
                </div>
                <div class="col-lg-6 col-md-6 col-6 text-right pt-4 font-weight-bold font-size-08">
                  Durasi
                </div>
              </div> -->
              <!-- <div class="row">
                <div class="col-lg-8 col-md-8 col-8 text-left font-weight-bold" style="color: #ffa500;font-size: 1.3rem;">
                  <?= \app\components\Angka::toReadableHarga($nominal, false)  ?><br>
                </div>
                <div class="col-lg-4 col-md-4 col-4 text-right font-weight-bold" style="color: #ffa500;font-size: 1.3rem;">
                  <?= $interval; ?> Hari
                </div>
              </div> -->
              <!-- <hr> -->
              <!-- <div class="row">

                <div class="col-lg-12 col-md-12 col-12 text-left font-weight-bold font-size-08">
                <i class="fa fa-users" aria-hidden="true"></i> Jumlah Pewakaf(<?= $pewakaf ?>)
                </div>
                </div>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 5px;">
                </div>
              </div>
            </div> -->
          </div>
          </a>
        </div>
      <?php }
      ?>
    </div><!-- /.row -->
    <hr>
    <div class='d-flex justify-content-center'>
      <?php echo \yii\widgets\LinkPager::widget([
        'pagination' => $pagination,
      ]); ?>
    </div>

  </div><!-- /.container -->
</section><!-- /.Services -->

<?php
$script = <<< JS
$(document).ready(function () {
    $("#select-category").change(function() {
        window.location.href = $(this).val();
    });
});
JS;
$this->registerJs($script);
?>