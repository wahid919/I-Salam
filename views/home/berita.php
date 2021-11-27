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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    /* width */
    ::-webkit-scrollbar {
      width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #FFF;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #F1A527;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #F1A527;
    }

    .bg-overlay-gradient-secondary-2:before {
      background-image: url(<?= $bg_login ?>);
      background-position: center;
    }

    .search-input {
      border: 1px solid #ccc;
      margin-right: 1rem;
      border-radius: .6rem !important;
      padding: .5rem 2rem
    }

    .btn-search-input {
      background-color: white;
      border: 1px solid #ccc;
      color: orange;
      width: auto;
      padding: 0 1.5rem;
      border-radius: .6rem;
      font-size: 1.2rem
    }

    .header-list_kategori {
      text-align: center;
      overflow-x: auto;
      margin: 0 3rem;
      padding-bottom: .4rem;
      white-space: nowrap;
      flex: 1
    }

    .header-list_kategori li {
      display: inline-block;
      padding: .4rem;
      color: #aaa;
    }

    .header-list_kategori li a {
      color: #666;
    }

    .header-list_kategori li.active {
      border-bottom: 2px solid #F1A527;
      color: #F1A527;
    }

    .header-list_kategori li.active a {
      color: #F1A527;
    }

    .header-sort {
      display: block;
      width: 100%;
      padding: .3rem .5rem;
      border-radius: .4rem;
      border: 1px solid #ccc;
    }

    .text-primary {
      color: #F1A527 !important;
    }

    /* width */
    .header-list_kategori::-webkit-scrollbar-button {
      width: 0;
    }

    /* Track */
    .header-list_kategori::-webkit-scrollbar-track {
      background: #FFF;
      border-radius: 10px;
    }

    /* Handle */
    .header-list_kategori::-webkit-scrollbar-thumb {
      background: #F1A527;
      border-radius: 10px;
    }

    /* Handle on hover */
    .header-list_kategori::-webkit-scrollbar-thumb:hover {
      background: #F1A527;
      border-radius: 10px;
    }

    .content-berita__info {
      color: #F1A527;
      font-size: .6rem;
      position: absolute;
      bottom: 0;
      left: 1.25rem;
      right: 1.25rem;
      padding-bottom: .5rem;
    }

    .card_berita {
      border-radius: .7rem;
      box-shadow: 0 0 3px 0px #dedede;
    }

    .card-title {
      font-size: 1.1rem;
      color: #666;
      margin-bottom: 3rem;
    }

    .owl-nav {
      position: absolute;
      top: 45%;
      left: -1.5rem;
      right: -1.5rem;
      display: flex;
      justify-content: space-between;
      overflow: hidden;
    }

    .owl-nav .owl-prev,
    .owl-nav .owl-next {
      font-size: 1rem;
      padding: 0 .5rem;
      margin: 0 1rem;
      border-radius: 100%;
      background: #fff;
      box-shadow: 0 0 3px 0 #ccc;
      color: #aaa;
    }

    .owl-stage,
    .owl-item {
      overflow: hidden;
      border-radius: 1rem;
    }

    .owl-dots,
    .owl-thumbs {
      display: none;
    }

    .item {
      border-radius: 1rem;
      margin-bottom: 2rem;
      overflow: hidden
    }

    .item-content {
      width: 100vw;
      height: 30vw;
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

    <hr class="mt-0">
    <div class="mt-4 mb-4">
      <div class="container mt-4 mb-4">

        <?= $this->render('component/banner', [
          "banner" => \app\models\Berita::getbanner()
        ])
        ?>

        <form action="<?= \Yii::$app->request->baseUrl . "/news" ?>" method="get">
          <div class="input-group mb-4">
            <?php

            use yii\helpers\Url;

            if (Yii::$app->request->queryParams) :
              foreach (Yii::$app->request->queryParams as $key => $item) :
                if ($key == "kategori") : ?>
                  <input type="hidden" name="<?= $key ?>" value="<?= $item ?>">
            <?php endif;
              endforeach;
            endif ?>
            <input type="text" name="cari" class="form-control search-input" placeholder="Cari Berita" aria-label="Cari Berita" aria-describedby="button-addon2" value="<?= Yii::$app->request->queryParams['cari'] ?>">
            <button class="btn btn-search-input" type=submit" id="cari">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </form>

        <div class="text-center mt-5 mb-4">
          <div class="row">
            <div class="col-lg-2 col-md-12  mt-1">
              <h3 class="text-primary text-left"><?= Yii::t("cruds", "Berita") ?></h3>
            </div>
            <div class="col-lg-7 col-md-12  mt-1">
              <ul class="header-list_kategori d-lg-block d-none">
                <li class="<?= $_GET['kategori'] == null ? "active" : "" ?>"><a class="font-weight-bold" href="<?= \Yii::$app->request->baseUrl . "/home/news" ?>"><?= Yii::t("cruds", "Semua") ?></a></td>
                  <?php foreach ($categories as $kategori) {  ?>
                <li class="<?= $_GET['kategori'] == $kategori->nama ? "active" : "" ?>"><a class="font-weight-bold" href="<?= \Yii::$app->request->baseUrl . "/home/news?kategori=" . $kategori->nama ?>"><?= $kategori->nama ?> </a></td>
                <?php } ?>
              </ul>
              <select class="header-sort d-lg-none d-block" name="filter_kategori" id="filter_kategori">
                <option value="" <?= $_GET['kategori'] == "" ? "selected" : "" ?>><?= Yii::t("cruds", "Pilih kategori Berita") ?></option>
                <?php foreach ($categories as $kategori) {  ?>
                  <option value=" <?= $kategori->nama ?>" <?= $_GET['kategori'] == $kategori->nama ? "selected" : "" ?>><?= $kategori->nama ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-lg-3 col-md-12 text-left mt-1">
              <select class="header-sort" name="_sort" id="_sort">
                <option value="" <?= $_GET['_sort'] == null ? "selected" : "" ?>><?= Yii::t("cruds", "Pilih Pengurutan Berita") ?></option>
                <option value="1" <?= $_GET['_sort'] == 1 ? "selected" : "" ?>><?= Yii::t("cruds", "Terbaru dibuat") ?></option>
                <option value="2" <?= $_GET['_sort'] == 2 ? "selected" : "" ?>><?= Yii::t("cruds", "Terbaru Diubah") ?></option>
                <option value="3" <?= $_GET['_sort'] == 3 ? "selected" : "" ?>><?= Yii::t("cruds", "Paling Banyak dilihat") ?></option>
                <option value="4" <?= $_GET['_sort'] == 4 ? "selected" : "" ?>><?= Yii::t("cruds", "Paling Lama") ?></option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p style="font-size: .8rem;">
                <?= $summary ?>
              </p>
            </div>
          </div>
        </div>

        <div class="row mt-2">
          <?php foreach ($news as $berita) { ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 mt-3">
              <a href="<?= \Yii::$app->request->baseUrl . "/detail-berita?id=" . $berita->slug ?>">
                <div class="card h-100 card_berita">
                  <!-- <img src="" class="card-img-top" alt="..."> -->
                  <div style="border-radius: .7rem;background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/berita/" . $berita->gambar ?>);background-size: cover;height: 200px;">

                  </div>
                  <div class="card-body">
                    <h6 class="card-title"><?= $berita->getShowTitle() ?></h6>
                    <div class="content-berita__info">
                      <hr>
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-6 text-left">
                          <?= date("d M Y", strtotime($berita->created_at)); ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6 text-right">
                          <?= $berita->kategoriBerita->nama ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>
        </div>
        <div class="row mt-4 mb-4 text-center">
          <div class="col-md-12">
            <div class='d-flex justify-content-center'>
              <?php echo \yii\widgets\LinkPager::widget([
                'pagination' => $pagination,
                'maxButtonCount' => 5
              ]); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

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
    $("#_sort").on("change", (event) => {
      let params = <?= json_encode((Yii::$app->request->queryParams)) ?>;
      if (event.target.value == "") {
        delete params["_sort"];
      } else {
        params["_sort"] = event.target.value;
      }
      const url = new URL(`<?= Url::to(['/home/news'], true) ?>`);
      url.search = new URLSearchParams(params);
      console.log(url)
      window.location.href = url;
    })
    $("#filter_kategori").on("change", (event) => {
      let params = <?= json_encode((Yii::$app->request->queryParams)) ?>;
      if (event.target.value == "") {
        delete params["filter_kategori"];
      } else {
        params["filter_kategori"] = event.target.value;
      }
      const url = new URL(`<?= Url::to(['/home/news'], true) ?>`);
      url.search = new URLSearchParams(params);
      console.log(url)
      window.location.href = url;
    })
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: ["<i class='fa fa-angle-double-left'></i>", "<i class='fa fa-angle-double-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })
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