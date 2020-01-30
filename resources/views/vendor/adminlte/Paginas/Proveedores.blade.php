@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<form action="{{route('InsertProveedor.store')}}" method="post">
		<input type="hidden" name="_token" value="{{csrf_token() }}">
		<div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Nombre del Proveedor" name="nombre">
        </div>
        <br>
        <br>
        <div class="col-md-4">
                  <input type="text" class="form-control" placeholder="Telefono del Proveedor" name="tlf">
        </div>
		<br>
        <br>
        <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Direccion del Proveedor" name="direccion">
        </div>
        <br>
        <br>
        <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Caracteristicas del Proveedor" name="caracteristicas">
        </div>
		<br>
        <br>
        <div class="col-xs-2">
        	<button type="submit" class="btn btn-primary">Guardar</button>
        </div>
	</form>
@endsection
