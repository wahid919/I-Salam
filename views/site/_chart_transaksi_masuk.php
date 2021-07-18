<?php 
$dateY=date('Y');
$now=date('Y-m-d');
$this->title = 'Chart Pemasukkan Tahun '.date('Y');

$query="SELECT b.nama as keterangan,sum(a.debit) AS total FROM `transaksi_uang` `a` 
LEFT JOIN `kelompok_rekening` `b` ON a.id_kelompok_rekening=b.id
WHERE (`b`.`kelompok`='Debit') AND (SUBSTRING(a.tanggal,1,4)='$dateY') group by a.id_kelompok_rekening";
$query1="SELECT b.nama as keterangan,sum(a.debit) AS pemasukkan,sum(a.kredit) as pengeluaran FROM `transaksi_uang` `a` 
LEFT JOIN `kelompok_rekening` `b` ON a.id_kelompok_rekening=b.id
WHERE (a.tanggal='$now') group by a.id_kelompok_rekening";
$res= Yii::$app->db->createCommand($query)->queryAll();
$ras= Yii::$app->db->createCommand($query1)->queryAll();
// $res=(new \yii\db\Query())
// ->select(['b.nama as keterangan','a.debit as total'])
// ->from('transaksi_uang a')
// ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
// ->Where(['b.kelompok'=>"Debit"])
// ->andWhere(['SUBSTRING(a.tanggal,1,4)'=>date('Y')])
// ->all();
// var_dump($ras->fetch_assoc());
// die;



?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
			['keterangan', 'total'],
		  <?php 
		 foreach($res as $row)
		 {

			echo "['".$row['keterangan']."',".$row['total']."],";
		 } 
		 
		 ?>
        ]);
        var yeartoday=new Date();
        var year=yeartoday.getFullYear();
        var options = {
          title: 'Pemasukkan Tahun '+year,
          pieHole: 0.4,
		  colors: ['#ff6600','#3CB371','#296d98']
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
	  $(window).resize(function(){
  drawChart();
  });
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 500px; height: 500px;"></div>
  </body>
</html>

