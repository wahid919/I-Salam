<?php
/* @var $this yii\web\View */
$this->title = 'Dashboard';

use app\components\Tanggal;

//$tableData = array_diff($tableData,$stk);
$tgl1 = date('Y-m-d', strtotime('-30 days')) . ' 00:00:00';
$tgl2 = date('Y-m-d') . ' 23:59:59';
$hari_ini = date("Y-m-d");
$tgl_terakhir = date('t', strtotime($hari_ini));
$tgl_akhir = (int)$tgl_terakhir;
$DB = Yii::$app->db;
//SELECT *, DATE(`tgl_transaksi`) AS `tgl` FROM `transaksi` WHERE `tgl_transaksi` BETWEEN '2021-08-20 00:00:01' AND '2021-09-05 23:59:00' GROUP BY `tgl`
$trans = $DB->createCommand("SELECT DATE(`tanggal_konfirmasi`) AS `tgl`, SUM(`nominal`)  AS `total` FROM `pembayaran` 
WHERE `status_id`=6
GROUP BY `tgl`")->queryAll();

$daftartanggal = [];
$total = [];
// $a =[];
$a = 0;
for ($i = 1; $i <= $tgl_akhir; $i++) {
  $tgl_terpilih = date("Y-m-d", strtotime(date("Y-m-$i")));
  $daftartanggal[] = Tanggal::toReadableDate($tgl_terpilih, FALSE);
  $flag = 1;
  foreach ($trans as  $tran) {

    if ($tran['tgl'] == $tgl_terpilih) {
      $total[(int)date('d', strtotime($tgl_terpilih))] = (int)$tran['total'];
      $flag = 0;
      // $a = 
    }
  }
  if ($flag) {
    $total[(int)date('d', strtotime($tgl_terpilih))] = 0;
  }
}
?>

<html>

<head>

</head>

<body>
  <div class="row">
    <div class="col-xs-12" style="margin-bottom: 20px;">
      <h4 class="text-center">
        Selamat Datang di Dashboard <?= \Yii::$app->user->identity->name; ?>
      </h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default card-view">
        <div class="panel-heading" style="background-color:#f39c12;color:#FFFFFF">
          <div class="pull-left">
            <h6 class="panel-title txt-dark"><i class="icon-chart mr-10"></i>Update Data Pendanaan</h6>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-9">

                <div class="panel panel-primary">
                  <div class="panel-body">
                    <canvas id='TransChart' width='400' height='150'></canvas>
                    <script src="<?= \Yii::$app->request->BaseUrl ?>/chart/chart.js"></script>
                    <script>
                      var ctx = document.getElementById('TransChart').getContext('2d');
                      var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                          labels: <?= json_encode($daftartanggal) ?>,
                          datasets: [{
                            label: 'Transaksi Wakaf per Hari',
                            data: <?= json_encode(array_values($total)) ?>,
                            borderColor: [
                              'rgba(30, 30, 250, 1)',
                            ],
                            'backgroundColor': ['#f00'],
                            'pointBackgroundColor': ['#f00'],
                            'pointBorderColor': ['#f00'],
                            'pointHoverBackgroundColor': ['#f00'],
                            'pointHoverBorderColor': ['#f00'],
                            fill: false,
                            borderWidth: 2
                          }]
                        },
                        options: {
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
                                value = value.toString();
                                value = value.split(/(?=(?:...)*$)/);

                                // Convert the array to a string and format the output
                                value = value.join('.');
                                return ' Rp ' + value;
                              },
                            },
                          }
                        }
                      });
                    </script>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <table style="width: 100%;">
                  <tr>
                    <th>Total Transaksi Wakaf</th>
                  </tr>
                  <tr>
                    <th><?= \app\components\Angka::toReadableHarga($pembayaran_diterima) ?></th>
                  </tr>
                  <!-- <tr>
                    <th>Penyaluran Aktif Saat Ini</th>
                  </tr>
                  <tr>
                    <th>Rp 784.000.000</th>
                  </tr> -->
                  <tr>
                    <th>Total Wakaf yang telah dibagikan</th>
                  </tr>
                  <tr>
                    <th><?= \app\components\Angka::toReadableHarga($penyaluran) ?></th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default card-view">
        <div class="panel-heading" style="background-color:#f39c12;color:#FFFFFF">
          <div class="pull-left">
            <h6 class="panel-title txt-dark"><i class="icon-chart mr-10"></i>Update Data User</h6>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-9">

                <canvas id='pieChart' width='400' height='150'></canvas>
                <script src="<?= \Yii::$app->request->BaseUrl ?>/chart/chart.js"></script>
                <script>
                  var ctx = document.getElementById('pieChart').getContext('2d');
                  const data = {
  labels: [
    'Jumlah Pengguna Aktif',
    'Jumlah Investor',
    'Jumlah Pendanaan Diselesaikan'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [<?=$userAll ?>, <?=$investor ?>, <?= $countPendanaan ?>],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};
                  var myChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: data,

                  });
                </script>
              </div>
              <div class="col-md-3">
                <table style="width: 100%;">
                  <tr>
                    <th>Jumlah Pengguna Aktif</th>
                  </tr>
                  <tr>
                    <th><?= $userAll ?> Orang</th>
                  </tr>
                  <tr>
                    <th>Jumlah Investor Aktif</th>
                  </tr>
                  <tr>
                    <th><?= $investor ?> Orang</th>
                  </tr>
                  <tr>
                    <th>Jumlah Pendanaan Diselesaikan</th>
                  </tr>
                  <tr>
                    <th><?= $countPendanaan ?> Pendanaan</th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
