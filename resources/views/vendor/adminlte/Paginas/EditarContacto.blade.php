@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<form action="{{ route('vistaContacto.update',$contacto->id) }}" method="post">
        @method ('PATCH')
        @csrf
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="{{$contacto->ubicacion}}" name="ubicacion">
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="{{$contacto->telefono}}" name="telefono">
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="{{$contacto->correoAdmin}}" name="correoAdmin">
        </div>
        <br>
        <br>
        
        <div class="col-xs-2">
            <button type="submit" class="btn btn-primary">editar</button>
        </div>
    </form>

	
@endsection