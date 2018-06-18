// function Edit POST
$(document).on('click', '.edit-modal', function() {
    $('#semana').val($(this).data('sem'));
    $('#tema').val($(this).data('tem'));
    $('#horas').val($(this).data('hrs'));
    $('#datepicker').val($(this).data('fech'));
    $('#ae').val($(this).data('ae'));
    $('#aa').val($(this).data('aa'));
    $('#ea').val($(this).data('ea'));
    $('#id').val($(this).data('id'));
    $('#myModal').modal('show');
});
$(document).on('click', '.show-modal', function() {
    $('#ae2').val($(this).data('ae'));
    $('#aa2').val($(this).data('aa'));
    $('#ea2').val($(this).data('ea'));
    $('#id').val($(this).data('id'));
});

function storeData(id,route,url){
  
  alertify.confirm("¿Los datos son correctos?",
    function(){
      var data= $("#"+id).serialize();

       $.ajax({
      url: route,
      type: 'POST',
      data: data,
      dataType: 'json',
      success: function(data){
        console.log(data);
         $("#"+id)[0].reset();
         window.location.href=url;
        //alert(data.message);
      },
      error: function (data) {     
      console.log(data); 
        alertify.error(data.responseText);
      }
      });
    },
    function(){
      alertify.error('Cancelado');
  });
  
}


