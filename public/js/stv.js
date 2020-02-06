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
			$('#tabla').append("<tr><td>"+$('input[name=ubicacion]').val()+"</td><td>"+$('input[name=telefono]').val()+"</td><td>"+$('input[name=correoAdmin]').val()+"</td><td style='width: 8%'><form action='{{ route('vistaContacto.destroy',$item->id) }}' method='POST'>@csrf @method('DELETE') <button type='submit' class='btn btn-danger'>Eliminar</button></form><a style='text-decoration: none' href='{{  route('vistaContacto.edit',$item->id) }}'><button class='btn btn-danger'>Editar</button></a></td></tr>")
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


	$('#recargarCategoria').click(function(e){
		e.preventDefault();
		debugger
		var form=$(this);
		var ruta=form[0].form.action;
		var datos=new FormData($('#form1')[0]);
		var token=$('input[name=_token]').val();
		
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
			$('input[name=categoria]').val("");
			
                                       
           cargarDatosCategoria();
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
  			text: 'Something went wrong!',
 	 		footer: '<a href>Why do I have this issue?</a>'
			})		
		})
	})


$('#guardarProvedor').click(function(e){
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
			$('#tabla').append("<tr><td>"+$('input[name=ubicacion]').val()+"</td><td>"+$('input[name=telefono]').val()+"</td><td>"+$('input[name=correoAdmin]').val()+"</td><td style='width: 8%'><form action='{{ route('vistaContacto.destroy',$item->id) }}' method='POST'>@csrf @method('DELETE') <button type='submit' class='btn btn-danger'>Eliminar</button></form><a style='text-decoration: none' href='{{  route('vistaContacto.edit',$item->id) }}'><button class='btn btn-danger'>Editar</button></a></td></tr>")
			$('input[name=nombre]').val("");
			$('input[name=tlf]').val("");
			$('input[name=direccion]').val("");
			$('input[name=caracteristicas]').val("");

                                       
           cargarDatosProveedor();
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

})
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

	function cargarDatosCategoria(){
		debugger
		var ruta="http://127.0.0.1:8000/Categoria/";
	
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

	function cargarDatosProveedor(){
		debugger
		var ruta="http://127.0.0.1:8000/InsertProveedor/";
	
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