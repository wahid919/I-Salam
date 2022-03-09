<section id="services" class="services pb-90">
      <div class="container">
        <h2 class="text-center" style="color:orange">Lebih Dekat Dengan Kami</h2>
        <div class="row text-center">
        <div class="row mt-2">
            <?php foreach ($organisasis as $organisasi) { ?>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mt-3">
          <div class="fancybox-item">
                <div class="fancybox__content">
                  <div class="col-12 mx-auto">
                    <div class="service-item">
                      <div class="team-img" style="background-image: url('<?= \Yii::$app->request->baseUrl . "/uploads/organisasi/" . $organisasi->foto; ?>')">
                      </div>
                      <div class="service__content">
                        <h4 class="service__title"><?= $organisasi->nama ?></h4>
                        <h6><?= $organisasi->jabatan ?></h6>
                        <p class="service__desc"><?= $organisasi->quotes ?></p>
                      </div>
                    </div><!-- /.service-item -->
                  </div><!-- /.col-lg-4 -->
                </div><!-- /.fancybox-content -->
              </div><!-- /.fancybox-item -->
          <!-- </a> -->
        </div>
      <?php } ?>
    </div>
        </div><!-- /.row -->

      </div><!-- /.container -->
    </section><!-- /.Services -->