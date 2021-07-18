<?php
$dateY=date('Y');
$now=date('Y-m-d');
// $this->title = 'Chart Pemasukkan Tahun '.date('Y');
$query1="SELECT b.nama as keterangan,sum(a.debit) AS pemasukkan,sum(a.kredit) as pengeluaran FROM `transaksi_uang` `a` 
LEFT JOIN `kelompok_rekening` `b` ON a.id_kelompok_rekening=b.id
WHERE (a.tanggal='$now') group by a.id_kelompok_rekening";
// $query1="SELECT tanggal as keterangan,sum(debit) AS pemasukkan,sum(kredit) as pengeluaran FROM `transaksi_uang` 
//  WHERE (tanggal='$now') group by tanggal";

$ras=Yii::$app->db->createCommand($query1)->queryAll();
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['keterangan', 'pemasukkan','pengeluaran'],
      <?php 
      if($ras != null){

      
		 foreach($ras as $rows)
		 {
			echo "['".$rows['keterangan']."',".$rows['pemasukkan'].",".$rows['pengeluaran']."],";
     }
    }else{
      echo "Data tidak ada";
    } 
		 
		 ?>
        ]);
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;
        var options = {
            
          title: 'Pemasukkan Dan Pengeluaran '+today,
          hAxis: {title: 'Keterangan',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 400px;"></div>
  </body>
</html>
