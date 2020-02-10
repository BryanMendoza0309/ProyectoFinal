function cargar() {
     debugger

        var datosTabla = $('#datoscatetdb');
        var ruta = 'http://127.0.0.1:8000/loadProducto';
        $('#datoscatetdb').empty();
        debugger
        $.get(ruta, function(res) {
            debugger
            $(res).each(function(key, item) {
                debugger
                var i = 0;
                if (item.eliminadolog == 1)
                    datosTabla.append('<tr role="row" class="odd"><td>' + item.id + '</td><td>' + item.codigoProducto + '</td><td>' + item.nombreProducto + '</td><td>' + item.descipcionProducto + '</td><td>' + item.marcaProducto + '</td><td>' + item.modeloProducto + '</td><td>' + item.fecha_caducidadProducto + '</td><td><img width=100%; height=5%; src="imagen/' + item.imagenProducto + '" alt=""></td><td>' + item.cantidadProducto + '</td><td>' + item.precioVentaPublico + '</td><td>' + item.precioAdministrador + '</td><td>' + item.descuentoPublico + '</td><td>' + item.totalVentas + '</td><td>' + item.totalProductosVentas + '</td><td>' + item.nombreProvedor + '</td><td>' + item.nombreTipoProducto + '</td><td style="width: 8%"><button OnClick="Eliminar(this);" value="' + item.id + '" type="submit" class="btn btn-danger"> Eliminar</button><button OnClick="Mostrar(this);" style="text-decoration: none" data-toggle="modal" href="#" data-target="#exampleModal" class="btn btn-danger" value="' + item.id + '" >Editar</button></td></tr>');
            });

        })

}

$(document).ready(function() {
   cargar();

});
function Eliminar(btn) {
    var route = 'http://127.0.0.1:8000/TablaProductos/'+btn.value+'';
        var token = $('#token').val();
        $.ajax({
            url: route,
            headers: { 'X-CSRF-TOKEN': token },
            type: 'DELETE',
            dataType: 'json',  
        })
        .done(function(data) {
             cargar();
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Datos Eliminados',
            showConfirmButton: false,
            timer: 1500
            })
        })

        .fail(function(error){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Erro al Eliminar los Datos!',
            })      
        })
}