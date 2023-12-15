<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    
<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <span class="close" data-dismiss="modal">×</span>
        <h3>Modal header</h3>
    </div>
    <div class="modal-body">
        <p>One fine body…</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn">Close</a>
        <a href="#" class="btn btn-primary">Save changes</a>
    </div>
</div> -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    //your code here
    $(window).on('load', function() {
      $('#myModal').modal('show');
    });
  });
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mulaiwakaf">Pembayaran Wakaf</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="pembayaran" role="tabpanel" aria-labelledby="pembayaran-tab">
            <div class="row">
              <div class="col-6">
                <img class="border-r10 shadow-br3" src="" width="150px" height="150px">
              </div>
              <div class="col-6">
                <p class="font-size-08">Anda akan berwakaf untuk project :</p>
                <p class="font-weight-bold">
                  tes
                </p>
              </div>
              <div class="col-12 pt-3">
                <h3 style="color: #404040;">Nominal Wakaf</h3>
                <p class="font-size-08">Beban Biaya Setiap Transaksi :</p>
                <table style="width: 100%;">
                  <tbody>
                    <tr>
                      <td style="width: 50%;">
                        <p class="font-size-08">Bank Transfer : <?php $hrg = 4000;
                                                                echo \app\components\Angka::toReadableHarga($hrg, false) ?></p>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <p class="font-size-08">Anda akan berwakaf dengan nominal sebesar :</p>
                <div class="row">

                  <div class="col-12 mt-2">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend mr-2" style="height:calc(1.5em + .75rem + 2px);">
                        <div class="input-group-text bg-white border-r5 font-weight-bold" style="color: #afafaf;border-color: #787878;">Rp</div>
                      </div>
                      <input type="number" class="form-control select-wakaf" id="nominal" name="nominal" style="border-color: #787878;" placeholder="Wakaf Tidak Boleh 0" required>
                      <button id="clear" class="btn btn-danger btn-sm" type="button" style="height: calc(1.5em + 0.75rem + 2px);
                          line-height: 34px;
                          width: 60px;background-color:firebrick;color:white;border-radius:0px;">
                        X</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-batal" style="background-color:firebrick;color:white" data-dismiss="modal">Batal</button>
              <button type="button" class="btn btn-sm btn-program" style="padding: 10px !important;background-color:green" id="bayarkan_modal">Bayar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>