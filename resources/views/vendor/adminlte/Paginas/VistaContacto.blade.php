@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')

<form action="{{route('vistaContacto.store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token() }}">
    <div class="col-xs-6">
        <input type="text" class="form-control" placeholder="Codigo del Producto" name="ubicacion" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Nombre del Producto" name="telefono" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Descripcion del Producto" name="correoAdmin" autocomplete="off">
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
        <input type="file" class="form-control" placeholder="imagen" name="imagen" />
    </div>
    <br>
    <br>
    <div class="col-xs-6">
        <input type="text" class="form-control" placeholder="Cantidad de Producto" name="cantidad" autocomplete="off">
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
    <br>
    <br>
    <br>
    <br>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
        <input type="text" class="col-xs-1" name="precioP" placeholder="PvP">
    </div>
    <br>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
        <input type="text" class="col-xs-1" name="precioA" placeholder="PvA">
    </div>
    <br>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
        <input type="text" class="col-xs-1" name="descuento" placeholder="Decuento">
    </div>
    <br>


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
        <br>

    <div class="col-xs-2">
        <label>Seleccionar Proveedor</label>
        <select class="" name="proveedor2">
            @foreach($proveedor as $item)
            <option value="{{$item->id}}">{{$item->nombreProvedor}}</option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="col-xs-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@endsection

