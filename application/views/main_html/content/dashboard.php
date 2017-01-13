<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Vote Matkul Dosen</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Kode Mata Kuliah</th>
            <th>Mata Kuliah</th>
            <th>Nama Dosen</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataDosen->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($dataDosen->result_array() as $row) { ?>
              <?php //if(modules::run('mahasiswa/index/checkRating',$row['kd_tt_matkul'],$this->session->userdata('kd_mahasiswa')) == 'false'){ ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['kd_tt_matkul']?></td>
                  <td><?=$row['matkul']?></td>
                  <td><?=$row['nama_dosen']?></td>
                  <td>
                        <a href="<?=base_url('mahasiswa/index/pertanyaan')?>/<?=$row['kd_tt_matkul']?>/<?=$row['kd_tt_kelas']?>" class="btn btn-default btn-success">JAWAB PERTANYAAN</a>
                  </td>
                </tr>
                <?php $nomor++; ?>
              <?php //} ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
      function vote(kd_tt_matkul, kd_mahasiswa_kelas, nilai, r){
        var iRow = r.parentNode.parentNode.rowIndex;
        var valueHref = '<?=base_url('mahasiswa/index/giveRating/')?>'+'/'+kd_tt_matkul+'/'+kd_mahasiswa_kelas+'/'+nilai;
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