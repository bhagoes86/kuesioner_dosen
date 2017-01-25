<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Kelas</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-create-modal-md" onclick="showCreateDialog('<?=$dataMatkulDosen->num_rows()?>')">Tambah Data</a>

      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
            <th>Dosen</th>
            <th>Matkul</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataMatkulDosen->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($dataMatkulDosen->result_array() as $row) { ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['semester']?></td>
                  <td><?=$row['tahun_ajaran']?></td>
                  <td><?=$row['nama_dosen']?></td>
                  <td><?=$row['matkul']?></td>
                  <td>
                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-update-modal-md" onclick="showDialogUpdate('<?=$row['kd_tt_matkul']?>', this)">Ubah</a>
                    <a href="#" class="btn btn-sm btn-danger"  data-toggle="modal" data-target=".bs-delete-modal-sm"  onclick="showDialogDelete('<?=sha1($row['kd_tt_matkul'])?>', this)">Hapus</a>
                  </td>
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
    <!-- modals create -->
    <div class="modal fade bs-create-modal-md" id="modalcreate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <form id="formcreatematkul" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Tambah Data Matkul Dosen</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Semester <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="semester_create" required="required" class="form-control col-md-7 col-xs-12" name="semester">
                  <input type="hidden" id="row_create" required="required" class="form-control col-md-7 col-xs-12" name="row">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun Ajaran (yyyy-yyyy)<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="tahun_ajaran_create" required="required" class="form-control col-md-7 col-xs-12" name="tahun_ajaran">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dosen <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="dosen" class="form-control col-md-7 col-xs-12" id="dosen_create">
                    <option value="-">-</option>
                    <?php foreach ($dataDosen->result_array() as $rowDosen) { ?>
                      <option value="<?=$rowDosen['kd_dosen']?>"><?=$rowDosen['nama_dosen']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Semester <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="matkul" class="form-control col-md-7 col-xs-12" id="matkul_create">
                    <option value="-">-</option>
                    <?php foreach ($dataMatkul->result_array() as $rowMatkul) { ?>
                      <option value="<?=$rowMatkul['kd_matkul']?>"><?=$rowMatkul['matkul']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="save">Simpan Perubahan</button>
          </div>
        </form>
        </div>
      </div>
    </div>
    <!-- /modals create-->
    <!-- modals update -->
    <div class="modal fade bs-update-modal-md" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <form id="formupdatematkul" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Ubah Data Matkul Dosen</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Semester <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="semester" required="required" class="form-control col-md-7 col-xs-12" name="semester">
                  <input type="hidden" id="kd_tt_matkul" class="form-control col-md-7 col-xs-12" name="kd_tt_matkul">
                  <input type="hidden" id="row" class="form-control col-md-7 col-xs-12" name="row">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun Ajaran (yyyy-yyyy)<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="tahun_ajaran" required="required" class="form-control col-md-7 col-xs-12" name="tahun_ajaran">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Dosen <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="dosen" class="form-control col-md-7 col-xs-12" id="dosen">
                    <option value="-">-</option>
                    <?php foreach ($dataDosen->result_array() as $rowDosen) { ?>
                      <option value="<?=$rowDosen['kd_dosen']?>"><?=$rowDosen['nama_dosen']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mata Kuliah <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="matkul" class="form-control col-md-7 col-xs-12" id="matkul">
                    <option value="-">-</option>
                    <?php foreach ($dataMatkul->result_array() as $rowMatkul) { ?>
                      <option value="<?=$rowMatkul['kd_matkul']?>"><?=$rowMatkul['matkul']?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="save">Simpan Perubahan</button>
          </div>
        </form>

        </div>
      </div>
    </div>
    <!-- /modals update-->
    <!-- modal hapus -->
    <div class="modal fade bs-delete-modal-sm" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Hapus Data Matkul Dosen?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            <a type="button" class="btn btn-danger" id="yDel">Ya</a>
          </div>

        </div>
      </div>
    </div>
    <!-- /modals hapus -->
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
      function showDialogDelete(id, r){
          var i = r.parentNode.parentNode.rowIndex;
          document.getElementById("yDel").href=id+"beni"+i;
      }
      function showDialogUpdate(id, r){
          var iRow = r.parentNode.parentNode.rowIndex;
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_get/matkulDosen')?>/'+id,
            data: $('form').serialize(),
            success: function (i) {
              var jsonObjectParse = JSON.parse(i);
              var jsonObjectStringify = JSON.stringify(jsonObjectParse);
              var jsonObjectFinal = JSON.parse(jsonObjectStringify);
              console.log(jsonObjectFinal);
              document.getElementById("row").value=iRow;
              document.getElementById("kd_tt_matkul").value=jsonObjectFinal.kd_tt_matkul;
              document.getElementById("dosen").value=jsonObjectFinal.kd_dosen;
              document.getElementById("matkul").value=jsonObjectFinal.kd_matkul;
              document.getElementById("semester").value=jsonObjectFinal.semester;
              document.getElementById("tahun_ajaran").value=jsonObjectFinal.tahun_ajaran;
            }
          });
      }
      function showCreateDialog(row){
        document.getElementById("row_create").value=row;
      }
      $(document).ready(function(){
        $('#formcreatematkul').on('submit', function(e){
          var table = document.getElementById('datatable');
          // var rowCreate = document.getElementById('rows_create').value;
          // var nameCreate = document.getElementById('nama_create').value;
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_matkul_dosen/create')?>',
            data: $('#formcreatematkul').serialize(),
            success: function (i) {
              if(i == 'true'){
                var row = table.insertRow(1);
                var cellNumber = row.insertCell(0);
                var cellSemester = row.insertCell(1);
                var cellTahunAjaran = row.insertCell(2);
                var cellDosen = row.insertCell(3);
                var cellMatkul = row.insertCell(4);
                cellSemester.innerHTML = document.getElementById("semester_create").value;
                cellTahunAjaran.innerHTML = document.getElementById("tahun_ajaran_create").value;
                cellDosen.innerHTML = document.getElementById("dosen_create").value;
                cellMatkul.innerHTML = document.getElementById("matkul_create").value;

                new PNotify({
                                    title: 'Create Success',
                                    text: 'Create Data Success',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                $('#modalcreate').modal('hide');
              }else{
                new PNotify({
                                  title: 'Create Failed',
                                  text: i,
                                  type: 'error',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });
              }
            }
          });
        });
        $('#formupdatematkul').on('submit', function(e){
          var table = document.getElementById("datatable")
          var rowVal = document.getElementById('row').value;
          var row = table.rows[rowVal];
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_matkul_dosen/update')?>',
            data: $('#formupdatematkul').serialize(),
            success: function (i) {
              if(i == 'true'){
                row.cells[1].innerHTML = document.getElementById("semester").value;
                row.cells[2].innerHTML = document.getElementById("tahun_ajaran").value;
                row.cells[3].innerHTML = document.getElementById("dosen").value;
                row.cells[4].innerHTML = document.getElementById("matkul").value;
                new PNotify({
                                    title: 'Update Success',
                                    text: 'Update Data Success',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                $('#modalUpdate').modal('hide');
              }else{
                new PNotify({
                                  title: 'Update Failed',
                                  text: i,
                                  type: 'error',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });
              }
            }
          });
        });
        $('#yDel').on('click', function(e){
          var value = document.getElementById("yDel").getAttribute("href");
          var temp = new Array();
          temp = value.split("beni");
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_matkul_dosen/delete')?>/'+temp[0],
            data: $('form').serialize(),
            success: function (i) {
              if(i == 'true'){
                document.getElementById("datatable").deleteRow(temp[1]);
                new PNotify({
                                    title: 'Delete Success',
                                    text: 'Delete Data Success',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                $('#modalHapus').modal('hide');
              }else{
                new PNotify({
                                  title: 'Delete Failed',
                                  text: i,
                                  type: 'error',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });
              }
            }
          });
        });
      });
    </script>