<header class="headerContact bg-warna-light">
  <div class="container">
    <h1 data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">Ada yang bisa dibantu?</h1>
    <div data-aos="zoom-in" data-aos-delay="100" data-aos-duration="1000" style="width:150px"><span>Pewakaf</span></div>
  </div>
</header>
<section class="section box-contact bg-warna-putih">
  <div class="container">
    <div class="row">
      <div data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000" class="col-md-6">
        <h1 class="contact-brand"><?=$setting->nama_web ?></h1>
        <p class="contact-description">Terima kasih sudah mampir! Jika kamu memiliki pertanyaan seputar Wakaf di <?= $setting->nama_web ?>, hubungi kami melalui kontak di laman ini. </p>
      </div>
      <div data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000" class="col-md-6">
        <div class="contact-list">
          <p class="contact-office"><?= $setting->nama_web ?></p>
          <p class="contact-address"><?= $setting->alamat ?></p>
          <?php foreach ($kontaks as $kontak) { ?>
            <div id="2" class="contact-row">
            <div class="row-left">
            <a href="#"><i class="fas fa-phone-alt"></i> &nbsp;<span class="contact-col-name"><?= $kontak->nama_kontak ?></span><br> <span class="contact-col-value"><?= $kontak->nomor_telepon ?></span> </a>
            </div>
            <!-- <div class="row-right"><span class="contact-col-name">Email</span><br> <span class="contact-col-value">contact.us@bcadigital.co.id</span></div> -->
          </div>
          <!-- <br> -->
          <?php } ?>
          <div id="1" class="contact-row">
            <div class="row-left">
            <a href="#"><i class="fas fa-envelope"></i> &nbsp;<span class="contact-col-name">Email</span><br> <span class="contact-col-value">admin@i-salam.net</span> </a>
            </div>
          </div> 



          <!-- <div id="1" class="contact-row">
            <div class="row-left">
            <a href="<?= $setting->facebook ?>" target="_blank"><i class="fas fa-envelope"></i></a>
            <div class="row-right"><span class="contact-col-name">Telepon</span><br> <span class="contact-col-value">(021) 50848010</span></div>
            </div>
          </div> -->
          
        </div>
      </div>
    </div>
  </div>
</section>