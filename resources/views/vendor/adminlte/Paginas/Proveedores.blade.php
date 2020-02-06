@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<section>
    <form action="{{route('InsertProveedor.store')}}" method="post" id="form1">
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
            <button type="submit" class="btn btn-primary" id="guardarProvedor">Guardar</button>
        </div>
    </form>
</section>
<section>
    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
            <tr role="row">
                <th class="col-sm-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id Provedor</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nombre Porvedor</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Direccion Provedor</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Caracteristicas provedor</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Opciones</th>
                
            </tr>
        </thead>
        <tbody>
                @foreach ($ListaProvedor as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombreProvedor}}</td>
                    <td>{{$item->tlfProvedor}}</td>
                    <td>{{$item->Dirección}}</td>
                    <td>{{$item->caracteristicaProvedor}}</td>
                    <td>
                        <form action="{{ route('InsertProveedor.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger">Eliminar</button>
                        </form><a href="{{ route('InsertProveedor.edit',$item->id) }}"><button  type="submit" class="btn btn-danger">Editar</button></a>
                    </td>
                </tr>
                    @endforeach
            </tbody>
            <tfoot>
               
            </tfoot>

    </table>
    {{$ListaProvedor->render()}}
</section>
<script src="../js/jquery.js"></script>
<script src="../js/stv.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
