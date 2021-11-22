<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="<?= $setting->nama_web ?>">
  <link href="<?= $icon ?>" rel="icon">
  <title><?= $setting->nama_web ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700%7cPoppins:400,600,700&display=swap">
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl ?>/template/assets/css/libraries.css" />
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl ?>/template/assets/css/style.css" />
  <style>
    .bg-overlay-gradient-secondary-2:before {
      background-image: url(<?= $bg_login ?>);
      background-position: center;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- =========================
        Header
    =========================== -->
    <?= $this->render('component/header') ?>

    <!-- ========================
        Services
    =========================== -->
    <hr>
    <section id="services" class="services pb-90" style="padding-top: 10px;">
      <div class="container">
        <div class="text-center mt-4 mb-4">
          <h4>Kategori Program</h4>
          <div class="carousel owl-carousel carousel-arrows" data-slide="4" data-slide-md="2" data-slide-sm="1" data-autoplay="true" data-nav="true" data-dots="false" data-space="20" data-loop="true" data-speed="800">
            <div class="fancybox-item">
              <div class="team-img bg-category" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/mosque.jpg" ?>);">
                <div class="overlay">
                  <a class="text-white vertical-center" href="<?= \Yii::$app->request->baseUrl . "/home/program/" ?>" style="font-size: 2rem;">Semua </a>
                </div>
              </div>
            </div><!-- /.fancybox-item -->
            <?php foreach ($kategori_pendanaans as $kategori_pendanaan) {  ?>
              <div class="fancybox-item">
                <div class="team-img bg-category" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/mosque.jpg" ?>);">
                  <div class="overlay">
                    <a class="text-white vertical-center" href="<?= \Yii::$app->request->baseUrl . "/home/program?kategori=" . $kategori_pendanaan->id ?>" style="font-size: 2rem;"><?= $kategori_pendanaan->name ?> </a>
                  </div>
                </div>
              </div><!-- /.fancybox-item -->
            <?php } ?>
          </div><!-- /.carousel -->
        </div>

        <div class="text-center">
          <h4>Program Berlangsung</h4>
        </div>
        <div class="row">
          <?php foreach ($pendanaans as $pendanaan) {

            $nominal = \app\models\Pembayaran::find()->where(['pendanaan_id' => $pendanaan->id, 'status_id' => 6])->sum('nominal');
            $datetime1 =  new Datetime($pendanaan->pendanaan_berakhir);
            $datetime2 =  new Datetime(date("Y-m-d H:i:s"));
            $interval = $datetime1->diff($datetime2)->days;
            $target = $pendanaan->nominal;
            $nilai_sekarang = ($nominal / $target) * 100;
          ?>
            <div class="col-lg-4 col-md-6 mt-3">
              <!-- <a href="<?= \Yii::$app->request->baseUrl . "/home/detail-berita?id=" . $berita->slug ?>"> -->
              <div class="card">
                <!-- <img src="" class="card-img-top" alt="..."> -->
                <div class="team-img" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/" . $pendanaan->poster ?>);border-radius: 15px;">
                </div>
                <div class="card-body">
                  <h6 class="card-title"><?= $pendanaan->nama_pendanaan ?></h6>
                  <div class="row">
                    <div class="col-12">
                      <div class="progress border border-dark">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $nilai_sekarang ?>%" aria-valuenow="<?= $nilai_sekarang ?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 text-left">
                      Sudah Terkumpul
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 text-right">
                      Durasi
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-6 text-left font-weight-bold" style="color: #ffa500;">
                      <?= \app\components\Angka::toReadableHarga($nominal, false)  ?><br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 text-right font-weight-bold" style="color: #ffa500;">
                      <?= $interval; ?> Hari
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <a href="#" class="btn btn-sm btn-program btn-block">Install Aplikasi Untuk Donasi</a>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 pt-2">
                      <a class="btn btn-sm btn-program btn-block" href="<?= Yii::$app->request->baseUrl . "/home/unduh-file-uraian/" . $pendanaan->id ?>">Download prospektur</a>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
          <?php }
          ?>

        </div>
        <hr>
        <div class='d-flex justify-content-center'>
          <?php echo \yii\widgets\LinkPager::widget([
            'pagination' => $pagination,
          ]); ?>
        </div>

      </div><!-- /.container -->
    </section><!-- /.Services -->

    <!-- ========================
            Footer
    ========================== -->
    <?= $this->render('component/footer') ?>

    <div class="module__search-container">
      <i class="fa fa-times close-search"></i>
      <form class="module__search-form">
        <input type="text" class="search__input" placeholder="Type Words Then Enter">
        <button class="module__search-btn"><i class="fa fa-search"></i></button>
      </form>
    </div><!-- /.module-search-container -->

    <button id="scrollTopBtn"><i class="fa fa-long-arrow-up"></i></button>
  </div><!-- /.wrapper -->

  <script src="<?= \Yii::$app->request->BaseUrl ?>/template/assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?= \Yii::$app->request->BaseUrl ?>/template/assets/js/plugins.js"></script>
  <script src="<?= \Yii::$app->request->BaseUrl ?>/template/assets/js/main.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV6HOHjE9XM8IbEaL6ZMZdW8e0tavsOL8&libraries=places&region=id&language=en&sensor=false"></script>

  <script>
    var marker;

    function initialize() {

      // Variabel untuk menyimpan informasi (desc)
      var infoWindow = new google.maps.InfoWindow;

      //  Variabel untuk menyimpan peta Roadmap
      var mapOptions = {
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }

      // Pembuatan petanya
      var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

      // Variabel untuk menyimpan batas kordinat
      var bounds = new google.maps.LatLngBounds();

      // Pengambilan data dari database
      <?php

      $nama = $setting->nama_web;
      $lat = $setting->latitude;
      $lon = $setting->longitude;

      echo ("addMarker($lat, $lon, '<b>$nama</b>');\n");

      ?>

      // Proses membuat marker 
      function addMarker(lat, lng, info) {
        var lokasi = new google.maps.LatLng(lat, lng);
        bounds.extend(lokasi);
        var marker = new google.maps.Marker({
          map: map,
          position: lokasi
        });
        // map.fitBounds(bounds);
        map.setCenter(bounds.getCenter());
        map.setZoom(16);
        bindInfoWindow(marker, map, infoWindow, info);
      }

      // Menampilkan informasi pada masing-masing marker yang diklik
      function bindInfoWindow(marker, map, infoWindow, html) {
        google.maps.event.addListener(marker, 'click', function() {
          if (map.getZoom() > 16) map.setZoom(16);
          infoWindow.setContent(html);
          infoWindow.open(map, marker);
        });
      }

    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</body>

</html>