$(document).ready(function(){
	$('#recargar').click(function(e){
		e.preventDefault();
		var form=$(this);
		var ruta=form[0].form.action;
		var datos=new FormData($('#form1')[0]);
		var token=$('input[name=_token]').val();
		debugger
		$.ajax({
			url: ruta,
			headers:{'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			contentType:false,
			processData:false,
			data: datos,
		})
		.done(function(data) {
			debugger
			var aux='@csrf @method('+"'DELETE'"+')';
			aux2="<tr><td>"+data.id+"</td><td>"+$('input[name=ubicacion]').val()+"</td><td>"+$('input[name=telefono]').val()+"</td><td>"+$('input[name=correoAdmin]').val()+'</td><td style="width: 8%"><form action='+'"{{route('+"'vistaContacto.destroy',"+data.id+') }}"'+'  method="POST">'+aux+' <button type="submit" class="btn btn-danger">Eliminar</button></form><a style="text-decoration: none" href="http://127.0.0.1:8000/vistaContacto/'+data.id+'/edit"><button class="btn btn-danger">Editar</button></a></td></tr>';
			$('#tabla').append(aux2);
			$('input[name=ubicacion]').val("");
			$('input[name=telefono]').val("");
			$('input[name=correoAdmin]').val("");
                                       
           cargarDatos();
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
  text: 'Something went wrong!',
  footer: '<a href>Why do I have this issue?</a>'
})
		})
	})
});
function cargarDatos(){
		debugger
		var ruta="http://127.0.0.1:8000/vistaContacto/";
	
		$.ajax({
			url: ruta,
			type: 'GET',
			dataType:' json',

		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})

		
	}