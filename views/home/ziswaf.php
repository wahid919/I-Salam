<hr class="mt-0">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="header-panel-wrap">
                <ul class="nav nav-tabs pb-0 border-d-program" id="isalam" role="tablist">
                    <li class="nav-item text-center">
                        <a class="nav-link font-weight-bold active" id="Wakaf-tab" data-toggle="tab" href="#wakaf" role="tab" aria-controls="infak" aria-selected="true"><i class="fas fa-hand-holding-usd"></i> Wakaf</a>
                    </li>
                    <li class="nav-item text-center">
                        <a class="nav-link font-weight-bold" id="wakaf-tab" data-toggle="tab" href="#infak" role="tab" aria-controls="infak" aria-selected="false"><i class="fas fa-money-bill-alt"></i> Infak</a>
                    </li>
                </ul>
                <div class="tab-content pt-4" id="myTabContent">
                    <div class="tab-pane fade show active" id="wakaf" role="tabpanel" aria-labelledby="wakaf-tab">
                        <img src="<?= \Yii::$app->request->BaseUrl ?>/uploads/Group77.png" class="pt-0">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="text-left">
                                    <h3 class="text-isalam-1">Ayo Mulai Berwakaf</h3>
                                    <p class="font-weight-bold font-size-08">Silahkan Isi Jumlah Wakafmu Insyallah Berkah </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-category">
                                <label class="font-weight-600 font-size-1" for="wakaf">Pilih Program Wakaf</label>
                                <select class="form-control select-category ml-auto" id="select-category" style="overflow: scroll;" onchange="myFunction(event)">
                                <option class="font-weight-bold" disabled selected>Silahkan Pilih Program</option>
                                    <?php


foreach($pendanaans as $pendanaan){ ?>
                                        <option class="font-weight-bold" value="<?= $pendanaan->id ?>"><?= $pendanaan->nama_pendanaan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 pt-2">
                                <div class="form-group">
                                    <label for="">Isi Nominal Wakaf Anda</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend mr-2" style="height:calc(1.5em + .75rem + 2px);">
                                            <div class="input-group-text bg-white border-r5 font-weight-bold" style="color: #afafaf;">Rp</div>
                                        </div>
                                        <input type="hidden" class="form-control select-wakaf border-r5 mr-1" id="pendanaan_wakaf" name="pendanaan_wakaf" placeholder="Minimal Wakaf Rp. 10.000">
                                        <input type="number" class="form-control select-wakaf border-r5 mr-1" id="nominal" name="nominal" placeholder="Minimal Wakaf Rp. 10.000">
                                        <button type="submit" class="btn-sm text-white btn-program font-weight-bold" id="bayarkan">Wakaf Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="infak" role="tabpanel" aria-labelledby="infak-tab">
                    <img src="<?= \Yii::$app->request->BaseUrl ?>/uploads/Group77.png" class="pt-0">
                        <div class="row pt-4">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="text-left">
                                    <h3 class="text-isalam-1">Ayo Mulai Berinfak</h3>
                                    <p class="font-weight-bold font-size-08">Silahkan Isi Jumlah infakmu Insyallah Berkah </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-category">
                                <label class="font-weight-600 font-size-1" for="infak">Pilih Program Infak</label>
                                <select class="form-control select-category ml-auto" id="select-category" style="overflow: scroll;" onchange="myFunction2(event)">
                                <option class="font-weight-bold" disabled selected>Silahkan Pilih Program</option>
                                <?php foreach($pendanaans as $pendanaan){ ?>
                                    <option class="font-weight-bold" value="<?= $pendanaan->id ?>"><?= $pendanaan->nama_pendanaan ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="col-12 pt-2">
                                <div class="form-group">
                                    <label for="">Isi Nominal infak Anda</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend mr-2" style="height:calc(1.5em + .75rem + 2px);">
                                            <div class="input-group-text bg-white border-r5 font-weight-bold" style="color: #afafaf;">Rp</div>
                                        </div>

                                        <input type="hidden" class="form-control select-wakaf border-r5 mr-1" id="pendanaan_infak" name="pendanaan_infak" placeholder="Minimal Wakaf Rp. 10.000">
                                        <input type="number" class="form-control select-wakaf border-r5 mr-1" id="nominal2" name="nominal2" placeholder="Minimal infak Rp. 10.000">
                                        <button type="submit" class="btn-sm text-white btn-program font-weight-bold" id="bayarkan2" style="background-color: #f1a502;height:calc(1.5em + .75rem + 2px);">Wakaf Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div>
<script>
    function myFunction(e) {
    document.getElementById("pendanaan_wakaf").value = e.target.value
}
function myFunction2(e) {
    document.getElementById("pendanaan_infak").value = e.target.value
}
    var duit = document.getElementById("nominal");
      duit.addEventListener('keyup', function(e) {
        // console.log(this.value);
        duit.setAttribute("value", this.value);
      });

      var duit2 = document.getElementById("nominal2");
      duit2.addEventListener('keyup', function(e) {
        // console.log(this.value);
        duit2.setAttribute("value", this.value);
      });

      document.querySelector("#bayarkan").addEventListener("click", () => {
          let dana = document.querySelector("#pendanaan_wakaf").getAttribute("value");
          if(dana == null){
              alert("Anda Belum Memilih Program Wakaf");
          }else{
              let nominal = document.querySelector("#nominal").getAttribute("value");
              if(nominal == null){
                  alert("Anda Belum Mengisi Nominal Pendanaan");
              }else{

                let ket="wakaf";
                  var base_url = window.origin+"/isalam/web/home/pembayarans/"+dana+"?nominal="+nominal+"&keterangan="+ket;
                //   console.log(base_url);
                window.location.href = base_url;
              }
          }
          
      });
      document.querySelector("#bayarkan2").addEventListener("click", () => {
          let dana2 = document.querySelector("#pendanaan_infak").getAttribute("value");
          if(dana2 == null){

            alert("Anda Belum Memilih Program Infak");
          }else{
              let nominal2 = document.querySelector("#nominal2").getAttribute("value");
              if(nominal2 == null){

                alert("Anda Belum Mengisi Nominal Infak");
              }else{
                  let ket2="infak";
                  var base_url2 = window.origin+"/isalam/web/home/pembayarans/"+dana2+"?nominal="+nominal2+"&keterangan="+ket2;
                //   console.log(base_url);
                window.location.href = base_url2;
              }
          }
      });
</script>