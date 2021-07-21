<?php
/* @var $this yii\web\View */
$this->title = 'Dashboard';

//$tableData = array_diff($tableData,$stk);
?>

<html>
  <head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Tanggal', 'Nominal'],
          <?php 
		 foreach($harian as $row)
		 {

			echo "['".$row['tanggal_pembayaran']."',".$row['nominal']."],";
		 } 
		 
		 ?>
        ]);

        var options = {
          title: 'Data Pendanaan',
          hAxis: {title: 'Tanggal',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Keterangan', 'Jumlah'],

          <?php 
		 

			echo "['Jumlah Pengguna Aktif',".$userAll."],";
			echo "['Jumlah Pengguna Investor',".$investor."],";
			echo "['Jumlah Pendanaan Diselesaikan',".$countPendanaan."]";
		  
		 
		 ?>
        ]);
        

        var options = {
          title: 'Data User',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
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
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark"><i class="icon-chart mr-10"></i>Update Data Pendanaan</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-9">
            
    <div id="chart_div" style="width: 100%; height: 100%"></div>
            </div>
            <div class="col-md-3">
              <table style="width: 100%;">
                <tr>
                  <th>Total Transaksi Wakaf</th>
                </tr>
                <tr>
                  <th>Rp <?= $pembayaran_diterima ?></th>
                </tr>
                <tr>
                  <th>Penyaluran Aktif Saat Ini</th>
                </tr>
                <tr>
                  <th>Rp 784.000.000</th>
                </tr>
                <tr>
                  <th>Total Wakaf yang telah dibagikan</th>
                </tr>
                <tr>
                  <th>Rp <?= $pendanaan_cair ?></th>
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
      <div class="panel-heading">
        <div class="pull-left">
          <h6 class="panel-title txt-dark"><i class="icon-chart mr-10"></i>Update Data User</h6>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-9">
            
            <div id="donutchart" style="width: 500px; height: 500px;"></div>
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