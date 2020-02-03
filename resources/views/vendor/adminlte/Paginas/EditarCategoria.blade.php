@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<form action="{{ route('Categoria.update',$categoriaetid->id) }}" method="post">
        @method ('PATCH')
            @csrf
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="{{$categoriaetid->nombreTipoProducto}}" name="categoria">
        </div>
        <br>
        <br>
        
        <div class="col-xs-2">
            <button type="submit" class="btn btn-primary">editar</button>
        </div>
    </form>

	
@endsection