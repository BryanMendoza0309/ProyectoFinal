var row;
$(document).ready(function(){
	$('#recargar').click(function(e){
		e.preventDefault();
		var form=$(this);
		var ruta=form[0].form.action;
		var datos=new FormData($('#form1')[0]);
		
		var token=$('#token').val();
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
			aux2="<tr><td>"+data.id+"</td><td>"+$('input[name=ubicacion]').val()+"</td><td>"+$('input[name=telefono]').val()+"</td><td>"+$('input[name=correoAdmin]').val()+'</td><td style="width: 8%"><form method="POST">'+ "@csrf @method('DELETE')"+' <button OnClick="Eliminar(this);" value="'+data.id+'" type="submit" class="btn btn-danger"> Eliminar</button></form><a style="text-decoration: none" data-toggle="modal" href="#" data-target="#exampleModal" class="btn btn-danger">Editar</a></td></tr>';
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
			 $('[data-id]').off();
			$('[data-id]').click(function(){     
        row= $(this).parents("tr");
        var ruta2="http://127.0.0.1:8000/eliminarcontacto/"+$(this).parents("tr").find("td").eq(0).html();

		$.ajax({
			url: ruta2,
			headers:{'X-CSRF-TOKEN': token},
			type: 'DELETE',
			dataType: 'json',
			contentType:false,
			processData:false,
			data: datos,

		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})	
        debugger
        })



		})

		.fail(function(error) {
			Swal.fire({
  		icon: 'error',
  		title: 'Oops...',
  		text: 'Error al Ingresar los Datos!',
			})
		})
	})

	$('#btnEliminar').click(function(e){
		debugger    
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
  			text: 'Erro al Guardar los Datos!',
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

		.fail(function(error){
			Swal.fire({
  			icon: 'error',
  			title: 'Oops...',
  			text: 'Erro al Guardar los Datos!',
 	 		
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