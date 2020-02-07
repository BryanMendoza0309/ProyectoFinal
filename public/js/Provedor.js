
$(document).ready(function() {

    $('#guardarProvedor').click(function() {
      var request = {
        nombreProvedor:$('#nombre').val(),
            tlfProvedor: $('#telefono').val(),
            Dirección: $('#direccion').val(),
            caracteristicaProvedor: $('#caracteristicas').val()
        }
        var token = $('#token').val();
        var route='http://127.0.0.1:8000/InsertProveedor';

         debugger
        $.ajax({
            url: route,
            headers: { 'X-CSRF-TOKEN': token },
            type: 'POST',
            dataType: 'json',
            data: request,
        })
    });

});




