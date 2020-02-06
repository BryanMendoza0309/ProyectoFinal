@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<form action="{{route('TablaProductos.store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token() }}">
    
    <div class="col-xs-2">
        <label>Id Categoria</label>
        <select class="" name="id2">
            
            <option value="{{$ProducEdit->id}}">{{$ProducEdit->id}}</option>

        </select>
    </div>
    <br>
    <br>
    <div class="col-xs-6">
        <input type="text" class="form-control" placeholder="Codigo del Producto" name="codigo" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Nombre del Producto" name="nombre" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Descripcion del Producto" name="descripcion" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-xs-6">
        <input type="text" class="form-control" placeholder="Marca del Producto" name="marca" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-xs-6">
        <input type="text" class="form-control" placeholder="Modelo del Producto" name="modelo" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-xs-6">
        <input type="file" class="form-control" placeholder="imagen2" name="imagen2" />
    </div>
    <br>
    <br>
    <div class="col-xs-6">
        <label>Fecha de Caducidad:</label>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="date" class="form-control pull-right" id="datepicker" name="fecha" autocomplete="off">
        </div>
        <!-- /.input group -->
    </div>
    <div class="col-xs-2">
        <label>Seleccionar Categoria</label>
        <select class="" name="Cate1">
            @foreach($categoria as $item)
            <option value="{{$item->id}}">{{$item->nombreTipoProducto}}</option>
            @endforeach
        </select>
    </div>
    <br>
    <br>
    <div class="col-xs-2">
        <button type="submit" class="btn btn-primary">editar</button>
    </div>
    <br>
    <br>
</form>
@endsection
