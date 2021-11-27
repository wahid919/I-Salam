<?php

use app\components\Tanggal;

$daftartanggal = [];
$total = [];

$daftartanggal2 = [];
$total2 = [];
$a = [];
for ($i = 1; $i <= 12; $i++) {
  // $tgl_terpilih = date("Y-m-d", strtotime(date("Y-m-$i")));
  $flag1 = 1;
  $flag2 = 1;
  $a[$i] = $i;
  $date = date("Y-$i-d");
  $time = strtotime($date);
  $daftartanggal[] = Tanggal::getBulan(date($time), FALSE);
  foreach ($rows_himpunans as  $rows_himpunan) {
    if ($rows_himpunan['bulan'] == $i && $rows_himpunan['tahun'] == date('Y')) {
      $total[(int)$i] = (int)$rows_himpunan['nominal'];
      $flag1 = 0;
    }
  }
  foreach ($rows_penyalurans as  $rows_penyaluran) {
    if ($rows_penyaluran['bulan'] == $i && $rows_penyaluran['tahun'] == date('Y')) {
      $total2[(int)$i] = (int)$rows_penyaluran['nominal'];
      $flag2 = 0;
    }
  }
  if ($flag1) {
    $total[(int)$i] = 0;
  }
  if ($flag2) {
    $total2[(int)$i] = 0;
  }
}
// var_dump($daftartanggal);die;
?>
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


    <!-- ========================
        Request Quote Tabs
    =========================== -->

    <section id="services" class="services pb-90" style="margin-left: 2rem;margin-bottom:-25rem">
      <div class="container">
        <div class="row heading heading-2 mb-40">
          <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
              <h2 class="text-left pb-3" style="color:#f1a527;font-size:1.5rem;line-height: 1;margin-bottom:-15px;">Report Wakaf</h2>
              <hr>
              <div class="row">
                <div class="col-sm-3">

                  <h2 class="text-left pb-3" style="color:#f1a527;font-size:1rem;line-height: 1.3;">GRAFIK <br />PENGHIMPUNAN <br /> DAN PENYALURAN</h2>
                  <style>
                    /* table, td, th {
  border: 1px solid black;
} */

                    table {
                      display: inline-table;
                      width: 90%;
                      border-collapse: collapse;
                    }
                  </style>
                  <table>
                    <tr>
                      <th>
                        <h4 style="color:#f1a527;font-size:1rem;line-height: 1.3;">Total Keseluruhan</h4>
                      </th>
                    </tr>
                    <tr>
                      <td>Pengimpunan</td>
                    </tr>
                    <tr>
                      <th>
                        <h4 style="color:#f1a527;font-size:1rem;line-height: 1.3;"><?= \app\components\Angka::toReadableHarga($penghimpunan); ?></h4>
                      </th>
                    </tr>
                    <tr>
                      <td>Penyaluran</td>
                    </tr>
                    <tr>
                      <th>
                        <h4 style="color:#f1a527;font-size:1rem;line-height: 1.3;"><?= \app\components\Angka::toReadableHarga($penyaluran); ?></h4>
                      </th>
                    </tr>
                  </table>
                </div>
                <div class="col-sm-9">
                  <!-- <canvas id='myChart' width='400' height='150'></canvas> -->
                  <div class="chart-container" style="position: relative; height: 750px !important; width: 750px  !important;">
    <canvas id="myChart"></canvas>
</div>
 
                </div>
              </div>

            </div>

          </div><!-- /.col-lg-5 -->
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

  <script src="<?= \Yii::$app->request->BaseUrl ?>/chart/chart.js"></script>
  <script>
    var ctx = document.getElementById("myChart").getContext("2d");

    var data = {
      labels: <?= json_encode($daftartanggal) ?>,
      datasets: [{
          label: "Pengimpunan Dana",
          backgroundColor: "#fcb233",
          data: <?= json_encode(array_values($total)) ?>,
        },
        {
          label: "Penyaluran Dana",
          backgroundColor: "#d07500",
          data: <?= json_encode(array_values($total2)) ?>,
        },
      ]
    };

    var myBarChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: {
        barValueSpacing: 20,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: !0,
              userCallback: function(value, index, values) {
                // Convert the number to a string and splite the string every 3 charaters from the end
                value = value.toString();
                value = value.split(/(?=(?:...)*$)/);

                // Convert the array to a string and format the output
                value = value.join('.');
                return ' Rp ' + value;
              }
            }
          }]
        },
        tooltips: {
          mode: 'label',
          label: 'mylabel',
          callbacks: {
            label: function(tooltipItem, data) {
              var value = Number(data.datasets[0].data[tooltipItem.index]);
              var value2 = Number(data.datasets[1].data[tooltipItem.index]);
              value = value.toString();
              value = value.split(/(?=(?:...)*$)/);

              value2 = value2.toString();
              value2 = value2.split(/(?=(?:...)*$)/);

              // Convert the array to a string and format the output
              value = value.join('.');
              value2 = value2.join('.');
              // var hasil = ' Rp ' + value;
              // var hasil2 = ' Rp ' + value2;
              return [' Rp ' + value,' Rp ' + value2];
            },
          },
        }
      }
    });
  </script>
</body>

</html>