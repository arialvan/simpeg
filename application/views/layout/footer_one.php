<!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; <a href="http://www.uin.ar-raniry.ac.id/">UIN AR-Raniry</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Bar Chart -->
    <script src="<?php echo base_url(); ?>assets/js/Chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.canvasjs.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
    <script>
       //Bar Chart
       $(document).ready(function () {
       $.getJSON("<?php echo base_url(); ?>Dashboard/BarChart", function (result) {
           var chart = new CanvasJS.Chart("chartContainer", {
              colorSet: "greenShades",
               data: [
                       {
                           type: "bar",
                           showInLegend: true,
                           legendText: "Data Grafik",
                           color: "rgb(102, 140, 204)", // Hapus jika gunakan manual
                           dataPoints: result
                       }
                     ]
                   });
                   chart.render();
               });
           });

   </script>

</body>
</html>
