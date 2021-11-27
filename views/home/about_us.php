<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="<?= $setting->nama_web ?>">
  <link href="<?= $icon ?>" rel="icon">
  <title><?= $setting->nama_web ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700%7cPoppins:400,600,700&display=swap">
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl ?>/template/assets/css/libraries.css" />
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl ?>/template/assets/css/style.css" />
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl ?>/template/assets/css/sweetalert2.min.css" />
  <style>
    .title-img {
      border-radius: .3rem;
      display: inline-block;
      min-width: 30vw;
      height: auto;
      width: auto;
      overflow: hidden;
      position: relative;
    }

    .title-overlay-ku {
      padding: 0;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgb(194, 150, 55, .7);
    }

    .title_about {
      z-index: 999;
      position: relative;
      text-align: center;
      font-size: 1.2rem;
      font-weight: 600;
      padding: 1rem 4rem;
      margin: 0;
    }

    @media only screen and (max-width: 768px) {
      .title-img {
        width: 90vw;
      }
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- =========================
        Header
    =========================== -->
    <?= $this->render('component/header') ?>
    <hr class="mt-0">

    <section id="services" class="services pb-30 pt-30">
      <div class="container">
        <div class="row heading heading-2 mb-40">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-12">
                <div class="title-img" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/mosque.jpg" ?>);">
                  <div class="text-white title_about"><?= Yii::t("cruds", "TENTANG KAMI") ?></div>
                  <div class="title-overlay-ku">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <p class="heading__desc pt-4">
                  <?= $setting->tentang_kami ?>
                </p>
              </div>
            </div>
          </div><!-- /.col-lg-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Services -->
    <section id="services" class="services pb-30">
      <div class="container">
        <div class="row heading heading-2 mb-40">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="title-img" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/mosque.jpg" ?>);">
              <div class="text-white title_about">Visi</div>
              <div class="title-overlay-ku">
              </div>
            </div>
            <p class="heading__desc pt-4"><?= $setting->visi ?></p>
          </div><!-- /.col-lg-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Services -->
    <section id="services" class="services pb-30">
      <div class="container">
        <div class="row heading heading-2 mb-40">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-12">
                <div class="title-img" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/mosque.jpg" ?>);">
                  <div class="text-white title_about">Misi</div>
                  <div class="title-overlay-ku">
                  </div>
                </div>
              </div>
              <div class="col-12">
                <p class="heading__desc pt-4"><?= $setting->misi ?></p>
              </div>
            </div>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
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
  <script src="<?= \Yii::$app->request->BaseUrl ?>/template/assets/js/sweetalert2.all.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV6HOHjE9XM8IbEaL6ZMZdW8e0tavsOL8&libraries=places&region=id&language=en&sensor=false"></script>

  <script>
    $(document).ready(function() {
      var success = "<?= \Yii::$app->session->getFlash('success') ?>";
      var error = "<?= \Yii::$app->session->getFlash('error') ?>";
      if (error !== "") {
        Swal.fire("Peringatan!", "<?= \Yii::$app->session->getFlash('error') ?>", "error");
      }
      if (success !== "") {
        Swal.fire("Peringatan!", "<?= \Yii::$app->session->getFlash('success') ?>", "success");
      }
    });
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