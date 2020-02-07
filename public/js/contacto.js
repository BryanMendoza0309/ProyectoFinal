function cargar(){
		var datosTabla=$('#datostdb');
	var ruta='http://127.0.0.1:8000/loadContactos';
	$('#datostdb').empty();
	$.get(ruta,function(res){
		$(res).each(function(key,valor) {
			 
			 if(valor.eliminadolog==1)
			datosTabla.append("<tr><td>"+valor.id+"</td><td>"+valor.ubicacion+"</td><td>"+valor.telefono+"</td><td>"+valor.correoAdmin+'</td><td style="width: 8%"><button OnClick="Eliminar(this);" value="'+valor.id+'" type="submit" class="btn btn-danger"> Eliminar</button><button OnClick="Mostrar(this);" style="text-decoration: none" data-toggle="modal" href="#" data-target="#exampleModal" class="btn btn-danger" value="'+valor.id+'" >Editar</button></td></tr>')
		});
	})

	}
$(document).ready(function() {
    cargar();
    $('#registrar').click(function() {
    	var request = {
            ubicacion: $('#ubicacionfm').val(),
            telefono: $('#telefonofm').val(),
            correoAdmin: $('#correoadminfm').val()
        }
        var token = $('#token').val();
        var route='http://127.0.0.1:8000/vistaContacto';

         debugger
        $.ajax({
            url: route,
            headers: { 'X-CSRF-TOKEN': token },
            type: 'POST',
            dataType: 'json',
            data: request,
        })
    });


    $('#actualizarcontac').click(function() {
        var value = $('#id').val();
        var route = 'http://127.0.0.1:8000/vistaContacto/' + value;
        var token = $('#token').val();
        var request = {
            ubicacion: $('#ubicacion').val(),
            telefono: $('#telefono').val(),
            correoAdmin: $('#correoadmin').val()
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
    var route = 'http://127.0.0.1:8000/vistaContacto/' + btn.value + '/edit';
    $.get(route, function(res) {
        $('#ubicacion').val(res.ubicacion);

        $('#telefono').val(res.telefono);

        $('#correoadmin').val(res.correoAdmin);

        $('#id').val(res.id);

    })
}


function Eliminar(btn) {
    var route = 'http://127.0.0.1:8000/vistaContacto/'+btn.value+'';
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
