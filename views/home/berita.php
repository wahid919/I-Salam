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

    <!-- ============================
        Slider
    ============================== -->

    <hr>
    <div class="mt-4 mb-4">
      <div class="container mt-4 mb-4">
        <div class="text-center mt-4 mb-4">
          <h3>Kategori Berita</h3>
          <ul class="list-group list-group-horizontal text-dark font-weight-bold mx-auto pb-3 pt-3" style="width: fit-content;">
            <li class="list-group-item border-0"><a class="text-dark" href="<?= \Yii::$app->request->baseUrl . "/home/news/" ?>"> Semua </a></li>
            <?php foreach ($categories as $kategori) {  ?>
              <li class="list-group-item border-0"><a class="text-dark" href="<?= \Yii::$app->request->baseUrl . "/home/news?kategori=" . $kategori->nama ?>"><?= $kategori->nama ?> </a></li>
            <?php } ?>
          </ul>
          <form action="<?= \Yii::$app->request->baseUrl . "/news" ?>" method="get">
            <div class="input-group mb-4">
              <input type="text" name="cari" class="form-control" placeholder="Cari Berita" aria-label="Cari Berita" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary text-white" type=submit" id="cari" style="background-color:orange; border:orange;">Cari</button>
              </div>
            </div>
          </form>
        </div>

        <div class="row">
          <?php foreach ($news as $berita) { ?>
            <div class="col-lg-4 col-md-4 mt-3">
              <a href="<?= \Yii::$app->request->baseUrl . "/detail-berita?id=" . $berita->slug ?>">
                <div class="card">
                  <!-- <img src="" class="card-img-top" alt="..."> -->
                  <div style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/berita/" . $berita->gambar ?>);background-size: cover;height: 200px;">

                  </div>
                  <div class="card-body">
                    <h6 class="card-title"><?= $berita->judul ?></h6>
                    <hr>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-6 text-left">
                        <?= date("d M Y", strtotime($berita->created_at)); ?>
                      </div>
                      <div class="col-lg-6 col-md-6 col-6 text-right">
                        Baca Selengkapnya
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>

        </div>
      </div>
    </div>

    <div class="container pt-4">
      <div class="row">
        <div class="col-12">
          <?php if (\Yii::$app->session->getFlash('error') !== null) : ?>
            <div class="alert alert-primary text-center mb-45" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span></button>
              <?= \Yii::$app->session->getFlash('error') ?>
            </div>
          <?php endif; ?>
          <?php if (\Yii::$app->session->getFlash('success') !== null) : ?>
            <div class="alert alert-primary text-center mb-45" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="text-white">&times;</span></button>
              <?= \Yii::$app->session->getFlash('success') ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 ">
          <h3 class="heading__title mx-auto pb-3" style="color:orange;font-size:2rem;line-height: 1">Hubungi Kami</h3>
          <p class="font-weight-bold" style="color:orange">Ingin Menyapa? Ingin tahu lebih banyak tentang kami? Hubungi kami atau kiriman email kepada kami, dari kami akan segera menghubungi Anda Kembali</p>
          <div class="contact-form" style="margin-left: 10px;margin-right:10px;">

            <?php

            use yii\bootstrap\ActiveForm;
            use yii\bootstrap\Html;
            ?>
            <?php $form = ActiveForm::begin(
              [
                'id' => 'HubungiKami',
                'layout' => 'horizontal',
                'enableClientValidation' => true,
                'errorSummaryCssClass' => 'error-summary alert alert-error'
              ]
            );
            ?>
            <div class="form-row">

              <div class="col-12 col-md-12">
                <div class="form-group">
                  <?= $form->field($model, 'nama', [
                    'template' => '
                                      {label}
                                      {input}
                                      {error}
                                  ',
                    'inputOptions' => [
                      'class' => 'form-control'
                    ],
                    'labelOptions' => [
                      'class' => ''
                    ],
                    'options' => ['tag' => false]
                  ])->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>
                </div>
              </div>
              <div class="col-12 col-md-12">
                <div class="form-group">
                  <?= $form->field($model, 'nomor_hp', [
                    'template' => '
                                      {label}
                                      {input}
                                      {error}
                                  ',
                    'inputOptions' => [
                      'class' => 'form-control'
                    ],
                    'labelOptions' => [
                      'class' => ''
                    ],
                    'options' => ['tag' => false]
                  ])->textInput(['maxlength' => true, 'placeholder' => 'Nomor Handphone']) ?>
                </div>
              </div>
              <div class="col-12 col-md-12">
                <div class="form-group">
                  <?= // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::activeField
                  $form->field($model, 'tema_hubungi_kami_id', [
                    'template' => '
                                      {label}
                                      {input}
                                      {error}
                                  ',
                    'inputOptions' => [
                      'class' => 'form-control'
                    ],
                    'labelOptions' => [
                      'class' => ''
                    ],
                    'options' => ['tag' => false]
                  ])->dropDownList(
                    \yii\helpers\ArrayHelper::map(app\models\TemaHubungiKami::find()->all(), 'id', 'nama_tema'),
                    [
                      'prompt' => 'Select',
                      'disabled' => (isset($relAttributes) && isset($relAttributes['tema_hubungi_kami_id'])),
                    ]
                  ); ?>
                </div>
              </div>
              <?php echo $form->errorSummary($model); ?>

              <div class="col-12 text-center">
                <?= Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn__primary']); ?>
              </div>
            </div>

            <?php ActiveForm::end(); ?>
            <div class="contact-form-result"></div>
          </div>
        </div><!-- /.col-lg-6 -->
        <div class="col-sm-12 col-md-12 col-lg-6 text-center d-none d-lg-block">
          <img src="<?= \Yii::$app->request->baseUrl . "/uploads/setting/" . $setting->foto_tentang_kami ?>" class="about-us-img" alt="logo">
        </div><!-- /.col-lg-5 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
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