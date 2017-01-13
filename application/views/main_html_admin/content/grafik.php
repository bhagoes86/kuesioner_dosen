
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Kuesioner Dosen</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <h3>Grafik Kuesioner</h3>
        <div class="form-group">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <select class="select2_single form-control" tabindex="-1" name="dosen" id="dosen">
              <option></option>
              <?php foreach ($dataMatkul->result_array() as $rowMatkul) { ?>
                <option value="<?=$rowMatkul['kd_matkul']?>"><?=$rowMatkul['matkul']?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
          <div class="col-md-12 col-sm-12 col-xs-12" id="contentGrafik">
          </div>
        </div>
    </div>
  </div>
</div>
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
    <script>
      function showDialogDetail(kode_dosen, tahun_ajaran){
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/detail_tahun_ajar')?>/'+kode_dosen+'/'+tahun_ajaran,
            data: $('form').serialize(),
            success: function (i) {
              document.getElementById("contentDetail").innerHTML = i;
            }
          });
      }

      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a Mata Kuliah",
          allowClear: true
        });
        $(".select2_single").on("change", function(e){
            e.preventDefault();
            // alert($(".select2_single").val())get_tahun_ajaran
            var valueHref = '<?=base_url('admin/index/get_tahun_ajaran')?>'+'/'+$(".select2_single").val();
            $.ajax({
              type: 'post',
              url: valueHref,
              data: $('#formupdatebiaya').serialize(),
              success: function (i) {
                // $("#contentTahunAjar").innerHTML = i;
                // document.getElementById()
                document.getElementById("contentTahunAjar").innerHTML = i;
              }
            });
        });
      });
    </script>

    <script type="text/javascript">
      function vote(kd_tt_matkul, kd_mahasiswa_kelas, nilai, kd_pertanyaan, r){
        var iRow = r.parentNode.parentNode.rowIndex;
        var valueHref = '<?=base_url('mahasiswa/index/giveRating/')?>'+'/'+kd_tt_matkul+'/'+kd_mahasiswa_kelas+'/'+nilai+'/'+kd_pertanyaan;
        $.ajax({
            type: 'post',
            url: valueHref,
            data: $('#formupdatebiaya').serialize(),
            success: function (i) {
              // alert(i);
              if(i == 'true'){
                new PNotify({
                                    title: 'Vote',
                                    text: 'Voting Success',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                document.getElementById("datatable").deleteRow(iRow);
              }else{
                new PNotify({
                                  title: 'Vote',
                                  text: "Please Try Again",
                                  type: 'error',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });
              }
            }
          });
      }
      function kritikSaran(mode, kd_tt_matkul, r){
        var iRow = r.parentNode.parentNode.rowIndex;
        var isi = null;
        switch(mode){
          case 'dosenFav' :
            isi = document.getElementById("dosenFav").value;
          break;
          case 'KritikSaranDosen' :
            isi = document.getElementById("kritikSaranDosen").value
          break;
          case 'KritikSaranOffice' :
            isi = document.getElementById("kritikSaranOffice").value;
          break;
          default :
            isi = "Tidak Ada ISI";
          break;
        }
        var valueHref = '<?=base_url('mahasiswa/index/kritikSaran/')?>'+'/'+mode+'/'+kd_tt_matkul+'/'+isi;
        $.ajax({
            type: 'post',
            url: valueHref,
            data: $('#formupdatebiaya').serialize(),
            success: function (i) {
              // alert(i);
              if(i == 'true'){
                new PNotify({
                                    title: 'Vote',
                                    text: 'Voting Success',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                document.getElementById("datatable").deleteRow(iRow);
              }else{
                new PNotify({
                                  title: 'Vote',
                                  text: "Please Try Again",
                                  type: 'error',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });
              }
            }
          });
      }
    </script>