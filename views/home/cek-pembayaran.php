<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script> -->
<script src="<?= \Yii::$app->request->baseUrl . "/js/jquery-1-7-1.min.js"?>" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    //your code here
    $(window).on('load', function() {
      $('#myModal').modal('show');
    });
    $('#myModal').on('hidden.bs.modal', function (e) {
      window.location.href = `<?= \yii\helpers\Url::to(['index']) ?>`;
});
  });
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mulaiwakaf" style="color:white;">Pembayaran Wakaf</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="pembayaran" role="tabpanel" aria-labelledby="pembayaran-tab">
            <div class="row">
              <div class="col-5">
                <img class="border-r10 shadow-br3" src="<?= \Yii::$app->request->baseUrl . "/uploads/" . $pendanaan->poster ?>" width="150px" height="150px">
              </div>
              <div class="col-7">
                <p class="font-size-08"><strong>Anda akan berwakaf untuk program :</strong></p>
                <p class="font-weight-bold" style="color: #404040;">
                  <?= $pendanaan->nama_pendanaan; ?>
                </p>
                <p style="font-size: 80%;">
                  <strong><?= $pendanaan->getShowDescription() ?></strong>
                </p>
              </div>
              <div class="col-12 pt-3">
                <h3 style="color: #404040;">Nominal Wakaf</h3>
                  <p class="font-size-08"><strong>Beban Biaya Setiap Transaksi : </strong></p>
                  <table style="width: 100%;">
                    <tbody>
                      <tr>
                        <td style="width: 50%;">
                          <p class="font-size-08"><strong> Bank Transfer : <?php $hrg = 4000;
                                                                echo \app\components\Angka::toReadableHarga($hrg, false) ?></strong></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <?php
                    
                    if($pendanaan->kategori_pendanaan_id == 5){
                    ?>
                    <p class="font-size-08">Amanah Wakaf :</p>
                    <div class="row">
                      <?php $i=0; foreach($amanah_pendanaan as $value){ ?>
                    <div class="col-6">
                        <input type="radio" id="amanah_header" name="amanah_header" value="<?= $value->amanah ?>" <?= $i==0 ? "checked" : "" ?>>
                        <label for="amanah_header"><?= $value->amanah ?></label><br>
                      </div>
                      <?php $i++;} ?>
                    </div>
                    <?php }else{ ?>
                      <input type="hidden" id="amanah_header" name="amanah_header" value="undefined">
                    <?php } ?>
                <p class="font-size-08"><strong>Anda akan berwakaf dengan nominal sebesar :</strong></p>
                <div class="row">

                  <div class="col-12 mt-2">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend mr-2" style="height:calc(1.5em + .75rem + 2px);">
                        <div class="input-group-text bg-white border-r5 font-weight-bold" style="color: #afafaf;border-color: #787878;">Rp</div>
                      </div>
                      <input type="number" class="form-control select-wakaf" id="nominal_header" name="nominal_header" value="<?= $nominal_wakaf ?>" onkeyup="myFunction_header()" onkeydown="myFunction_header()" style="border-color: #787878;border-radius:5px;margin-right:1%;" placeholder="Minimal Wakaf Rp. 10.000" required>
                      <button id="clear_header" class="btn btn-sm" type="button" style="height: calc(1.5em + 0.75rem + 4px);
                          line-height: 34px;
                          width: 60px;background-color:#f1a401;color:white;border-radius:5px;">
                        X</button>
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="nama_header">Nama</label>
                    <input type="text" class="form-control select-wakaf" name="nama_header" id="nama_header" style="border-color: #787878;" onkeyup="myFunctionname_header()" onkeydown="myFunctionname_header()" required>
                  </div>
                  <div class="col-6">
                    <label for="email_header">Email</label>
                    <input type="email" class="form-control select-wakaf" name="email_header" id="email_header" style="border-color: #787878;" onkeyup="myFunctionemail_header()" onkeydown="myFunctionemail_header()" required>
                  </div>
                  <div class="col-12" style="margin-bottom: 5px;margin-top:5px;">
                    <label for="phone_header">Nomor Telepon</label>
                    <input type="number" class="form-control select-wakaf" name="phone_header" id="phone_header" style="border-color: #787878;" onkeyup="myFunctionphone_header()" onkeydown="myFunctionphone_header()" required>
                  </div>
                </div>
              </div>
            </div>
            <script>
              function myFunction_header() {
                let x = document.getElementById("nominal_header");
                x.value = x.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
              }

              function myFunctionname_header() {
                let x = document.getElementById("nama_header");
                x.addEventListener('keyup', function(e) {
                  // console.log(this.value);
                  x.setAttribute("value", this.value);
                });
                // x.value = x.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
              }

              function myFunctionemail_header() {
                let x = document.getElementById("email_header");
                x.addEventListener('keyup', function(e) {
                  // console.log(this.value);
                  x.setAttribute("value", this.value);
                });
              }

              function myFunctionphone_header() {
                let x = document.getElementById("phone_header");
                x.addEventListener('keyup', function(e) {
                  // console.log(this.value);
                  x.setAttribute("value", this.value);
                });
                x.value = x.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');

              }
              let hasils_header = document.querySelector('#nominal_header');
              hasils_header.addEventListener('keyup', function(e) {
                // console.log(this.value);
                hasils_header.setAttribute("value", this.value);
              });
              window.addEventListener('load', () => {
                const button = document.querySelector('#clear_header');
                button.addEventListener('click', () => {

                  hasils_header.setAttribute("value", 0);
                  hasils_header.value = "";
                });
              });
            </script>
            <div class="modal-footer">
              <a href="<?= \Yii::$app->request->BaseUrl . "/home" ?>" class="btn btn-sm btn-batal" style="background-color:#dc3545;color:white">Batal</a>
              <button type="button" class="btn btn-sm btn-program" style="padding: 10px !important;background-color:#f1a401" id="bayarkan_header">Bayar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
      
      let pendanaans = "<?php echo $pendanaan->id; ?>";
      document.querySelector("#bayarkan_header").addEventListener("click", () => {
        let nominal = document.querySelector("#nominal_header").getAttribute("value");
        let nama = document.querySelector("#nama_header").getAttribute("value");
        let email = document.querySelector("#email_header").getAttribute("value");
        let phone = document.querySelector("#phone_header").getAttribute("value");
        // let ele = document.querySelector("#amanah").getAttribute("value");
        let ele = document.getElementsByName("amanah_header");
        let amanah_pendanaan;
        for(i = 0; i < ele.length; i++) {
                  
                  if(ele[i].type="radio") {
                    
                      if(ele[i].checked)
                      amanah_pendanaan = ele[i].value;
                  }
              }
        if (nominal == null || nominal == "0" || nominal == 0) {
          alert("Anda Belum Mengisi Nominal Wakaf");
        }else if(nominal < 0 ){
          alert("Silahkan Isi Nominal Dengan Benar");
        }else if(nama == null){
          alert("Anda Belum Mengisi Nama Pewakaf");
        }else if(email == null){
          alert("Anda Belum Mengisi Email Pewakaf");
        }else if(phone == null){
          alert("Anda Belum Mengisi Nomor Telephone Pewakaf");
        }else {
          if(pendanaans == null){
          alert("Pendanaan Tidak Diketahui");
          }else{
            if(nominal <10000){
              alert("Minimal Rp 10.000");

            }else{
              window.location.href = `<?= \yii\helpers\Url::to(['/home/pembayaran-header', 'id' => $pendanaan->id]) ?>?nominal=${nominal}&amanah_pendanaan=${amanah_pendanaan}&nama=${nama}&email=${email}&phone=${phone}&ket=nominal`;
            }
          }
        }
      });

    </script>