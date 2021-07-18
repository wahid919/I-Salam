<?php 
$dateY=date('Y');
$this->title = 'Chart Pengeluaran Tahun '.date('Y');
$query="SELECT b.nama as keterangan,sum(a.kredit) AS total FROM `transaksi_uang` `a` 
LEFT JOIN `kelompok_rekening` `b` ON a.id_kelompok_rekening=b.id
WHERE (`b`.`kelompok`='Kredit') AND (SUBSTRING(a.tanggal,1,4)='$dateY') group by a.id_kelompok_rekening";
$res=Yii::$app->db->createCommand($query)->queryAll();



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
          title: 'Pengeluaran Tahun '+year,
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