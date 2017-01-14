
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
            <div id="graph_bar" style="width:100%; height:200px;"></div>
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
          function requestData(url, chart){
            $.ajax({
              type: "GET",
              url: url,
              data: ""
            })
            .done(function( data ) {
              // When the response to the AJAX request comes back render the chart with new data
              chart.setData(JSON.parse(data));
            })
            .fail(function() {
              // If there is no communication between the server, show an error
              // alert( "error occured" );
            });
          }

          var chart = Morris.Bar({
            element: 'graph_bar',
            data: [0,0],
            xkey: 'Dosen',
            ykeys: ['Vote Counted'],
            labels: ['Vote Counted'],
            hideHover: 'auto',
            xLabelAngle: 60,
            resize: true
          });
        $(".select2_single").select2({
          placeholder: "Pilih Mata Kuliah",
          allowClear: true
        });
        $(".select2_single").on("change", function(e){
            e.preventDefault();
            var valueHref = '<?=base_url('admin/index/getDataGrafik')?>'+'/'+$(".select2_single").val();
            requestData(valueHref, chart);
        });
      });
    </script>