
<!-- /.content-wrapper -->
<footer class="main-footer">

  <strong>Copyright &copy; 2014-2018 <a href="<?php echo base_url()."assets/"; ?>http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <?php 
  if(isset($data1) and isset($data2)){ 
    $hasil=implode(",",$data1);
    $hasil2=implode(",",$data2);
  }else{
    $hasil=0;
    $hasil2=0;
  }
?>
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.0-alpha
  </div>
</footer>


<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="<?php echo base_url()."assets/"; ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dropdown/js/bootstrap-4-navbar.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()."assets/"; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()."assets/"; ?>plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url()."assets/"; ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url()."assets/"; ?>plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url()."assets/"; ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url()."assets/"; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url()."assets/"; ?>plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()."assets/"; ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()."assets/"; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
<!-- Page script -->

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url()."assets/"; ?>plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script>
<!-- <script src="<?php echo base_url()."assets/"; ?>dist/js/pages/dashboard3.js"></script> -->

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>plugins/morris/morris.min.js"></script>
<!-- <script src="<?php echo base_url()."assets/"; ?>dist/js/demo.js"></script> -->
<script src="<?php echo base_url()."assets/"; ?>dist/js/pages/dashboard3.js"></script>

<script>
$(function () {

  $("#example1").DataTable();
  $("#example3").DataTable();
  $('#example2').DataTable({
    "paging": false,
    "lengthChange": false,
    "searching": true,
    "ordering": false,
    "info": false,
    "autoWidth": true
  });
  $('#example4').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": false,
    "info": false,
    "autoWidth": false
  });
  $('#example5').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": false,
    "info": false,
    "autoWidth": false
  });


  $('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
});
  //Initialize Select2 Elements
  $('.select2').select2()

  //Datemask dd/mm/yyyy
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  //Datemask2 mm/dd/yyyy
  $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
  //Money Euro
  $('[data-mask]').inputmask()

  //Date range picker
  $('#reservation').datepicker({
  })
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({
    timePicker         : true,
    timePickerIncrement: 30,
    format             : 'MM/DD/YYYY h:mm A'
  })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )

  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  })
  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass   : 'iradio_minimal-red'
  })
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
  })

  //Colorpicker
  $('.my-colorpicker1').colorpicker()
  //color picker with addon
  $('.my-colorpicker2').colorpicker()

  //Timepicker
  $('.timepicker').timepicker({
    showInputs: false
  })
  

  //disable by dropdown
  $('select[id=coba1]').eq(0).change(function () {
    $('input[id=cek]').prop('disabled', (this.value === '2'));
}).change();

  $(function() {
    $('#hayo').on('blur' , function(){
       var val =  $('#hayo').val();
        if(val == '1'){
           $('#hokya').attr('disabled', true);                 
           $('#hokya2').attr('disabled', true);   
        }
        else{
             $('#hokya').attr('disabled', false);    
        }
    });
});

  $('input[id=th_aktif]').each(function(){

    var tempval = $(this).val();

    if (  tempval == 1 ){       
      $('input[id=1]').prop('disabled', true);
      $('input[id=2]').prop('disabled', true);
      $('input[id=3]').prop('disabled', true);
      $('input[id=4]').prop('disabled', true);
      $('input[id=5]').prop('disabled', true);
      $('input[id=6]').prop('disabled', true);
    }
    if ( tempval ==2 ) {
      $('input[id=7]').prop('disabled', true);
      $('input[id=8]').prop('disabled', true);
      $('input[id=9]').prop('disabled', true);
      $('input[id=10]').prop('disabled', true);
      $('input[id=11]').prop('disabled', true);
      $('input[id=12]').prop('disabled', true);
    }
});

})

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ['JAN','FEB','MAR','APR','MEI','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [
        {
          backgroundColor: '#000035',
          borderColor    : '#007bff',
          data           : [<?php echo $hasil   ?>]
        },
        {
          backgroundColor: '#007bff',
          borderColor    : '#ced4da',
          data           : [<?php echo $hasil2 ?>]
        }
      ]
    },
    options: {
      maintainAspectRatio: true,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value / 1000
                // value += ''
              }
              return value + ' K'
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: true,
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

  var $visitorsChart = $('#visitors-chart')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : ['JAN','FEB','MAR','APR','MEI','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [{
        type                : 'line',
        data                : [<?php echo $hasil ?>],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          data                : [<?php echo $hasil2 ?>],
          backgroundColor     : 'tansparent',
          borderColor         : '#fd7e14',
          pointBorderColor    : '#fd7e14',
          pointBackgroundColor: '#fd7e14',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
  
})


</script>

</body>
</html>
