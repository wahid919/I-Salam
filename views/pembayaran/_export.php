<div class="box-body">

<div class="row">
    <div class="col-md-12">
        <label><strong>Pilih Tanggal Awal :</strong></label>
    </div>
    <div class="col-md-12">
        <input id="tanggal1" type="text" class="datepicker form-control"
               value="<?php

use yii\web\View;

echo date("Y-m-d"); ?>" style="text-align: center">
    </div>
</div>
<br/>
<div class="row">
    <div class="col-md-12">
        <label><strong>Pilih Tanggal Akhir :</strong></label>
    </div>
    <div class="col-md-12">
        <input id="tanggal2" type="text" class="datepicker form-control"
               value="<?php echo date("Y-m-d"); ?>" style="text-align: center">
    </div>
</div>
<br/>
<hr />

<div class="row">
    <div class="clearfix"></div>
    <div class="col-md-12">
        <a class="btn btn-success btn-block" id="cetak" target="_blank" >Export Excel</a>
        <a class="btn btn-danger btn-block" id="cetak_pdf" target="_blank" >Export PDF</a>
    </div>
</div>
</div>

<?php
$my_js = '
$(document).ready(function(){
$(".datepicker").datepicker({
format: "yyyy-mm-dd"
});
 $("#spinner").hide();
});
            $("#cetak").click(function() {
                var url = "'.Yii::$app->homeUrl.'pembayaran/export?"
                    + "t1=" + $("#tanggal1").val()
                    + "&t2=" + $("#tanggal2").val();

                window.open(url, "_blank","height=200,width=150");
            });
            $("#cetak_pdf").click(function() {
                var url = "'.Yii::$app->homeUrl.'pembayaran/export-pdf?"
                    + "t1=" + $("#tanggal1").val()
                    + "&t2=" + $("#tanggal2").val();

                window.open(url, "_blank","height=400,width=300");
            });
   ';
$this->registerJs($my_js, View::POS_END);
?>