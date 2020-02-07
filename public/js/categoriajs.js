function cargar() {
    var datosTabla = $('#datoscatetdb');
    var ruta = 'http://127.0.0.1:8000/loadCategoria';
    $('#datoscatetdb').empty();
    $.get(ruta, function(res) {

        $(res).each(function(key, valor) {

            if (valor.eliminadolog == 1)
                datosTabla.append("<tr><td>" + valor.id + "</td><td>" + valor.nombreTipoProducto + '</td><td style="width: 8%"><button OnClick="Eliminar(this);" value="' + valor.id + '" type="submit" class="btn btn-danger"> Eliminar</button><button OnClick="Mostrar(this);" style="text-decoration: none" data-toggle="modal" href="#" data-target="#exampleModal" class="btn btn-danger" value="' + valor.id + '" >Editar</button></td></tr>')
        });
    })
}
$(document).ready(function() {
    cargar();
    $('#regiscate').click(function() {

        var request = {
            categoria: $('#categoria').val(),
        }
        var token = $('#token').val();
        var route = 'http://127.0.0.1:8000/Categoria';
        $.ajax({
                url: route,
                headers: { 'X-CSRF-TOKEN': token },
                type: 'POST',
                dataType: 'json',
                data: request,
            })
            .done(function(data) {
              $('#categoria').val("");
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
    $('#actualizarcate').click(function() {
        var value = $('#id').val();
        var route = 'http://127.0.0.1:8000/Categoria/'+value;
        var token = $('#token').val();
        var request = {
            categoria: $('#categoriamdl').val(),
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
    var route = 'http://127.0.0.1:8000/Categoria/' + btn.value + '/edit';
    $.get(route, function(res) {
        $('#categoriamdl').val(res.nombreTipoProducto);

        $('#id').val(res.id);
    })
}

function Eliminar(btn) {
    var route = 'http://127.0.0.1:8000/Categoria/'+btn.value+'';
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

