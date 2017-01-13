<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Kuesioner Dosen</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <h3>Nama Dosen : <?=$dataKelas->row()->nama_dosen?></h3>

        <ul class="list-unstyled user_data">
          <li><i class="fa fa-date"></i>Tahun Ajaran : <?=$dataKelas->row()->tahun_ajaran?>
          </li>
          <li>
            <i class="fa fa-content"></i>Mata Kuliah : <?=$dataKelas->row()->matkul?>
          </li>
        </ul>
        <br />

      </div>
      <table id="datatablex" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Kriteria Penilaian</th>
            <th>Nilai</th>
          </tr>
        </thead>
        <tbody>
          <?php if($availPertanyaan->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($availPertanyaan->result_array() as $row) { ?>
                  <?php if(modules::run('mahasiswa/index/checkPertanyaan', $dataKelas->row()->kd_tt_matkul, $row['kd_pertanyaan']) == "false"){ ?>
                    <tr>
                      <td><?=$nomor?></td>
                      <td><?=$row['pertanyaan']?></td>
                      <td>
                        <a class="btn btn-default btn-danger rate" id="buruk" onclick="vote('<?=$dataKelas->row()->kd_tt_matkul?>', '<?=$this->session->userdata("kd_mahasiswa")?>', '1', '<?=$row['kd_pertanyaan']?>', this)">1</a>
                        <a class="btn btn-default btn-warning rate" id="lumayan" onclick="vote('<?=$dataKelas->row()->kd_tt_matkul?>', '<?=$this->session->userdata("kd_mahasiswa")?>', '2', '<?=$row['kd_pertanyaan']?>', this)">2</a>
                        <a class="btn btn-default rate" id="baik" onclick="vote('<?=$dataKelas->row()->kd_tt_matkul?>', '<?=$this->session->userdata("kd_mahasiswa")?>', '3', '<?=$row['kd_pertanyaan']?>', this)">3</a>
                        <a class="btn btn-default btn-success rate" id="cukupbaik" onclick="vote('<?=$dataKelas->row()->kd_tt_matkul?>', '<?=$this->session->userdata("kd_mahasiswa")?>', '4', '<?=$row['kd_pertanyaan']?>', this)">4</a>
                        <a class="btn btn-default btn-success rate" id="istimewa" onclick="vote('<?=$dataKelas->row()->kd_tt_matkul?>', '<?=$this->session->userdata("kd_mahasiswa")?>', '5', '<?=$row['kd_pertanyaan']?>', this)">5</a>
                      </td>
                    </tr>
                    <?php $nomor++; ?>
                  <?php }else{ ?>
                  <?php } ?>
                <?php } ?>
                <tr>
                  <td>Dosen yang paling disukai</td>
                  <td><textarea name="dosenFav" id="dosenFav"></textarea></td>
                  <td><a class="btn btn-md btn-success" id="btnDosenFav" onclick="kritikSaran('dosenFav','<?=$dataKelas->row()->kd_tt_matkul?>', this)">SIMPAN</a></td>
                </tr>
                <tr>
                  <td>Kritik dan Saran untuk Dosen</td>
                  <td><textarea name="kritikSaranDosen" id="kritikSaranDosen"></textarea></td>
                  <td><a class="btn btn-md btn-success" id="btnKritikSaranDosen" onclick="kritikSaran('KritikSaranDosen','<?=$dataKelas->row()->kd_tt_matkul?>', this)">SIMPAN</a></td>
                </tr>
                <tr>
                  <td>Kritik dan Saran untuk BAK/FO/Security/OB</td>
                  <td><textarea name="kritikSaranOffice" id="kritikSaranOffice"></textarea></td>
                  <td><a class="btn btn-md btn-success" id="btnKritikSaranOffice" onclick="kritikSaran('KritikSaranOffice','<?=$dataKelas->row()->kd_tt_matkul?>', this)">SIMPAN</a></td>
                </tr>
              <?php }else{ ?>
            Anda sudah menjawab semua pertanyaan
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
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