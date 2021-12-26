<section id="services" class="services pb-90">
      <div class="container">
        <h2 class="text-center" style="color:orange">Lebih Dekat Dengan Kami</h2>
        <div class="row text-center">
          <div class="carousel owl-carousel carousel-arrows" data-slide="3" data-slide-md="2" data-slide-sm="1" data-autoplay="true" data-nav="true" data-dots="false" data-space="20" data-loop="true" data-speed="800">
            <!-- fancybox item #1 -->
            <?php foreach ($organisasis as $organisasi) { ?>
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
            <?php } ?>
          </div><!-- /.carousel -->
        </div><!-- /.row -->

      </div><!-- /.container -->
    </section><!-- /.Services -->