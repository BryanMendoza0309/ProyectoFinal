function cargar() {
    var datosTabla = $('#datoscatetdb');
    var ruta = 'http://127.0.0.1:8000/loadProducto';
    $('#datoscatetdb').empty();debugger
    $.get(ruta, function(res) {
debugger
        $(res).each(function(key, item) {

var i=0;

            if (item.eliminadolog == 1){
            	datosTabla.append('<tr role="row" class="odd"><td>' +  item.id  + '</td><td>' + item.codigoProducto + '</td><td>' + item.nombreProducto + '</td><td>' + item.descipcionProducto  + '</td><td>' +item.marcaProducto + '</td><td>' + item.modeloProducto + '</td><td>' + item.fecha_caducidadProducto+ '</td><td><img width=100%; height=5%; src="imagen\' + item.imagenProducto+ '" alt=""></td><td>' + item.stock.cantidadProducto + '</td><td>' + item.stock.precioVentaPublico+ '</td><td>' + item.stock.precioAdministrador + '</td><td>' + item.stock.descuentoPublico + '</td><td>' + item.stock.totalVentas + '</td><td>' + item.stock.totalProductosVentas+ '</td><td>' + item.stock.provedor.nombreProvedor+ '</td><td>' + item.categoria.nombreTipoProducto + '</td><td><a>Editar</a></td></tr>');

            }
        i++;
        });

    })
}

$(document).ready(function() {

	cargar();
});