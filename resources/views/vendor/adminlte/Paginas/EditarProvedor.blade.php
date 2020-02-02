@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<section>
    <form action="{{ route('InsertProveedor.update',$provedoredit->id) }}" method="post">
        @method ('PATCH')
            @csrf
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="{{$provedoredit->nombreProvedor}}" name="nombre">
        </div>
        <br>
        <br>
        <div class="col-md-4">
            <input type="text" class="form-control" placeholder="{{$provedoredit->tlfProvedor}}" name="tlf">
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="{{$provedoredit->Dirección}}" name="direccion">
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="{{$provedoredit->caracteristicaProvedor}}" name="caracteristicas">
        </div>
        <br>
        <br>
        <div class="col-xs-2">
            <button type="submit" class="btn btn-primary">editar</button>
        </div>
    </form>
</section>
@endsection