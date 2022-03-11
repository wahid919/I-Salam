<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $model common\models\Absensi */

// var_dump($model->user);die;
?>
<div class="absensi-view">
         <br>
         <br>
         <br>
         <h3 style="solid black; text-align:center"><b>IKRAR WAKAF</b> <br>
         <!-- <p style="font-size: 17px;">Bismillahirrahmanirrahim</p> -->
         <?= Html::img(\Yii::$app->request->BaseUrl . '/uploads/bismillah.png', ['width' => 300]); ?>
        
        </h3>
         <table>
         <thead>
         <tr>
         <th style=" solid black;text-align: center;">Yang Bertanda Tangan Dibawah ini : <br/>
         Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         : <?=$model->nama ?></th>
        <!-- <td style=" solid black;text-align: center;">: </td> -->
        </tr>
        <tr>
         <th style=" solid black;text-align: center;">Nomor Telepon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;: <?= $model->user->nomor_handphone ?> </th>
         <!-- <td style=" solid black;text-align: center;">: </td> -->
        </tr>
        <tr>
         <th style=" solid black;text-align: center;">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?= $model->user->username ?></th>
         <!-- <td style=" solid black;text-align: center;">: </td> -->
        </tr>
         <br>
        
         </thead>
         <tbody>
         <tr>
             <br>
             <td><br><br> Dengan ini saya berniat memberikan uang
             sebesar <?= \app\components\Angka::toReadableHarga($model->nominal); ?> (<?= \app\components\Angka::toTerbilang($model->nominal) ?>)   untuk mengikuti wakaf <?= $model->pendanaan->nama_pendanaan?> <br><br><br>
             Demikian Ikrar wakaf ini saya buat, semoga Allah SWT menerima amal saya,Aamiin.
            </td>
         </tr>
         <tr>
             <td></td>
         </tr>
         </tbody>
         </table>
         <br>
   
<!-- <div class="page-break"></div> -->
<table>
         <thead>
            <tr>
               <th width="15%"></th>
               <th width="25%" style="padding-left: 50px;
                 padding-bottom: 3px;">
                <strong style="font-size: 13px;">Mengetahui</strong><br><br><br>
                </th>
               <th></th>
               <th width="15%"></th>
               <th width="25%" style="
                 padding-bottom: 3px; ">
                <strong style="font-size: 13px;">Yang Menyatakan Wakaf</strong><br><br><br> <p style="font-size: 10px;margin-top:50px">Materai 6000</p>
                </th>
               <th></th>
            </tr>
            <tr class>
                    <td></td>
                    <td style="text-align: center;"><br>
                    <strong style="font-size: 13px;">(...................................) </strong>
                    </td>
                    <td></td>
                    <td></td>
                    <td style="text-align: center;">
                  <br>
                    <strong style="font-size: 13px;"> <br>(  <?= $model->nama ?>  ) </strong>
                    </td>
                    <td></td>
                </tr>
                <!-- <tr>
                    <td></td>
                    <td style="padding-left: 15px; padding-bottom: 3px; position: absolute;text-align: center;">
                    </td>
                    <td></td>
                    <td></td>
                    <td style="padding-left: 5px; padding-bottom: 3px; position: absolute; padding-top:-50px;text-align: center;">
                    </td>
                    <td></td>
                </tr> -->
                <br>
                <h1></h1>
                <tr>
               <th width="15%"></th>
               <th width="25%" style="padding-left: 50px;
                 padding-bottom: 3px;">
                <strong style="font-size: 13px;">Mengetahui</strong><br><br><br>
                </th>
               <th></th>
               <th width="15%"></th>
               <th width="25%" style="padding-left: 50px;
                 padding-bottom: 3px; ">
                <strong style="font-size: 13px;">Mengetahui</strong><br><br><br>
                </th>
               <th></th>
            </tr>
            <tr class>
                    <td></td>
                    <td style="text-align: center;">
                    <br>
                    <strong style="font-size: 13px;"><br> (...................................) </strong>
                    </td>
                    <td></td>
                    <td></td>
                    <td style="text-align: center;"><br>
                    <strong style="font-size: 13px;"> <br>(...................................) </strong>
                    </td>
                    <td></td>
                </tr>
         </thead>
         <tbody>
         </tbody>
         </table>
         <br>
         <div style="text-align: center;">
             <?= Html::img(["uploads/qrcode.png"], ["width"=>"125"]); ?>

         </div>
                             </div>
                </div>
            </div>
        </div>
    </div>

</div>