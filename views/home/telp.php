  <hr class="mt-0">
  <section id="services" class="services pb-30">
    <div class="container">
      <div class="row heading heading-2 mb-40">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <div class="title-img" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/mosque.jpg" ?>);">
            <div class="text-white title_about">No Telepon & Email</div>
            <div class="title-overlay-ku">
            </div>
          </div>

        <div class="row mt-2">
          <?php foreach ($kontaks as $kontak) { ?>
            <!-- <div id="2" class="contact-row">
            <div class="row-left"> -->

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mt-3">
            <a href="#"><i class="fas fa-phone-alt"></i> &nbsp;<span class="contact-col-name"><?= $kontak->nama_kontak ?></span><br> <span class="contact-col-value"><?= $kontak->nomor_telepon ?></span> </a>
            </div>
            <!-- <div class="row-right"><span class="contact-col-name">Email</span><br> <span class="contact-col-value">contact.us@bcadigital.co.id</span></div> -->
          <!-- </div> -->
          <!-- <br> -->
          <?php } ?>
          <!-- <div id="1" class="contact-row">
            <div class="row-left"> -->

        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mt-3">
            <a href="#"><i class="fas fa-envelope"></i> &nbsp;<span class="contact-col-name">Email</span><br> <span class="contact-col-value">admin@i-salam.net</span> </a>
            </div>
          <!-- </div>  -->
        </div>
          <!-- <p class="heading__desc pt-4"><?= $setting->alamat ?></p> -->
        </div><!-- /.col-lg-5 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section><!-- /.Services -->