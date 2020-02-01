@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<form action="{{route('Categoria.store')}}" method="post">
		<input type="hidden" name="_token" value="{{csrf_token() }}">
		<div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Ingrese Categoria" name="Categoria" autocomplete="off">
        </div>
        <div class="col-xs-2">
        	<button type="submit" class="btn btn-primary">Guardar</button>
        </div>
	</form>
@endsection