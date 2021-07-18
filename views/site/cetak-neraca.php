<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\AbsensiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\KelompokRekening;
use app\models\TransaksiUang;
use yii\helpers\Html;

$this->title = 'Neraca';
$this->params['breadcrumbs'][] = $this->title;
$month = date('m');
$mm = date('F');
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
$year = date('Y');
$datenow = date('Y-m-d');
$f = date('F');
$laba_rugi=['Laba Periode lalu','Laba Bersih Periode ini','Total Komponen LABA RUGI'];
$sum_debit = TransaksiUang::find()
->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
->sum('debit');
$sum_kredit = TransaksiUang::find()
->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
->sum('kredit');
$tahun_ini = $sum_debit - $sum_kredit;
$yaaaa=date('Y',strtotime("last day of -1 year"));
$sum_debit_lalu = TransaksiUang::find()
->where(['SUBSTRING(tanggal,1,4)'=>"$yaaaa"])
->sum('debit');
$sum_kredit_lalu = TransaksiUang::find()
->where(['SUBSTRING(tanggal,1,4)'=>"$yaaaa"])
->sum('kredit');
$tahun_lalu=$sum_debit_lalu - $sum_kredit_lalu;
$total_laba_rugi=$tahun_lalu+$tahun_ini;
$uang_laba_rugi=[$tahun_lalu,$tahun_ini,$total_laba_rugi];

// $saldo_last = TransaksiUang::find()
// ->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
// ->select(['saldo_akhir'])
// ->limit(1)
// ->orderBy(['id' => SORT_DESC])
// ->findAll();
// $saldo_last = (new \yii\db\Query())
//     ->select('saldo_akhir')
//     ->from('transaksi_uang')
//     ->where(['and', ['>=', 'tanggal', "$year-$month-01"], ['<=', 'tanggal', "$datenow"]])
//     ->limit(1)
//     ->orderBy(['id' => SORT_DESC])
//     ->all();
// // $saldo_last = $query->all();
// echo $saldo_last->createCommand()->sql;
$kelompokbos = KelompokRekening::find()
    ->where(['kelompok' => 'debit'])
    ->select('id')->all();
$transaksi_uang = TransaksiUang::find()->where(['id_kelompok_rekening' => $kelompokbos])->groupBy('id_kelompok_rekening');
$hutang=['Hutang Jangka Panjang(4)','Pendapatan Diterima Dimuka','Hutang Gaji','Hutang Lancar Lainnya'];
$hutang_2=['Hutang Usaha','Hutang Bank','Hutang Pihak Ketiga','Hutang Pihak Khusus'];
$pendapatan_diterima_dimuka=(new \yii\db\Query())
    ->select(['b.nama', 'sum(a.kredit) as kredit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['b.id'=> "2101"])
    ->groupBy('b.nama')->all();
$hutang_gaji=(new \yii\db\Query())
->select(['b.nama', 'sum(a.kredit) as kredit'])
->from('transaksi_uang a')
->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
->Where(['b.id'=> "2102"])
->groupBy('b.nama')->all(); 

$hutang_lainnya=(new \yii\db\Query())
->select(['b.nama', 'sum(a.kredit) as kredit'])
->from('transaksi_uang a')
->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
->Where(['b.id'=> "2103"])
->groupBy('b.nama')->all();

$hutang_uang=[$hutangss,$pendapatan_diterima_dimuka,$hutang_gaji,$hutang_lainnya];
$hut_usaha=TransaksiUang::find()->where(['id_kelompok_rekening' => '2104'])
->select(['sum(kredit) as kredit'])->all();
$hut_bank=TransaksiUang::find()->where(['id_kelompok_rekening' => '2105'])
->select(['sum(kredit) as kredit'])->all();
$hut_ketiga=TransaksiUang::find()->where(['id_kelompok_rekening' => '2106'])
->select(['sum(kredit) as kredit'])->all();
$hut_khusus=TransaksiUang::find()->where(['between','id_kelompok_rekening',"2107","2109"])
->select(['sum(kredit) as kredit'])->all();
$hutang_uang_2=[$hut_usaha,$hut_bank,$hut_ketiga,$hut_khusus];


$tidak_wujud=(new \yii\db\Query())
->select(['a.tujuan', 'sum(b.total) as total'])
->from('pengajuan a')
->leftJoin('invoice b', 'a.id=b.id_pengajuan')
->Where(['a.status'=> "2"])
->groupBy('a.id')->all();
$total_tidak_wujud=(new \yii\db\Query())
->select(['sum(b.total) as total'])
->from('pengajuan a')
->leftJoin('invoice b', 'a.id=b.id_pengajuan')
->Where(['a.status'=> "2"])
->all();
$total_akumulasi=(new \yii\db\Query())
->select(['sum(b.total) as total'])
->from('pengajuan a')
->leftJoin('invoice b', 'a.id=b.id_pengajuan')
->Where(['a.status'=> "2"])
->all();
$count_tak_wujud=$total_tidak_wujud[0]['total'];
$count_akumulasi=$total_akumulasi[0]['total'];
$total_aktiva_tak_berwujud=$count_tak_wujud-$count_akumulasi;
// $hutang = (new \yii\db\Query())
//     ->select(['b.nama', 'sum(a.kredit) as kredit'])
//     ->from('transaksi_uang a')
//     ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
//     ->Where(['between', 'b.id', "2101", "2103"])
//     ->groupBy('b.nama')->all();
// $hutang_2 = (new \yii\db\Query())
//     ->select(['b.nama', 'sum(a.kredit) as kredit'])
//     ->from('transaksi_uang a')
//     ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
//     ->Where(['between', 'b.id', "2104", "2109"])
//     ->groupBy('b.nama')->all();
// $hutang_3 = (new \yii\db\Query())
//     ->select(['b.nama', 'sum(a.kredit) as kredit'])
//     ->from('transaksi_uang a')
//     ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
//     ->Where(['between', 'b.id', "1119", "1122"])
//     ->groupBy('b.nama')->all();
$sum_total_hutang=['Total Hutang'];
// var_dump($uang_hutang);
// die;
$uang_total_hutang=[$uang_hutang];
$hutang_3=['Akumulasi Penyusustan Instalasi','Akumulasi Penyusustan Gedung','Akumulasi Penyusutan Kendaraan','Akumulasi Penyusutan Peralatan'];
$penyusutan_instalasi=TransaksiUang::find()->where(['id_kelompok_rekening' => '1119'])
->select(['sum(kredit) as kredit'])->all();
$penyusutan_gedung=TransaksiUang::find()->where(['id_kelompok_rekening' => '1120'])
->select(['sum(kredit) as kredit'])->all();
$penyusutan_kendaraan=TransaksiUang::find()->where(['id_kelompok_rekening' => '1121'])
->select(['sum(kredit) as kredit'])->all();
$penyusutan_peralatan=TransaksiUang::find()->where(['id_kelompok_rekening' => '1122'])
->select(['sum(kredit) as kredit'])->all();
$hutang_uang_3=[$penyusutan_instalasi,$penyusutan_gedung,$penyusutan_kendaraan,$penyusutan_peralatan];
$sum_hutang = (new \yii\db\Query())
    ->select(['sum(a.kredit) as kredit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['between', 'b.id', "2101", "2103"])
    ->all();
$sum_hutang_2 = (new \yii\db\Query())
    ->select(['sum(a.kredit) as kredit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['between', 'b.id', "2104", "2109"])
    ->all();
$sum_hutang_3 = (new \yii\db\Query())
    ->select(['sum(a.kredit) as kredit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['between', 'b.id', "1119", "1122"])
    ->all();
// $hutang=KelompokRekening::find()->where(['between', 'id', "2101", "2103" ])->all();
// $aktivitas=KelompokRekening::find()->where(['between', 'id', "1101", "1112" ])->all();
// $aktivas=TransaksiUang::find()->select(['kelompok_rekening.nama','sum(debit) as debit'])
// ->where(['kelompok_rekening.kelompok'=>"debit"])
// ->groupBY('kelompok_rekening.nama')
// ->joinWith(['kelompokRekening']);
$hutanguang = TransaksiUang::find()->select(['kelompok_rekening.nama', 'sum(kredit) as kredit'])
    ->where(['between', 'kelompok_rekening.id', "2101", "2103"])
    ->joinWith(['kelompokRekening']);


$kas_kecil = TransaksiUang::find()->where(['id_kelompok_rekening' => '1102'])
    ->select(['sum(debit) as debit'])->all();
$kas = TransaksiUang::find()->where(['id_kelompok_rekening' => '1101'])
    ->select(['sum(debit) as debit'])->all();
$saham= TransaksiUang::find()->where(['id_kelompok_rekening' => '1103'])
->select(['sum(debit) as debit'])->all();
$obligasi= TransaksiUang::find()->where(['id_kelompok_rekening' => '1104'])
->select(['sum(debit) as debit'])->all();
$giro= TransaksiUang::find()->where(['id_kelompok_rekening' => '1105'])
->select(['sum(debit) as debit'])->all();
$persediaan= TransaksiUang::find()->where(['between', 'id_kelompok_rekening', "1106", "1109"])
->select(['sum(debit) as debit'])->all();
$beban=TransaksiUang::find()->where(['id_kelompok_rekening' => '1110'])
->select(['sum(debit) as debit'])->all();
$piutang= TransaksiUang::find()->where(['between', 'id_kelompok_rekening', "1111", "1112"])
->select(['sum(debit) as debit'])->all();
$aktivas_uang=[$kas_kecil,$kas,$saham,$obligasi,$giro,$persediaan,$beban,$piutang];
$tanah=TransaksiUang::find()->where(['id_kelompok_rekening' => '1114'])
->select(['sum(debit) as debit'])->all();
$instalasi= TransaksiUang::find()->where(['id_kelompok_rekening' => '1115'])
->select(['sum(debit) as debit'])->all();
$gedung=TransaksiUang::find()->where(['id_kelompok_rekening' => '1116'])
->select(['sum(debit) as debit'])->all();
$kendaraan=TransaksiUang::find()->where(['id_kelompok_rekening' => '1117'])
->select(['sum(debit) as debit'])->all();
$peralatan=TransaksiUang::find()->where(['id_kelompok_rekening' => '1118'])
->select(['sum(debit) as debit'])->all();
$aktivas_uang_2=[$tanah,$instalasi,$gedung,$kendaraan,$peralatan];
$aktivas=['Kas Kecil(PattyCash)','Kas','Surat Berharga - saham','Surat Berharga - Obligasi','Giro','Persediaan','Beban Dibayar Dimuka','Piutang'];
$aktivas_2=['Tanah','Instansi','Gedung','Kendaraan','Peralatan'];
// $aktivas_2 = (new \yii\db\Query())
//     ->select(['b.nama', 'sum(a.debit) as debit'])
//     ->from('transaksi_uang a')
//     ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
//     ->Where(['between', 'b.id', "1114", "1118"])
//     ->groupBy('b.nama')->all();
$sum_aktivitas = (new \yii\db\Query())
    ->select(['sum(a.debit) as debit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['between', 'b.id', "1101", "1112"])
    ->all();
$sum_aktivitas_2 = (new \yii\db\Query())
    ->select(['sum(a.debit) as debit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['between', 'b.id', "1114", "1118"])
    ->all();


$gethutang=$sum_hutang[0]['kredit'];
$get_hutang2=$sum_hutang2[0]['kredit'];
$count=$gethutang + $get_hutang2;

$gettetap=$sum_aktivitas_2[0]['debit'];
$getakumulasi=$sum_hutang_3[0]['kredit'];
$count_hasil=$gettetap - $getakumulasi;

$getmodal = (new \yii\db\Query())
->select(['sum(a.debit) as debit'])
->from('transaksi_uang a')
->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
->Where(['between', 'b.id', "5111", "5126"])
->all();
// echo json_encode($sum_aktivitas[0]['debit']);
// exit;
// var_dump($hutang_3->createCommand()->getRawSql());
// exit;

$listaktivas = TransaksiUang::find()->where(['between', 'id_kelompok_rekening', "1102", "1112"])->all();
$tetap=$sum_aktivitas_2[0]['debit'];
$lancar=$sum_aktivitas[0]['debit'];
$count_aktiva=$total_aktiva_tak_berwujud+$tetap+$lancar;

$modalnya=$getmodal['debit'];
$hutangnya=$sum_hutang[0]['kredit'];
$count_passiva=$hutangnya+$modalnya+$total_laba_rugi;
$check=$count_aktiva-$count_passiva;
$hutang_jangka_pendek=$sum_hutang[0]['kredit'];
$hutang_jangka_panjang=$sum_hutang_2[0]['kredit'];
$uang_hutang=$hutang_jangka_pendek+$hutang_jangka_panjang;
// var_dump($uang_hutang);
// die;
?>
<!-- <style type="text/css">
    table.font {
        font-size: 100px;
        font-family: cambria;
    }
    </style> -->
<div class="row" style="padding: 0px 20px 0px 20px">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script type="text/javascript" src="../../views/site/downloadFile.js"></script> -->
<!-- <button onclick="exportData()">
            <span class="glyphicon glyphicon-download"></span>
            Download list</button> -->
      
<div class="form-group">
</div>
   <div class="col-md-12">
   <table>
         <thead>
            <tr>
               <th width="15%"></th>
               <th width="20%"></th>
               <th style="padding-left: 5px; padding-bottom: 3px;">
                    <!-- <strong style="font-size: 20px;">AMONG TANI FOUNDATION</strong> -->
               </th>
            </tr>
            <tr>
                <td colspan = 2><?= Html::img(["uploads/bt19.png"], ["width"=>"110px"]); ?></td>
                <td></td>
                <td style="padding-left: 5px; padding-bottom: 3px; font-size: 12px;">
                <br>
                <strong style="font-size: 20px;">AMONG TANI KEMILAU</strong><br>
                    JL.HASANUDIN NO.22 KOTA BATU,65313 <br>
                    Phone : (0341 3061627) Email : amongtanikemilau2020@gmail.com
                </td>
                <td><?= Html::img(["uploads/logo-atk.png"], ["width"=>"110px"]); ?></td>
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
      <table autosize="0">
         <thead>
            <tr>
               <th width="15%">AKTIVA</th>
               <th width="15%">Januari - Desember <?= date('Y')?></th>
               <th>Periode Lalu</th>
               <th width="15%">PASIVA</th>
               <th width="15%">Januari - Desember <?= date('Y')?></th>
               <th>Periode Lalu</th>
            </tr>
         </thead>
         <tbody>
         <tr>
         <th></th>
         </tr>
            <th width="10%">AKTIVA LANCAR(1)</th>
            <th width="15%"></th>
            <th></th>
            <th width="5%">HUTANG</th>
            <th width="15%"></th>
            <th></th>
            <?php
            // var_dump($aktivas_uang);
            // die;
            $len = count($aktivas) > count($hutang) ? count($aktivas) : count($hutang); 
            for($i=0;$i < $len; $i++){ ?>
                <tr>
                    <td>
                        <?= isset($aktivas[$i]) ? $aktivas[$i] : "" ?>
                    </td>
                    <td>
                        <?= isset($aktivas_uang[$i]) ? "Rp  " . number_format($aktivas_uang[$i][0]['debit'], 2, ",", "."):   "" ?>
                    </td>
                    <td></td>
                    <td>
                        <?= isset($hutang[$i]) ? $hutang[$i] : "" ?>
                    </td>
                    <td>
                        <?= isset($hutang_uang[$i]) ? "Rp  " . number_format($hutang_uang[$i][0]['kredit'], 2, ",", "."): "" ?>
                    </td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th>TOTAL AKTIVA LANCAR</th>
           <td><?= "Rp  " . number_format($sum_aktivitas[0]['debit'], 2, ",", "."); ?> </td>
           </tr>
           <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>TOTAL HUTANG JARAK PENDEK</th>
           <td><?=  "Rp  " . number_format($sum_hutang[0]['kredit'], 2, ",", "."); ?> </td>
           </tr>
           <tr>
           <th></th>
           </tr>
           <th width="10%">AKTIVA TETAP(2)</th>
            <th width="15%"></th>
            <th></th>
            <th width="5%">Hutang Jangka Panjang(5)</th>
            <th width="15%"></th>
            <th></th>
            <?php
            // var_dump($aktivas);
            // die;
            $len_2 = count($aktivas_2) > count($hutang_2) ? count($aktivas_2) : count($hutang_2); 
            for($i=0;$i < $len_2; $i++){ ?>
                <tr>
                    <td>
                        <?= isset($aktivas_2[$i]) ? $aktivas_2[$i] : "" ?>
                    </td>
                    <td>
                        <?= isset($aktivas_uang_2[$i]) ?"Rp  " . number_format($aktivas_uang_2[$i][0]['debit'], 2, ",", "."): "" ?>
                    </td>
                    <td></td>
                    <td>
                        <?= isset($hutang_2[$i]) ? $hutang_2[$i] : "" ?>
                    </td>
                    <td>
                        <?= isset($hutang_uang_2[$i]) ? "Rp  " . number_format($hutang_uang_2[$i][0]['kredit'], 2, ",", "."): "" ?>
                    </td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th>TOTAL AKTIVA TETAP</th>
           <td><?= "Rp  " . number_format($sum_aktivitas_2[0]['debit'], 2, ",", "."); ?> </td>
           </tr>
           <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>TOTAL HUTANG JANGKA PANJANG</th>
           <td><?= "Rp  " . number_format($sum_hutang_2[0]['kredit'] , 2, ",", "."); ?> </td>
           </tr>
           <tr>
           <th></th>
           </tr>
           <th width="10%">AKUMULASI PENYUSUTAN LANCAR(2)</th>
            <th width="15%"></th>
            <th></th>
            <th width="5%"></th>
            <th width="15%"></th>
            <th></th>
            <?php
            // var_dump($aktivas);
            // die;
            $len_3 = count($hutang_3)> count($sum_total_hutang) ? count($hutang_3) : count($sum_total_hutang); 
            for($i=0;$i < $len_3; $i++){ ?>
                <tr>
                    <td>
                        <?= isset($hutang_3[$i]) ? $hutang_3[$i] : "" ?>
                    </td>
                    <td>
                        <?= isset($hutang_uang_3[$i]) ?  "Rp  " . number_format($hutang_uang_3[$i][0]['kredit'], 2, ",", ".") : "" ?>
                    </td>
                    <td></td>
                    <td>
                        <?= isset($sum_total_hutang[$i]) ? $sum_total_hutang[$i] : "" ?>
                    </td>
                    <td>
                    <?=  isset($uang_hutang) ?  "Rp  " . number_format($uang_hutang, 2, ",", ".") : "" ?>
                    </td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th>TOTAL AKUMULASI PENYUSUTAN</th>
           <td><?=  "Rp  " . number_format($sum_hutang_3[0]['kredit'], 2, ",", "."); ?> </td>
           </tr>
           <tr>
            <th>TOTAL AKTIVA TETAP</th>
           <td><?= "Rp  " . number_format( $count_hasil, 2, ",", "."); ?> </td>
           </tr>
           <tr>
           <th width="10%"></th>
            <th width="15%"></th>
            <th></th>
            <th width="5%"></th>
            <th width="15%"></th>
            <th></th>
            </tr>
            <tr>
                    <td>
                       
                    </td>
                    <td>
                        
                    </td>
                    <td></td>
                    <td>
                        <?= "TOTAL MODAL " ?>
                    </td>
                    <td>
                    <?= "Rp  " . number_format( $getmodal['debit'], 2, ",", ".")?>
                    </td>
                    <td></td>
                </tr>
                <th width="10%"></th>
                <th width="15%"></th>
                <th></th>
                <th width="15%"></th>
                <th width="10%"></th>
                <th></th>
                <tr>
                <th width="10%">AKTIVA TIDAK BERWUJUD (3)</th>
                <th width="15%"></th>
                <th></th>
                <th width="15%">KOMPONEN LABA RUGI</th>
                <th width="10%"></th>
                <th></th>
                </tr>
                <?php
            // var_dump($aktivas);
            // die;
            $len_4 = count($tidak_wujud)> count($laba_rugi) ? count($tidak_wujud) : count($laba_rugi); 
            for($i=0;$i < $len_4; $i++){ ?>
                <tr>
                    <td>
                        <?= isset($tidak_wujud[$i]) ? $tidak_wujud[$i]['tujuan'] : "" ?>
                    </td>
                    <td>
                        <?= isset($tidak_wujud[$i]) ?  "Rp  " . number_format($tidak_wujud[$i]['total'], 2, ",", ".") : "" ?>
                    </td>
                    <td></td>
                    <td>
                        <?= isset($laba_rugi[$i]) ? $laba_rugi[$i] : "" ?>
                    </td>
                    <td>
                    <?=  isset($uang_laba_rugi[$i]) ?  "Rp  " . number_format($uang_laba_rugi[$i], 2, ",", ".") : "" ?>
                    </td>
                    <td></td>
                </tr>
               
            <?php } ?>
            <th width="10%"></th>
                <th width="15%"></th>
                <th></th>
                <th width="15%"></th>
                <th width="10%"></th>
                <th></th>
            <tr>
            <th>AKTIVA TIDAK BERWUJUD</th>
                <th>  <?= "Rp  " . number_format( $total_tidak_wujud[0]['total'], 2, ",", ".")?></th>
                
               
                </tr>
                <tr>
                <th>AKUMULASI PENYUSUTAN (3)</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </tr>
                <?php
            // var_dump($aktivas);
            // die;
            $len_5 = count($tidak_wujud); 
            for($i=0;$i < $len_5; $i++){ ?>
                <tr>
                    <td>
                        <?= isset($tidak_wujud[$i]) ? $tidak_wujud[$i]['tujuan'] : "" ?>
                    </td>
                    <td>
                        <?= isset($tidak_wujud[$i]) ?  "Rp  " . number_format($tidak_wujud[$i]['total'], 2, ",", ".") : "" ?>
                    </td>
                    <td></td>
                    <td>
                       
                    </td>
                    <td>
                    
                    </td>
                    <td></td>
                </tr>
               
            <?php } ?>
            <tr><th>TOTAL AKUMULASI PENYUSUTAN</th>
                <th>  <?= "Rp  " . number_format( $total_akumulasi[0]['total'], 2, ",", ".")?></th>
            </tr>
                <tr>
                <th>TOTAL AKTIVA TIDAK BERWUJUD </th>
                <th>  <?= "Rp  " . number_format( $total_aktiva_tak_berwujud, 2, ",", ".")?></th>
                </tr>
                <tr>
               <th>TOTAL AKTIVA</th>
                <th>  <?= "Rp  " . number_format( $count_aktiva, 2, ",", ".")?></th>
                <th></th>
                <th>TOTAL PASSIVA</th>
                <th>  <?= "Rp  " . number_format( $count_passiva, 2, ",", ".")?></th>
                </tr>
            <tr>
            <tr>
                <th>Check </th>
                <th>  <?= "Rp  " . number_format( $check, 2, ",", ".")?></th>
                </tr>
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
                    <td><?= Html::img(["uploads/".$ttd_keuangan[0]["tanda_tangan"]], ["width"=>"150px"]); ?></td>
                    <td></td>
                    <td><?= Html::img(["uploads/bt19.png"], ["width"=>"150px"]); ?></td>
                    <td><?= Html::img(["uploads/".$ttd_direktur[0]["tanda_tangan"]], ["width"=>"150px"]); ?></td>
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
