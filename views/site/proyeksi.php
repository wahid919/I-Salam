<?php
use app\models\KelompokRekening;
use app\models\TransaksiUang;
use app\models\Invoice;
use app\models\Pengajuan;
use yii\helpers\Html;

$this->title= 'Proyeksi';
$this->params['breadcrumbs'][]= $this->title;

$year=date('Y');
$datenow=date('Y-m-d');

//operasi
$kas_masuk=['Biaya'];




// var_dump($uang_masuk_pendanaan);
// die;

?>
<div class="row" style="padding: 0px 20px 0px 20px">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script type="text/javascript" src="../../views/site/downloadFile.js"></script> -->
<!-- <button onclick="exportData()">
            <span class="glyphicon glyphicon-download"></span>
            Download list</button> -->
            <style>
.button {
  background-color: #00a65a;
  border: none;
  border-radius: 3px;
  color: white;
  padding: 6px 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<button class ="button" onclick="tableHtmlToExcel('tblData', 'Proyeksi <?= date('Y') ?>')"> <span class="glyphicon glyphicon-download"></span> Export To Excel</button>
<?=Html::a('Print', ['cetak-proyeksi'], ['class' => 'btn btn-success','target' => '_blank'])?>
   <div class="col-md-12">
      <table class="table table table-striped table-bordered" id="tblData">
         <thead>

         <!-- Operasi -->
            <tr>
               <th width="10%"></th>
               <?php  for($i=0;$i<=4;$i++){
        $year=date('Y',strtotime("last day of +$i year"));
        // var_dump($total_pertama);
        // exit;
        ?>
               <th width="20%">Tahun <?= $year ?></th>
               <?php }
               $total_pertama=(new \yii\db\Query())
               ->select(['sum(a.debit) as debit'])
               ->from('transaksi_uang a')
               ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
               ->Where(['between', 'b.id', "5111", "5126"])
               ->andWhere(['SUBSTRING(a.tanggal,1,4)'=>date('Y')])
               ->all();
               $total_kedua=(new \yii\db\Query())
               ->select(['sum(a.debit) as debit'])
               ->from('transaksi_uang a')
               ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
               ->Where(['between', 'b.id', "5111", "5126"])
               ->andWhere(['SUBSTRING(a.tanggal,1,4)'=>date('Y', strtotime('+1 years'))])
               ->all();
               $total_ketiga=(new \yii\db\Query())
               ->select(['sum(a.debit) as debit'])
               ->from('transaksi_uang a')
               ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
               ->Where(['between', 'b.id', "5111", "5126"])
               ->andWhere(['SUBSTRING(a.tanggal,1,4)'=>date('Y', strtotime('+2 years'))])
               ->all();
               $total_keempat=(new \yii\db\Query())
               ->select(['sum(a.debit) as debit'])
               ->from('transaksi_uang a')
               ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
               ->Where(['between', 'b.id', "5111", "5126"])
               ->andWhere(['SUBSTRING(a.tanggal,1,4)'=>date('Y', strtotime('+3 years'))])
               ->all();
               $total_kelima=(new \yii\db\Query())
               ->select(['sum(a.debit) as debit'])
               ->from('transaksi_uang a')
               ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
               ->Where(['between', 'b.id', "5111", "5126"])
               ->andWhere(['SUBSTRING(a.tanggal,1,4)'=>date('Y', strtotime('+4 years'))])
               ->all();
            //    $end = date('Y-m-d', strtotime('+1 years'));
               ?>
            </tr>
         </thead>
         <tbody>
            <?php
            // var_dump($aktivas);
            // die;
            // echo $kas_masuk;
            $len = count($kas_masuk); 
            // var_dump($kas_masuk[0]);
            // exit;
            for($i=0;$i < $len; $i++){ ?>
                <tr>
                    <td>
                        <?= isset($kas_masuk[$i]) ? $kas_masuk[$i] : "" ?>
                    </td>
                    <td>
                        <?=  isset($total_pertama) ?  "Rp  " . number_format($total_pertama[0]['debit'], 2, ",", ".") : "" ?>
                    </td>
                    <td>
                        <?=  isset($total_kedua) ?  "Rp  " . number_format($total_kedua[0]['debit'], 2, ",", ".") : "" ?>
                    </td>
                    <td>
                    <?=  isset($total_ketiga) ?  "Rp  " . number_format($total_ketiga[0]['debit'], 2, ",", ".") : "" ?>
                    </td>
                    <td>
                    <?=  isset($total_keempat) ?  "Rp  " . number_format($total_keempat[0]['debit'], 2, ",", ".") : "" ?>
                    </td>
                    <td>
                    <?=  isset($total_kelima) ?  "Rp  " . number_format($total_kelima[0]['debit'], 2, ",", ".") : "" ?>
                    </td>
                </tr>
            <?php } ?>
           <!-- <th>time_sleep_until</th> -->
         </tbody>
      </table>
   </div>
</div>
<script>
document.getElementById("tblData").style.marginTop = "20px";
function tableHtmlToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
   
    filename = filename?filename+'.xls':'excel_data.xls';
   
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
   
        downloadLink.download = filename;
       
        downloadLink.click();
    }
}

</script>