@extends('adminlte::layouts.app')

@section('main-content')
<content  >
    <h3 style="margin: 0% 20% 0% 40%">Ingreso de Productos</h3>
<form  action="{{route('InsertProducto.store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token() }}">
    <div style="margin: 3% 20% 0% 20%" >
        <input  type="text" class="form-control" placeholder="Codigo del Producto" name="codigo" autocomplete="off">
    </div>

    <div style="margin: 1% 20% 0% 20%" >
        <input  type="text" class="form-control" placeholder="Nombre del Producto" name="nombre" autocomplete="off">
    </div>

    <div style="margin: 1% 20% 0% 20%">
        <input type="text" class="form-control" placeholder="Descripcion del Producto" name="descripcion" autocomplete="off">
    </div>

    <div style="margin: 1% 20% 0% 20%">
        <input type="text" class="form-control" placeholder="Marca del Producto" name="marca" autocomplete="off">
    </div>

    <div style="margin: 1% 20% 0% 20%">
        <input type="text" class="form-control" placeholder="Modelo del Producto" name="modelo" autocomplete="off">
    </div>
  
    <div style="margin: 1% 20% 0% 20%" >
        <input type="file" class="form-control" placeholder="imagen" name="imagen" />
    </div>
    <div style="margin: 1% 20% 0% 20%" >
        <label>Fecha de Caducidad:</label>
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="date" class="form-control pull-right" id="datepicker" name="fecha" autocomplete="off">
        </div>
        <!-- /.input group -->
    </div>

    <div style="margin: 1% 20% 0% 20%">
        <input type="text" class="form-control" placeholder="Cantidad de Producto" name="cantidad" autocomplete="off">
    </div >

    <div  style="margin: 1% 20% 0% 20%" class="input-group">
        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
        <input type="text" class="col-xs-3" name="precioP" placeholder="PvP">
    </div>

    <div style="margin: 1% 20% 0% 20%" class="input-group">
        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
        <input type="text" class="col-xs-3" name="precioA" placeholder="PvA">
    </div>

    <div style="margin: 1% 20% 0% 20%" class="input-group">
        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
        <input type="text" class="col-xs-3" name="descuento" placeholder="Decuento">
    </div>

    <div style="margin: 1% 20% 0% 20%" >
        <label>Seleccionar Categoria</label>
        <select class="" name="Cate1">
            @foreach($categoria as $item)
            <option value="{{$item->id}}">{{$item->nombreTipoProducto}}</option>
            @endforeach
        </select>
    </div>
        <br>
        <br>

    <div style="margin: 1% 20% 0% 20%" >
        <label>Seleccionar Proveedor</label>
        <select class="" name="proveedor2">
            @foreach($proveedor as $item)
            <option value="{{$item->id}}">{{$item->nombreProvedor}}</option>
            @endforeach
        </select>
    </div>

    <div style="margin: 1% 20% 0% 20%" >
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>


</content>
@endsection
