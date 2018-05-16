$('#btn_fech').click(function(event) {
  if ($('#icon_generator').hasClass('fa-spin')) {
    $('#icon_generator').removeClass('fa-spin');
  } else {
    $('#icon_generator').addClass('fa-spin');
  }
});
 $('.select2').select2();
 $('#reservation').daterangepicker({
     locale: {
            format: 'DD/MM/YYYY'
        }
 });
/* $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          '7 dias atras' : [moment().subtract(6, 'days'), moment()],
          '30 dias atras': [moment().subtract(29, 'days'), moment()],
          'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
          'Mes pasado'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    );*/
  $('#datepicker').datepicker({
      autoclose: true
    });
  $('.my-colorpicker1').colorpicker()
    //color picker with addon
  $('.my-colorpicker2').colorpicker()