<?php
use app\models\KelompokRekening;
use app\models\TransaksiUang;
use app\models\Invoice;
use app\models\Pengajuan;
use yii\helpers\Html;
$this->title= 'Arus Kas';
$this->params['breadcrumbs'][]= $this->title;

$year=date('Y');
$datenow=date('Y-m-d');
//tanda tangan
$ttd_keuangan= (new \yii\db\Query())
->select(['tanda_tangan','name'])
->from('user')
->Where(['role_id'=>'1'])
->all();
$ttd_manager=(new \yii\db\Query())
->select(['tanda_tangan','name'])
->from('user')
->Where(['role_id'=>'5'])
->all();
$ttd_direktur=(new \yii\db\Query())
->select(['tanda_tangan','name'])
->from('user')
->Where(['role_id'=>'4'])
->all();
$ttd_komisaris=(new \yii\db\Query())
->select(['tanda_tangan','name'])
->from('user')
->Where(['role_id'=>'6'])
->all();
//operasi
$kas_masuk=['Biaya'];
?>
<div class="row" style="padding: 0px 20px 0px 20px">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script type="text/javascript" src="../../views/site/downloadFile.js"></script> -->
<!-- <button onclick="exportData()">
            <span class="glyphicon glyphicon-download"></span>
            Download list</button> -->
   <div class="col-md-12">
   <table>
         <thead>
            <tr>
               <th width="40%"></th>
               <!-- <th width="20%"></th> -->
               <th style="padding-left: 5px; padding-bottom: 3px;">
                    <!-- <strong style="font-size: 20px;">AMONG TANI FOUNDATION</strong> -->
               </th>
            </tr>
            <tr>
                <td colspan = 2><?= Html::img(["uploads/kop2.png"], ["width"=>"110px"]); ?></td>
                <!-- <td></td> -->
                <td style="padding-left: 5px; padding-bottom: 3px; font-size: 12px;">
                <br>
                <strong style="font-size: 20px;">AMONG TANI FOUNDATION</strong><br>
                    JL.HASANUDIN NO.22 KOTA BATU,65313 <br>
                    Phone : (0341 3061627) Email : amongtanifound@gmail.com
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td  style="padding-left: 5px; padding-bottom: 3px; font-size: 9px;">
                   <!-- Phone : (0341 3061627) Email : amongtanifound@gmail.com -->
                </td>
            </tr>
         </thead>
         <tbody>
         </tbody>
         </table>
         ===========================================================================
         <h1 style="text-align: center;">Proyeksi</h1>
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
           
         </tbody>
      </table>
      <table>
         <thead>
            <tr>
               <th width="15%"></th>
               <th width="25%" style="padding-left: 5px;
                 padding-bottom: 3px;">
                <strong style="font-size: 13px;"><?="Keuangan"?></strong>
                </th>
               <th></th>
               <th width="15%"></th>
               <th width="25%" style="padding-left: 5px;
                 padding-bottom: 3px;">
                <strong style="font-size: 13px;"><?="Direktur"?></strong>
                </th>
               <th></th>
            </tr>
            <tr class>
                    <td></td>
                    <td><?= Html::img(["uploads/".$ttd_keuangan[0]['tanda_tangan']], ["width"=>"150px"]); ?></td>
                    <td></td>
                    <td><?= Html::img(["uploads/bt19.png"], ["width"=>"150px"]); ?></td>
                    <td><?= Html::img(["uploads/".$ttd_direktur[0]['tanda_tangan']], ["width"=>"150px"]); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 5px; padding-bottom: 3px;">
                    <strong style="font-size: 10px;"><?= $ttd_keuangan[0]['name'] ?></strong>
                    </td>
                    <td></td>
                    <td></td>
                    <td style="padding-left: 5px; padding-bottom: 3px;">
                    <strong style="font-size: 10px;"><?= $ttd_direktur[0]['name'] ?></strong>
                    </td>
                    <td></td>
                </tr>
                <h1></h1>
                <tr>
               <th width="15%"></th>
               <th width="25%" style="padding-left: 5px;
                 padding-bottom: 3px;">
                <strong style="font-size: 13px;"><?="Komisaris"?></strong>
                </th>
               <th></th>
               <th width="15%"></th>
               <th width="25%" style="padding-left: 5px;
                 padding-bottom: 3px;">
                <strong style="font-size: 13px;"><?="Manager"?></strong>
                </th>
               <th></th>
            </tr>
            <tr class>
                    <td></td>
                    <td><?= Html::img(["uploads/".$ttd_komisaris[0]['tanda_tangan']], ["width"=>"150px"]); ?></td>
                    <td></td>
                    <td></td>
                    <td><?= Html::img(["uploads/".$ttd_manager[0]['tanda_tangan']], ["width"=>"150px"]); ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="padding-left: 5px; padding-bottom: 3px;">
                    <strong style="font-size: 10px;"><?= $ttd_komisaris[0]['name'] ?></strong>
                    </td>
                    <td></td>
                    <td></td>
                    <td style="padding-left: 5px; padding-bottom: 3px;">
                    <strong style="font-size: 10px;"><?= $ttd_manager[0]['name'] ?></strong>
                    </td>
                    <td></td>
                </tr>
         </thead>
         <tbody>
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