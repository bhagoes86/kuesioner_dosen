<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Data Mahasiswa Kelas <?=$kelas?></h2>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Nomor</th>
            <th>Nim</th>
            <th>Nama Mahasiswa</th>
          </tr>
        </thead>
        <tbody>
        <?php if($query != null){ ?>
          <?php if($query->num_rows() > 0){ ?>
          <?php $nomor = 1;?>
            <?php foreach ($query->result_array() as $row) { ?>
                <tr>
                  <td><?=$nomor?></td>
                  <td><?=$row['nim']?></td>
                  <td><?=$row['nama']?></td>
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
          <?php } ?>

        <?php  } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>