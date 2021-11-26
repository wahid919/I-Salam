<?= $this->render('component/head') ?>

<body>
  <div class="wrapper">
    <!-- =========================
        Header
    =========================== -->
    <?= $this->render('component/header') ?>

    <!-- ========================
        Services
    =========================== -->
    <hr class="mt-0">
    <section id="services" class="services pb-90" style="padding-top: 10px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="text-left">
              <h2 style="color: #ffa500;">Program</h>
              <p class="font-weight-bold text-summary"><?= $summary ?></p>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-category">
            <label class="font-weight-600 font-size-1" for="wakaf" style="color:#a5a4a4;">Pilih Kategori Wakaf</label>
            <select class="form-control select-category ml-auto" id="select-category">
              <option class="font-weight-bold" value="<?= \Yii::$app->request->baseUrl . "/home/program/" ?>">Semua Kategori</option>
              <?php foreach ($kategori_pendanaans as $kategori_pendanaan) {  ?>
                <option class="font-weight-bold" value="<?= \Yii::$app->request->baseUrl . "/home/program?kategori=" . $kategori_pendanaan->name ?>"><?= $kategori_pendanaan->name ?></option>
              <?php } ?>
            </select>
          </div>
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
              <div class="card shadow-br2" style="border-radius: 15px;">
                <!-- <img src="" class="card-img-top" alt="..."> -->
                <div class="team-img" style="background-image: url(<?= \Yii::$app->request->baseUrl . "/uploads/" . $pendanaan->poster ?>);border-radius: 15px;">
                </div>
                <div class="card-body">
                  <h6 class="card-title"><?= $pendanaan->nama_pendanaan ?></h6>
                  <div class="row">
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
                  </div>
                  <div class="row">
                    <div class="col-lg-8 col-md-8 col-8 text-left font-weight-bold" style="color: #ffa500;font-size: 1.3rem;">
                      <?= \app\components\Angka::toReadableHarga($nominal, false)  ?><br>
                    </div>
                    <div class="col-lg-4 col-md-4 col-4 text-right font-weight-bold" style="color: #ffa500;font-size: 1.3rem;">
                      <?= $interval; ?> Hari
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <a href="#" class="btn btn-sm btn-program btn-block">Mulai Wakaf</a>
                    </div>
                  </div>
                </div>
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

  <?= $this->render('component/js') ?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV6HOHjE9XM8IbEaL6ZMZdW8e0tavsOL8&libraries=places&region=id&language=en&sensor=false"></script>

  <script>
    $(document).ready(function() {
      $("#select-category").change(function() {
        var $option = $(this).find(':selected');
        var url = $option.val();
        if (url != "") {
          // url += "?text=" + encodeURIComponent($option.text());
          // Show URL rather than redirect
          // $("#output").text(url);
          console.log(url);
          window.location.href = url;
        }
      });
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