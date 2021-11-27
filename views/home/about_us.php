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
  <link rel="stylesheet" href="<?= \Yii::$app->request->BaseUrl ?>/template/assets/css/sweetalert2.min.css" />
</head>

<body>
  <div class="wrapper">
    <!-- =========================
        Header
    =========================== -->
    <?= $this->render('component/header') ?>
    <hr class="mt-0">
    <section id="services" class="services pb-90">
      <h2 class="heading__title mx-auto text-center pb-3" style="color:orange;font-size:3rem;line-height: 1">Tentang Kami</h2>
      <div class="container">
        <div class="row heading heading-2 mb-40">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="title-img" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/mosque.jpg" ?>);">
              <div class="title-overlay">
                <p class="text-white text-title">Visi</p>
              </div>
            </div>
            <p class="heading__desc pt-4"><?= $setting->visi ?></p>
          </div><!-- /.col-lg-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Services -->
    <section id="services" class="services pb-90" style="margin-top: -15%;">
      <div class="container">
        <div class="row heading heading-2 mb-40">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-12">
                <div class="title-img" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/mosque.jpg" ?>);">
                  <div class="title-overlay">
                    <p class="text-white text-title">Misi</p>
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

    <section id="services" class="services pb-90" style="margin-top: -15%;">
      <div class="container">
        <div class="row heading heading-2 mb-40">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="row">
              <div class="col-12">
                <div class="title-img" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/mosque.jpg" ?>);">
                  <div class="title-overlay">
                    <p class="text-white text-title2">Isalam</p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <p class="heading__desc pt-4"><?= $setting->tentang_kami ?></p>
              </div>
            </div>
          </div><!-- /.col-lg-5 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section><!-- /.Services -->

    <!-- ========================
        Request Quote Tabs
    =========================== -->

    <div class="container">
      <div class="row">
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
                <?= Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn__primary mb-4']); ?>
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