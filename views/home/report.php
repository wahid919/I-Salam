<?php

use app\components\Tanggal;
use richardfan\widget\JSRegister;

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
<hr class="mt-0">
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

<?php $this->registerJs(\Yii::$app->request->BaseUrl . '/chart/chart.js') ?>
<?php JSRegister::begin(); ?>
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
            return [' Rp ' + value, ' Rp ' + value2];
          },
        },
      }
    }
  });
</script>
<?php JSRegister::end(); ?>