@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')

        <div class="row">
            <div class="col-md-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                        <tr role="row">
                            <th class="col-sm-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Codigo del Producto</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nombre del Producto</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Descripcion del Producto</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Marca del Producto</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Modelo del Producto</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Fecha de Caducidad</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Imagen</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Cantidad</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">PvP</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">PvA</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Descuento</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"> Total de Ventas</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Numero Total de Ventas</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Proveedor</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">categoria</th>
                            <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($producto as $item)
                        <tr role="row" class="odd">
                            <td>{{$item->id}}</td>
                            <td>{{$item->codigoProducto}}</td>
                            <td>{{$item->nombreProducto}}</td>
                            <td>{{$item->descipcionProducto}}</td>
                            <td>{{$item->marcaProducto}}</td>
                            <td>{{$item->modeloProducto}}</td>
                            <td>{{$item->fecha_caducidadProducto}}</td>
                            <td><img width= 100%; height= 5%; src="imagen\{{$item->imagenProducto}}" alt=""></td>
                            <td>{{$item->stock->cantidadProducto}}</td>
                            <td>{{$item->stock->precioVentaPublico}}</td> 
                            <td>{{$item->stock->precioAdministrador}}</td>
                            <td>{{$item->stock->descuentoPublico}}</td>
                            <td>{{$item->stock->totalVentas}}</td>
                            <td>{{$item->stock->totalProductosVentas}}</td>
                            <td>{{$item->stock->provedor->nombreProvedor}}</td>
                            <td>{{$item->categoria->nombreTipoProducto}}</td>

                            <td>
                        <form action="{{ route('TablaProductos.destroy',$item->id) }}" method="POST">
                          
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form><a href="{{ route('TablaProductos.edit',$item->id) }}">Editar</a>
                    </td><tr>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        {{$producto->render()}}
    
@endsection
