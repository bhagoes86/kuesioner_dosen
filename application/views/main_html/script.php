
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?=base_url()?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url()?>assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?=base_url()?>assets/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?=base_url()?>assets/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?=base_url()?>assets/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?=base_url()?>assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url()?>assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?=base_url()?>assets/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?=base_url()?>assets/Flot/jquery.flot.js"></script>
    <script src="<?=base_url()?>assets/Flot/jquery.flot.pie.js"></script>
    <script src="<?=base_url()?>assets/Flot/jquery.flot.time.js"></script>
    <script src="<?=base_url()?>assets/Flot/jquery.flot.stack.js"></script>
    <script src="<?=base_url()?>assets/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?=base_url()?>assets/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?=base_url()?>assets/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?=base_url()?>assets/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?=base_url()?>assets/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <!-- bootstrap-daterangepicker -->
    <script src="<?=base_url()?>assets/js/moment/moment.min.js"></script>
    <script src="<?=base_url()?>assets/js/datepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="<?=base_url()?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?=base_url()?>assets/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?=base_url()?>assets/jszip/dist/jszip.min.js"></script>
    <script src="<?=base_url()?>assets/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/pdfmake/build/vfs_fonts.js"></script>
    <!-- Parsley -->
    <script src="<?=base_url()?>assets/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="<?=base_url()?>assets/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?=base_url()?>assets/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- PNotify -->
    <script src="<?=base_url()?>assets/pnotify/dist/pnotify.js"></script>
    <script src="<?=base_url()?>assets/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?=base_url()?>assets/pnotify/dist/pnotify.nonblock.js"></script>

    <script src="<?=base_url()?>assets/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <!-- Switchery -->
    <script src="<?=base_url()?>assets/switchery/dist/switchery.min.js"></script>
    <script src="<?=base_url()?>assets/bootstrap-switch/bootstrap-switch.js"></script>

    <!-- Dropzone.js -->
    <script src="<?=base_url()?>assets/dropzone/dist/min/dropzone.min.js"></script>
    <!-- Select2 -->
    <script src="<?=base_url()?>assets/select2/dist/js/select2.full.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?=base_url()?>assets/js/custom.min.js"></script>

    <!-- Flot -->
    <script>
        $(document).ready(function (){
            $('.right_col').on('mousewheel', function(e) {
                    e.stopPropagation();
            })
        });
    </script>
    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {
        $('#birthday').daterangepicker({
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#date').daterangepicker({
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#datea').daterangepicker({
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
        $('#dateb').daterangepicker({
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            calender_style: "picker_4"
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->
    <!-- datatabel.js -->
    <script type="text/javascript">
      $('#datatable').DataTable();
      $('#datatable-pertanyaan').DataTable({
            lengthMenu: [ [5, 10, 50, -1], [5, 10, 50, "All"] ],
            pageLength: 50
      });
        $(document).ready(function(){
            $('#tabelLaporanTabungan').DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
            $('#tabelLaporanPinjaman').DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
        });
    </script>
    <!-- datatabel.js -->
       <!-- Flot -->
    <script>
      $(document).ready(function() {
        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                              "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
                            ];
        var options = {
            series: {
                lines:  { show: true,lineWidth: 2,fill: true},
                points: { show: true,radius: 3,lineWidth: 1},
                shadowSize: 2
            },
            xaxis: {
                    tickColor: "rgba(51, 51, 51, 0.06)",
                    mode: "month",
                    minTickSize: [1, "month"],
                    tickSize: [1, "month"],
                    ticks: [
                            [0, monthNames[0]],
                            [1, monthNames[1]],
                            [2, monthNames[2]],
                            [3, monthNames[3]],
                            [4, monthNames[4]],
                            [5, monthNames[5]],
                            [6, monthNames[6]],
                            [7, monthNames[7]],
                            [8, monthNames[8]],
                            [9, monthNames[9]],
                            [10, monthNames[10]],
                            [11, monthNames[11]],
                            [12, monthNames[12]]
                            ],
                    //tickLength: 10,
                    axisLabel: "Bulan",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Verdana, Arial',
                    axisLabelPadding: 10
                  },
            legend: { show: true}
        };
        <?php $m1 = date('m') - 1; ?>
        <?php $y1 = date('y'); ?>
        var DATA = [{
            "label": "Peminjaman",
                "data": [
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>],
                <?php if($m1=='12'){$m1=01;$y1++;} ?><?php $m1++; ?>
                [<?=$m1?>, <?=modules::run('admin/index/getCountPeminjam', '<?=$y?>', '<?=$m1?>')?>]
            ]
        }, {
            "label": "Tabungan",
                "data": [
                [<?=date('m')?>, <?=modules::run('admin/index/getCountTabungan', '2016', '01')?>],
                [<?=date('m') + 1?>, <?=modules::run('admin/index/getCountTabungan', '2016', '02')?>],
                [<?=date('m') + 2?>, <?=modules::run('admin/index/getCountTabungan', '2016', '03')?>],
                [<?=date('m') + 3?>, <?=modules::run('admin/index/getCountTabungan', '2016', '04')?>],
                [<?=date('m') + 4?>, <?=modules::run('admin/index/getCountTabungan', '2016', '05')?>],
                [<?=date('m') + 5?>, <?=modules::run('admin/index/getCountTabungan', '2016', '06')?>],
                [<?=date('m') + 6?>, <?=modules::run('admin/index/getCountTabungan', '2016', '07')?>],
                [<?=date('m') + 7?>, <?=modules::run('admin/index/getCountTabungan', '2016', '08')?>],
                [<?=date('m') + 8?>, <?=modules::run('admin/index/getCountTabungan', '2016', '09')?>],
                [<?=date('m') + 9?>, <?=modules::run('admin/index/getCountTabungan', '2016', '10')?>],
                [<?=date('m') + 10?>, <?=modules::run('admin/index/getCountTabungan', '2016', '11')?>],
                [<?=date('m') + 11?>, <?=modules::run('admin/index/getCountTabungan', '2016', '12')?>]
            ]
        }];

        var DK = [{
            "label": "Debit",
                "data": [
                [<?=date('m')?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '01')?>],
                [<?=date('m') + 1?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '02')?>],
                [<?=date('m') + 2?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '03')?>],
                [<?=date('m') + 3?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '04')?>],
                [<?=date('m') + 4?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '05')?>],
                [<?=date('m') + 5?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '06')?>],
                [<?=date('m') + 6?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '07')?>],
                [<?=date('m') + 7?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '08')?>],
                [<?=date('m') + 8?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '09')?>],
                [<?=date('m') + 9?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '10')?>],
                [<?=date('m') + 10?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '11')?>],
                [<?=date('m') + 11?>, <?=modules::run('admin/index/getCountJurnal', 'debet', '2016', '12')?>]
            ]
        }, {
            "label": "Kredit",
                "data": [
                [<?=date('m')?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '01')?>],
                [<?=date('m') + 1?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '02')?>],
                [<?=date('m') + 2?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '03')?>],
                [<?=date('m') + 3?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '04')?>],
                [<?=date('m') + 4?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '05')?>],
                [<?=date('m') + 5?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '06')?>],
                [<?=date('m') + 6?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '07')?>],
                [<?=date('m') + 7?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '08')?>],
                [<?=date('m') + 8?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '09')?>],
                [<?=date('m') + 9?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '10')?>],
                [<?=date('m') + 10?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '11')?>],
                [<?=date('m') + 11?>, <?=modules::run('admin/index/getCountJurnal', 'kredit', '2016', '12')?>]
            ]
        }, {
            "label": "Saldo",
                "data": [
                [<?=date('m')?>, <?=modules::run('admin/index/getSaldo', '2016', '01')?>],
                [<?=date('m') + 1?>, <?=modules::run('admin/index/getSaldo', '2016', '02')?>],
                [<?=date('m') + 2?>, <?=modules::run('admin/index/getSaldo', '2016', '03')?>],
                [<?=date('m') + 3?>, <?=modules::run('admin/index/getSaldo', '2016', '04')?>],
                [<?=date('m') + 4?>, <?=modules::run('admin/index/getSaldo', '2016', '05')?>],
                [<?=date('m') + 5?>, <?=modules::run('admin/index/getSaldo', '2016', '06')?>],
                [<?=date('m') + 6?>, <?=modules::run('admin/index/getSaldo', '2016', '07')?>],
                [<?=date('m') + 7?>, <?=modules::run('admin/index/getSaldo', '2016', '08')?>],
                [<?=date('m') + 8?>, <?=modules::run('admin/index/getSaldo', '2016', '09')?>],
                [<?=date('m') + 9?>, <?=modules::run('admin/index/getSaldo', '2016', '10')?>],
                [<?=date('m') + 10?>, <?=modules::run('admin/index/getSaldo', '2016', '11')?>],
                [<?=date('m') + 11?>, <?=modules::run('admin/index/getSaldo', '2016', '12')?>]
            ]
        }];
        var plot = $.plot("#canvas_dahs", DATA, options);
        var plotdk = $.plot("#canvas_dk", DK, options);
      });
    </script>
    <!-- /Flot -->
