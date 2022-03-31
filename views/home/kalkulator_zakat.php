<style>
  .hasil{
    position: relative;
    background-color: #ffa500;
    width: 18rem;
    height: auto;
    border-radius: 1rem;
  }
  .pe{
    text-align: center;
    color: white;
    padding: 1rem 1rem;
    position: relative;
    top: 15%;
  }
</style>
<hr class="mt-0">
<section id="services" class="services pb-90" style="padding-top: 10px;">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="text-left">
          <h2 style="color: #ffa500;">Kalkulator Zakat</h>
        </div>
      </div>
    </div>
        <div class="row">
                  
                  <div class="col-12 pt-3">
                    
                    <div class="row">
                      <div class="col-6">
                        <div class="col-12 mt-2">
                          <div class="input-group mb-2">
                            <div class="input-group-prepend mr-2" style="height:calc(1.5em + .75rem + 2px);">
                              <div class="input-group-text bg-white border-r5 font-weight-bold" style="color: #afafaf;border-color: #787878;">Rp </div>
                            </div>
                            <input type="number" class="form-control select-wakaf" id="nominal3" name="nominal3" style="border-color: #787878;" placeholder="Masukkan Uang Anda" required>
                            <!-- <button id="clear3" class="btn btn-danger btn-sm" type="button" style="height: calc(1.5em + 0.75rem + 2px);
                            line-height: 34px;
                            width: 60px;background-color:firebrick;color:white;border-radius:0px;">
                            X</button> -->
                          </div>
                        </div>
                        
                    <div class="col-12">
                      <button type="submit" class="btn-sm btn-block text-white font-weight-bold" style="height: 3rem;background-color: #ffa500;" id="bayarkan3">Hitung</button>
                    </div>

                      </div>
                      <div class="col-6 hasil">
                          <div class="pe">
                            <h5 style="color: white;">Jumlah Zakat</h5>
                            <h4 id ="nilai" style="color:white">Rp 0</h4>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
    <hr>
    <div class='d-flex justify-content-center'>
      

  </div><!-- /.container -->
</section><!-- /.Services -->
<script>
                  let hasils2 =document.querySelector('#nominal3');
    window.addEventListener('load', () => {
        const button = document.querySelector('#clear3');
        button.addEventListener('click', () => {
          
        hasils2.setAttribute("value", 0);
            hasils2.value = "";
        });
    }); 

    document.querySelector("#bayarkan3").addEventListener("click", () => {
        let nominal = document.getElementById('nominal3').value;
        // let ele = document.querySelector("#amanah").getAttribute("value");
        let tarif = 2.5;
        let hasil = parseInt(nominal*tarif/100);
        let nilai_akhir = formatRupiah(hasil,'Rp .');
        // alert(hasil);
        // alert(formatRupiah(hasil,'Rp .'))
        // document.getElementById("nilai").value = tarif;
        document.getElementById('nilai').innerHTML=nilai_akhir;
        
        
        
      });
      function formatRupiah(angka, prefix){
      let number_string = angka.toString(),
      sisa     	= number_string.length % 3,
      rupiah     		= number_string.substr(0, sisa),
      ribuan     		= number_string.substr(sisa).match(/\d{3}/gi);
    
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
    
      // rupiah = number_string != undefined ? rupiah + ',' + number_string : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
   </script>