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
$kas_masuk=['Pelunasan Tagihan','Pendapatan usaha tunai','Pendapatan lain-lain'];
$kas_keluar=['Arus kas untuk aktivitas operasi langsung','Arus kas untuk operasi tidak langsung'];

//investasi
$kas_masuk_investasi=['Penjualan Aktiva tetap Perusahaan','Penjualan Inventaris Perusahaan ','Penjualan Equipment Perusahaan'];
$kas_keluar_investasi=['Pembeliaan Aktiva tetap Perusahaan','Pembeliaan Inventaris Perusahan','Pembeliaan Equipment Perusahaan'];
$aktiva_tetap=(new \yii\db\Query())
    ->select(['sum(a.debit) as debit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['b.id'=>'1118'])
    ->all();
$inventaris_perusahaan=(new \yii\db\Query())
    ->select(['sum(a.debit) as debit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['b.id'=>'1118'])
    ->all();
$equipment_perusahaan=(new \yii\db\Query())
    ->select(['sum(a.debit) as debit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['between', 'b.id', "1106", "1110"])
    ->all();
$uang_keluar_inventaris=[$aktiva_tetap,$inventaris_perusahaan,$equipment_perusahaan];
$get_tetap=$aktiva_tetap[0]['debit'];
$get_inventaris=$inventaris_perusahaan[0]['debit'];
$get_equipment=$equipment_perusahaan[0]['debit'];
$total_arus_keluar=$get_tetap + $get_inventaris + $get_equipment;



//pendanaan
$kas_masuk_pendanaan=['Hutang Usaha','Hutang Bank','Hutang Pihak Ketiga','Hutang Pihak Khusus','Hutang Jangka Pendek'];
$kas_keluar_pendanaan=['Laba Dibagi(Hutang Sebelum RUPS)','Pencadangan kerugian laba yang sudah diakui','Pelunasan Hutang','Pengambilan oleh pemegang saham','Divestasi Saham'];
$hutang_usaha = (new \yii\db\Query())
    ->select(['sum(a.kredit) as kredit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['b.id'=>"2104"])
    ->all();
$hutang_bank = (new \yii\db\Query())
    ->select(['sum(a.kredit) as kredit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['b.id'=>"2105"])
    ->all();
$hutang_piha_ketiga = (new \yii\db\Query())
    ->select(['sum(a.kredit) as kredit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['b.id'=>"2106"])
    ->all();
$hutang_pihak_khusus = (new \yii\db\Query())
    ->select(['sum(a.kredit) as kredit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['between', 'b.id', "2107", "2109"])
    ->all();
$hutang_jangka_pendek = (new \yii\db\Query())
    ->select(['sum(a.kredit) as kredit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['between', 'b.id', "2102", "2103"])
    ->all();
$uang_masuk_pendanaan=[$hutang_usaha,$hutang_bank,$hutang_piha_ketiga,$hutang_pihak_khusus,$hutang_jangka_pendek];
$total_masuk_pendanaan=(new \yii\db\Query())
    ->select(['sum(a.kredit) as kredit'])
    ->from('transaksi_uang a')
    ->leftJoin('kelompok_rekening b', 'a.id_kelompok_rekening=b.id')
    ->Where(['between', 'b.id', "2102", "2109"])
    ->all();
$laba_dibagi="0";
$pencadangan="0";
$pelunasan="0";
$pengambilan="0";
$divestasi="0";
$array_pendanaan_keluar=[$laba_dibagi,$pencadangan,$pelunasan,$pengambilan,$divestasi];
$total_keluar_pendanaan=$laba_dibagi + $pencadangan + $pelunasan + $pengambilan + $divestasi;
$get_masuk_pendanaan=$total_masuk_pendanaan[0]['kredit'];
$total_pendanaan=$get_masuk_pendanaan - $total_keluar_pendanaan;

$total_investasi;
$total_operasi;
$kas_masuk_lain;
$uang_masuk_lain;
$total_masuk_lain;

$kas_keluar_lain;
$total_keluar_lain;
$total_lain;

$total_arus_kas=$total_lain+$total_pendanaan+$total_investasi+$total_operasi;
$total_arus_kas_periode;
$sisa_saldo=$total_arus_kas + $total_arus_kas_periode;
// var_dump($uang_masuk_pendanaan);
// die;

?>
<div class="row" style="padding: 0px 20px 0px 20px">
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
                <td colspan = 2><?= Html::img(["uploads/kop2.png"], ["width"=>"110px"]); ?></td>
                <td></td>
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
         =====================================================================
   <div class="col-md-12">
      <table class="table table table-striped table-bordered" id="tblData">
         <thead>

         <!-- Operasi -->
            <tr>
               <th width="25%"></th>
               <th width="15%"></th>
               <th colspan="2">Arus Kas dari aktivitas Operasi</th>
               <th width="15%"></th>
               <th width="15%"></th>
            </tr>
         </thead>
         <tbody>
            <!-- <th width="10%">AKTIVA LANCAR(1)</th>
            <th width="15%"></th>
            <th></th>
            <th width="5%">Hutang Jangka Panjang(4)</th>
            <th width="15%"></th>
            <th></th> -->
            <tr>
            <th colspan="2">Arus Kas Masuk</th>
            </tr>
            <th></th>
           <td></td>
            <?php
            // var_dump($aktivas);
            // die;
            // echo $kas_masuk;
            $len = count($kas_masuk); 
            // var_dump($kas_masuk[0]);
            // exit;
            for($i=0;$i < $len; $i++){ ?>
                <tr>
                <td></td>
                    <td>
                        <?= isset($kas_masuk[$i]) ? $kas_masuk[$i] : "" ?>
                    </td>
                    <td>
                        <?= "Rp 0,00" ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th></th>
            <th>TOTAL</th>
           <td><?= "Rp  "; ?> </td>
           </tr>
           <th></th>
           <tr></tr>
           <tr>
           <th>Arus Kas Keluar</th>
           </tr>
           <th></th>
           <td></td>
            <?php
            // var_dump($aktivas);
            // die;
            // echo $kas_masuk;
            $len = count($kas_keluar); 
            // var_dump($kas_masuk[0]);
            // exit;
            for($i=0;$i < $len; $i++){ ?>
                <tr>
                <td></td>
                    <td>
                        <?= isset($kas_keluar[$i]) ? $kas_keluar[$i] : "" ?>
                    </td>
                    <td>
                        <?= "Rp 0,00" ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th></th>
            <th>TOTAL</th>
           <td><?= "Rp  "; ?> </td>
           </tr>
           <th></th>
           <tr></tr>
           <tr><th></th></tr><tr><th></th></tr><tr><th></th></tr>
           <tr>
           <th></th>
           <th>Total Arus kas dari aktivitas operasi</th>
           </tr>
           <td></td>
           <td></td>
           <td><?= "Rp  ".number_format($total_operasi,2,",","."); ?> </td>

           <!-- Investasi -->
           <tr>
               <th width="25%"></th>
               <th width="15%"></th>
               <th colspan="2">Arus Kas dari aktivitas Investasi</th>
               <th width="15%"></th>
               <th width="15%"></th>
            </tr>
            <tr>
            <th>Arus Kas Masuk</th>
            </tr>
            <th></th>
           <td></td>
            <?php
            // var_dump($aktivas);
            // die;
            // echo $kas_masuk;
            $len = count($kas_masuk_investasi); 
            // var_dump($kas_masuk[0]);
            // exit;
            for($i=0;$i < $len; $i++){ ?>
                <tr>
                <td></td>
                    <td>
                        <?= isset($kas_masuk_investasi[$i]) ? $kas_masuk_investasi[$i] : "" ?>
                    </td>
                    <td>
                        <?= "Rp 0,00" ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th></th>
            <th>TOTAL</th>
           <td><?= "Rp  0,00"; ?> </td>
           </tr>
           <th></th>
           <tr></tr>
           <tr>
           <th>Arus Kas Keluar</th>
           </tr>
           <th></th>
           <td></td>
            <?php
            // var_dump($aktivas);
            // die;
            // echo $kas_masuk;
            $len = count($kas_keluar_investasi)> count($uang_keluar_inventaris) ? count($kas_keluar_investasi) : count($uang_keluar_inventaris); 
            // var_dump($kas_masuk[0]);
            // exit;
            for($i=0;$i < $len; $i++){ ?>
                <tr>
                <td></td>
                    <td>
                        <?= isset($kas_keluar_investasi[$i]) ? $kas_keluar_investasi[$i] : "" ?>
                    </td>
                    <td>
                        <?= isset($uang_keluar_inventaris[$i]) ? "Rp  " . number_format($uang_keluar_inventaris[$i][0]['debit'], 2, ",", "."):   ""  ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th></th>
            <th>TOTAL</th>
           <td><?= "Rp  " . number_format($total_arus_keluar, 2, ",", "."); ?> </td>
           </tr>
           <th></th>
           <tr></tr>
           <tr>
           <th></th>
           <th>Total Arus kas dari aktivitas Investasi</th>
           </tr>
           <td></td>
           <td></td>
           <td><?= "Rp  ".number_format($total_investasi,2,",","."); ?> </td>

           <!-- Pendanaan -->
           <tr>
               <th width="25%"></th>
               <th width="15%"></th>
               <th colspan="2">Arus Kas dari aktivitas Pendanaan</th>
               <th width="15%"></th>
               <th width="15%"></th>
            </tr>
            <tr>
            <th>Arus Kas Masuk</th>
            </tr>
            <th></th>
           <td></td>
            <?php
            // var_dump($aktivas);
            // die;
            // echo $kas_masuk;
            $len = count($kas_masuk_pendanaan)> count($uang_masuk_pendanaan) ? count($kas_masuk_pendanaan) : count($uang_masuk_pendanaan); 
            // var_dump($uang_masuk_pendanaan);
            // exit;
            for($i=0;$i < $len; $i++){ ?>
                <tr>
                <td></td>
                    <td>
                        <?= isset($kas_masuk_pendanaan[$i]) ? $kas_masuk_pendanaan[$i] : "" ?>
                    </td>
                    <td>
                    <?= isset($uang_masuk_pendanaan[$i]) ? "Rp  " . number_format($uang_masuk_pendanaan[$i][0]['kredit'], 2, ",", "."):   "" ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th></th>
            <th>TOTAL</th>
           <td><?= "Rp  " . number_format($total_masuk_pendanaan[0]['kredit'], 2, ",", "."); ?> </td>
           </tr>
           <th></th>
           <tr></tr>
           <tr>
           <th>Arus Kas Keluar</th>
           </tr>
           <th></th>
           <td></td>
            <?php
            // var_dump($aktivas);
            // die;
            // echo $kas_masuk;
            $len = count($kas_keluar_pendanaan); 
            // var_dump($kas_masuk[0]);
            // exit;
            for($i=0;$i < $len; $i++){ ?>
                <tr>
                <td></td>
                    <td>
                        <?= isset($kas_keluar_pendanaan[$i]) ? $kas_keluar_pendanaan[$i] : "" ?>
                    </td>
                    <td>
                        <?= "Rp 0,00" ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th></th>
            <th>TOTAL</th>
           <td><?= "Rp  " . number_format($total_keluar_pendanaan, 2, ",", "."); ?> </td>
           </tr>
           <th></th>
           <tr></tr>
           <tr>
           <th></th>
           <th>Total Arus kas dari aktivitas Pendanaan</th>
           </tr>
           <td></td>
           <td></td>
           <td><?= "Rp  (" . number_format($total_pendanaan, 2, ",", ".").")"; ?> </td>

            <!-- Arus Kas Lain-lain -->
            <tr>
               <th width="25%"></th>
               <th width="15%"></th>
               <th colspan="2">Arus Kas dari aktivitas lain lain</th>
               <th width="15%"></th>
               <th width="15%"></th>
            </tr>
            <tr>
            <th>Arus Kas Masuk</th>
            </tr>
            <th></th>
           <td></td>
            <?php
            // var_dump($aktivas);
            // die;
            // echo $kas_masuk;
            // $len_lain = count($kas_masuk_lain)> count($uang_masuk_lain) ? count($kas_masuk_lain) : count($uang_masuk_lain); 
           $len_lain;
            // var_dump($uang_masuk_lain);
            // exit;
            for($i=0;$i < $len_lain; $i++){ ?>
                <tr>
                <td></td>
                    <td>
                        <?= isset($kas_masuk_lain[$i]) ? $kas_masuk_lain[$i] : "" ?>
                    </td>
                    <td>
                    <?= isset($uang_masuk_lain[$i]) ? "Rp  " . number_format($uang_masuk_lain[$i][0]['kredit'], 2, ",", "."):   "" ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th></th>
            <th>TOTAL</th>
           <td><?= "Rp  " . number_format($total_masuk_lain[0]['kredit'], 2, ",", "."); ?> </td>
           </tr>
           <th></th>
           <tr></tr>
           <tr>
           <th>Arus Kas Keluar</th>
           </tr>
           <th></th>
           <td></td>
            <?php
            // var_dump($aktivas);
            // die;
            // echo $kas_masuk;
            // $len_keluar = count($kas_keluar_lain); 
           $len_keluar;
            // var_dump($kas_masuk[0]);
            // exit;
            for($i=0;$i < $len_keluar; $i++){ ?>
                <tr>
                <td></td>
                    <td>
                        <?= isset($kas_keluar_lain[$i]) ? $kas_keluar_lain[$i] : "" ?>
                    </td>
                    <td>
                        <?= "Rp 0,00" ?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
            <tr>
            <th></th>
            <th>TOTAL</th>
           <td><?= "Rp  " . number_format($total_keluar_lain, 2, ",", "."); ?> </td>
           </tr>
           <th></th>
           <tr></tr>
           <tr>
           <th></th>
           <th>Total Arus kas dari aktivitas lain-lain</th>
           </tr>
           <td></td>
           <td></td>
           <td><?= "Rp  (" . number_format($total_lain, 2, ",", ".").")"; ?> </td>
           <tr>
           <th>Arus Kas Total </th>
           <td><?= "Rp  (" . number_format($total_lain, 2, ",", ".").")"; ?> </td>
           </tr>
           <tr></tr>
           <tr>
        <th>Saldo Kas Periode Lalu</th>
        <td><?= "Rp  (" . number_format($total_arus_kas_periode, 2, ",", ".").")"; ?> </td>
        </tr>
        <tr></tr>
       <th>Sisa Saldo Tersisa</th>
       <td><?= "Rp  (" . number_format($sisa_saldo, 2, ",", ".").")"; ?> </td>
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
