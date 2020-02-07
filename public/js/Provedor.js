function cargar() {
    var datosTabla = $('#tablaprovedor');
    var ruta = 'http://127.0.0.1:8000/loadProvedors';
    $('#tablaprovedor').empty();
    $.get(ruta, function(res) {
        $(res).each(function(key, valor) {
            if (valor.eliminadolog == 1)
                datosTabla.append("<tr><td>" + valor.id + "</td><td>" + valor.nombreProvedor + "</td><td>" + valor.tlfProvedor + "</td><td>" + valor.direccion + "</td><td>" + valor.caracteristicaProvedor + '</td><td style="width: 8%"><button OnClick="Eliminar(this);" value="' + valor.id + '" type="submit" class="btn btn-danger"> Eliminar</button><button OnClick="Mostrar(this);" style="text-decoration: none" data-toggle="modal" href="#" data-target="#exampleModal" class="btn btn-danger" value="' + valor.id + '" >Editar</button></td></tr>')
        });
    })
}

$(document).ready(function() {
    cargar();
    $('#guardarProvedor').click(function() {
        var request = {
            nombreProvedor: $('#nombre').val(),
            tlfProvedor: $('#telefono').val(),
            direccion: $('#direccion').val(),
            caracteristicaProvedor: $('#caracteristicas').val()
        }
        var token = $('#token').val();
        var route = 'http://127.0.0.1:8000/InsertProveedor';
        $.ajax({

                url: route,
                headers: { 'X-CSRF-TOKEN': token },
                type: 'POST',
                dataType: 'json',
                data: request,
            })
            .done(function(data) {
                cargar();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Datos Guardados',
                    showConfirmButton: false,
                    timer: 1500
                })
            })

            .fail(function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Erro al Guardar los Datos!',
                })
            })

    });

    $('#actualizarprove').click(function() {
        var value = $('#idprovedor').val();
        var route = 'http://127.0.0.1:8000/InsertProveedor/'+value;
        var token = $('#token').val();
        var request = {
            nombreProvedor: $('#nombremdl').val(),
            tlfProvedor: $('#telefonomdl').val(),
            direccion: $('#ubicacionmdl').val(),
            caracteristicaProvedor: $('#caracteristicasmdl').val()
        }
        
        $.ajax({
                url: route,
                headers: { 'X-CSRF-TOKEN': token },
                type: 'PUT',
                dataType: 'json',
                data: request,

            })
            .done(function(data) {
                cargar();
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Datos Guardados',
                    showConfirmButton: false,
                    timer: 1500
                })
            })
            .fail(function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Erro al Guardar los Datos!',
                })
            })
    });
});

function Mostrar(btn) {
          
    var route = 'http://127.0.0.1:8000/InsertProveedor/'+btn.value+'/edit';
    $.get(route, function(res) {
        $('#nombremdl').val(res.nombreProvedor);

        $('#telefonomdl').val(res.tlfProvedor);

        $('#ubicacionmdl').val(res.direccion);
        $('#caracteristicasmdl').val(res.caracteristicaProvedor);

        $('#idprovedor').val(res.id);

    })
}
function Eliminar(btn) {
    var route = 'http://127.0.0.1:8000/InsertProveedor/'+btn.value+'';
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