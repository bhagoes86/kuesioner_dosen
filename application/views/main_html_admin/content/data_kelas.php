<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Kelas</h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-create-modal-md" onclick="showCreateDialog('<?=$dataKelas->num_rows()?>')">Tambah Data</a>

      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Kode Kelas</th>
            <th>Kelas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if($dataKelas->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($dataKelas->result_array() as $row) { ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['kd_kelas']?></td>
                  <td><?=$row['nama_kelas']?></td>
                  <td>
                    <a class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-update-modal-md" onclick="showDialogUpdate('<?=$row['kd_kelas']?>', this)">Ubah</a>
                    <a class="btn btn-sm btn-danger"  data-toggle="modal" data-target=".bs-delete-modal-sm"  onclick="showDialogDelete('<?=sha1($row['kd_kelas'])?>', this)">Hapus</a>
                    <a class="btn btn-sm btn-success"  data-toggle="modal" data-target=".bs-list-modal-lg" onclick="showDIalogDetailMahasiswa('<?=$row['kd_kelas']?>')">Daftar Mahasiswa</a>
                    <a class="btn btn-sm btn-success"  data-toggle="modal" data-target=".bs-add-modal-lg" onclick="showDIalogTambahMahasiswa('<?=$row['kd_kelas']?>')">Tambah Mahasiswa</a>
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
            <h4 class="modal-title" id="myModalLabel2">Tambah Data Kelas</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nama_create" required="required" class="form-control col-md-7 col-xs-12" name="nama_kelas">
                  <input type="hidden" id="row_create" required="required" class="form-control col-md-7 col-xs-12" name="row">
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
    <!-- modals add -->
    <div class="modal fade bs-add-modal-lg" id="modaladd" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <form id="formaddmahasiswa" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Tambah Data Kelas</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-3" for="first-name">Nama Mahasiswa <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="hidden" id="kd_add" required="required" class="form-control col-md-7 col-xs-12" name="kd_add">
                  <select class="select_single form-control" tabindex="-1" name="mahasiswadd" id="mahasiswadd">
                    <option></option>
                    <?php foreach ($dataMahasiswa->result_array() as $rowMahasiswa) { ?>
                      <option value="<?=$rowMahasiswa['kd_mahasiswa']?>"><?=$rowMahasiswa['nim']?>-<?=$rowMahasiswa['nama']?></option>
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
    <!-- /modals add-->
    <!-- modals list -->
    <div class="modal fade bs-list-modal-lg" id="modallist" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">List Mahasiswa</h4>
          </div>
          <div class="modal-body" id="contentMhs">

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /modals list-->
    <!-- modals update -->
    <div class="modal fade bs-update-modal-md" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <form id="formupdatematkul" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel2">Ubah Data Kelas</h4>
          </div>
          <div class="modal-body">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="nama" required="required" class="form-control col-md-7 col-xs-12" name="nama_kelas">
                  <input type="hidden" id="kd" required="required" class="form-control col-md-7 col-xs-12" name="kode_kelas">
                  <input type="hidden" id="row" required="required" class="form-control col-md-7 col-xs-12" name="row">
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
            <h4 class="modal-title" id="myModalLabel2">Hapus Data Kelas?</h4>
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
    function showDIalogDetailMahasiswa(id){
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/detailMahasiswaKelas')?>/'+id,
            data: $('form').serialize(),
            success: function (i) {
              document.getElementById("contentMhs").innerHTML=i;
            }
          });
    }
      function showDIalogTambahMahasiswa(id){
          // var iRow = r.parentNode.parentNode.rowIndex;
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_get/kelas')?>/'+id,
            data: $('form').serialize(),
            success: function (i) {
              var jsonObjectParse = JSON.parse(i);
              var jsonObjectStringify = JSON.stringify(jsonObjectParse);
              var jsonObjectFinal = JSON.parse(jsonObjectStringify);
              // document.getElementById("row_add").value=iRow;
              document.getElementById("kd_add").value=jsonObjectFinal.kd_kelas;
            }
          });
      }
      function showDialogDelete(id, r){
          var i = r.parentNode.parentNode.rowIndex;
          document.getElementById("yDel").href=id+"beni"+i;
      }
      function showDialogUpdate(id, r){
          var iRow = r.parentNode.parentNode.rowIndex;
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_get/kelas')?>/'+id,
            data: $('form').serialize(),
            success: function (i) {
              var jsonObjectParse = JSON.parse(i);
              var jsonObjectStringify = JSON.stringify(jsonObjectParse);
              var jsonObjectFinal = JSON.parse(jsonObjectStringify);
              document.getElementById("row").value=iRow;
              document.getElementById("kd").value=jsonObjectFinal.kd_kelas;
              document.getElementById("nama").value=jsonObjectFinal.nama_kelas;
            }
          });
      }
      function showCreateDialog(row){
        document.getElementById("row_create").value=row;
      }
      $(document).ready(function(){
        $(".select_single").select2({
          placeholder: "Pilih Mahasiswa",
          allowClear: true,
          dropdownParent: $("#modaladd")
        });
        $('#formcreatematkul').on('submit', function(e){
          var table = document.getElementById('datatable');
          var rowCreate = document.getElementById('row_create').value;
          var nameCreate = document.getElementById('nama_create').value;
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/post_kelas/create')?>',
            data: $('#formcreatematkul').serialize(),
            success: function (i) {
              if(i == 'true'){
                var row = table.insertRow(1);
                var cellNumber = row.insertCell(0);
                var cellId = row.insertCell(1);
                var cellName = row.insertCell(2);
                var cellAksi = row.insertCell(3);
                cellNumber.innerHTML = rowCreate + 1;
                cellAksi.innerHTML = '';
                cellId.innerHTML = rowCreate + 1;
                cellName.innerHTML = nameCreate;
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
            url: '<?=base_url('admin/index/post_kelas/update')?>',
            data: $('#formupdatematkul').serialize(),
            success: function (i) {
              if(i == 'true'){
                row.cells[2].innerHTML = document.getElementById("nama").value;
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
        $("#formaddmahasiswa").on('submit', function(e){
          e.preventDefault();
          $.ajax({
            type: 'post',
            url: '<?=base_url('admin/index/addMahasiswaKelas')?>',
            data: $('#formaddmahasiswa').serialize(),
            success: function (i) {
              if(i == 'true'){
                new PNotify({
                                    title: 'Add Success',
                                    text: 'Tambah Data Mahasiswa Sukses',
                                    type: 'success',
                                    hide: true,
                                    styling: 'bootstrap3'
                                });
                $('#modaladd').modal('hide');
              }else{
                new PNotify({
                                  title: 'Add Failed',
                                  text: 'Tambah Mahasiswa Gagal',
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
            url: '<?=base_url('admin/index/post_kelas/delete')?>/'+temp[0],
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