function cargar() {


        var datosTabla = $('#datoscatetdb');
        var ruta = 'http://127.0.0.1:8000/loadProducto';
        $('#datoscatetdb').empty();

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
function modal() {
     
        var ruta = 'http://127.0.0.1:8000/loadmodal';
        var liscate=$('#Cate1');
        var lisprove=$('#proveedor2');
        
        $.get(ruta, function(res) {
            
            $(res[1]).each(function(key, item) {
              
                    liscate.append('<option value="'+item.id+'">'+item.nombreTipoProducto+'</option>');
            });
            $(res[0]).each(function(key, item) {
               
                    lisprove.append('<option value="'+item.id+'">'+item.nombreProvedor+'</option>');
            });
        })

}
function uniqid() {
    var ts=String(new Date().getTime()), i = 0, out = '';
    for(i=0;i<ts.length;i+=2) {        
       out+=Number(ts.substr(i, 2)).toString(36);    
    }
    return ('d'+out);
}
$(document).ready(function() {
   cargar();

   $('#actualizarcontac').click(function() {
    debugger
    var form=$(this);
    
    var datos = new FormData($('#formulario-envia')[0]);
        // var value = $('#id').val();
        var route = 'http://127.0.0.1:8000/TablaProductos';
     var token = $('#token').val();
        // var aux= document.getElementById('imagen').files[0];
        // var name = document.getElementById('imagen').files[0].type;
        // var res = name.replace('image/','.',name);
        // var codImage=uniqid();
        // var fileInput= $('#Cate1').val()+'/'+codImage+res;
       
        // var request = {

        //     codigo: $('#codigo').val(),
        //     nombre: $('#nombre').val(),
        //     descripcion: $('#descripcion').val(),
        //     marca: $('#marca').val(),
        //     modelo: $('#modelo').val(),
            
        //     fecha: $('#fecha').val(),
        //     Cate1: $('#Cate1').val(),
           
        //     cantidad: $('#cantidad').val(),
        //     precioP: $('#precioP').val(),
        //     precioA: $('#precioA').val(),
        //     descuento: $('#descuento').val(),
        //     proveedor2: $('#proveedor2').val()
        // }
        $.ajax({
            url: route,
                headers: { 'X-CSRF-TOKEN': token },
                type: 'POST',
                dataType: 'json',
                contentType: false,
            processData: false,
                data: datos,
           
            
        })
        .done(function(data) {
         
        $('#exampleModal').modal('toggle');
            cargar();
            Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Datos Guardados',
            showConfirmButton: false,
            timer: 1500
            })
        })

        .fail(function(error){
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Erro al Guardar los Datos!',
            })      
        })


    });

});

function Mostrar(btn) {
    modal();debugger
    var route = 'http://127.0.0.1:8000/TablaProductos/' + btn.value + '/edit';
    $.get(route, function(res) {
debugger
        $('#id').val(res.id);
    })
}

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