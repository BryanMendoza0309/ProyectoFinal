@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<div class="col-md-12">
<form action="{{route('vistaContacto.store')}}" method="post" enctype="multipart/form-data" id="form1">
    <input type="hidden" name="_token" value="{{csrf_token() }}">
    <div class="col-xs-6">
        <input type="text" class="form-control" placeholder="Ubicacion" name="ubicacion" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Telefono" name="telefono" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Correo del Administrador" name="correoAdmin" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-xs-2">
        <button type="submit" class="btn btn-primary" id="recargar">Guardar</button>
    </div>
</form>

<table  class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" id="tabla">
        <thead>
            <tr role="row">
                <th class="col-sm-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ubicacion</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Telefono</th> 
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Correo del Administrador</th> 
            </tr>
        </thead>
        <tbody>
                @foreach ($contacto as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->ubicacion}}</td>
                    <td>{{$item->telefono}}</td>
                    <td>{{$item->correoAdmin}}</td>
                    <td style="width: 8%">
                        <form action="{{ route('vistaContacto.destroy',$item->id) }}" method="POST">
                          
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form><a style="text-decoration: none" href="{{  route('vistaContacto.edit',$item->id) }}"><button class="btn btn-danger">Editar</button></a>
                    </td>
                </tr>
                    @endforeach
            </tbody>
             
    
    </table>
</div> 
<script src="../js/jquery.js"></script>
<script src="../js/stv.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection

