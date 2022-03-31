<?php

use app\components\Angka;
use app\components\Tanggal;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
use app\models\Invoice;
use app\models\Pengajuan;
/* @var $this yii\web\View */
/* @var $model common\models\Absensi */


$filename = "Download LaporanPendanaan" . $tgl1."-". $tgl2;
$this->title = $filename;
$this->params['breadcrumbs'][] = ['label' => 'Download', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="absensi-view">
         <h3 style="text-align:center">Laporan Pendanaan</h3>
         <table style="border-collapse: collapse; width: 100%;" border="1">
<tbody>
<tr>
<td style="width: 14.2857%; text-align: center;">No</td>
<td style="width: 14.2857%; text-align: center;">Nama Pendanaan</td>
<td style="width: 14.2857%; text-align: center;">Nominal</td>
<td style="width: 14.2857%; text-align: center;">Jumlah Terkumpul</td>
<td style="width: 14.2857%; text-align: center;">Tanggal Buat</td>
<td style="width: 14.2857%; text-align: center;">Tanggal Selesai</td>
<td style="width: 14.2857%; text-align: center;">Status</td>
</tr>
<?php 
$count =1;
        foreach ($mdl as $m) { 
                
         $bayar = \app\models\Pembayaran::find()
         ->where(['pendanaan_id'=>$m['id_pendanaan']])->andWhere(['status_id'=>6])->sum('nominal');?>
<tr>
<td style="width: 14.2857%;"><?= $count?></td>
<td style="width: 14.2857%;"><?= $m['nm_pendanaan'] ?></td>
<td style="width: 14.2857%;"><?= 'Rp '.Angka::toReadableAngka($m['nominal'],FALSE) ?></td>
<td style="width: 14.2857%;"><?= 'Rp '.Angka::toReadableAngka($bayar,FALSE) ?></td>
<td style="width: 14.2857%;"><?= Tanggal::toReadableDate($m['tgl_buat'],FALSE) ?></td>
<td style="width: 14.2857%;"><?= Tanggal::toReadableDate($m['tgl_berakhir'],FALSE) ?></td>
<td style="width: 14.2857%;"><?= $m['status_name'] ?></td>
</tr>
<?php
$count++;
} ?>
</tbody>
</table>
</div>