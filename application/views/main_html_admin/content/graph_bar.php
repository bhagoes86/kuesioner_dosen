<div id="graph_bar" style="width:100%; height:200px;"></div>


        <!-- morris.js -->
    <script type="text/javascript">
      $(document).ready(function() {
        Morris.Bar({
          element: 'graph_bar',
          data: <?=$grafik?>,
          xkey: 'Dosen',
          hideHover: 'auto',
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          ykeys: ['Vote Counted', ''],
          labels: ['Vote Counted', ''],
          xLabelAngle: 60,
          resize: true
        });

        $MENU_TOGGLE.on('click', function() {
          $(window).resize();
        });
      });
    </script>
    <!-- /morris.js -->