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

	<section>
	<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
            <tr role="row">
                <th class="col-sm-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id Tipo Producto</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nombre Tipo Producto</th> 
            </tr>
        </thead>
        <tbody>
                @foreach ($categoria as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombreTipoProducto}}</td>
                    
                    <td>
                        <form action="{{ route('Categoria.destroy',$item->id) }}" method="POST">
                          
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form><a href="{{ route('Categoria.edit',$item->id) }}">Editar</a>
                    </td><tr>
                    @endforeach
            </tbody>
            

    </table>
    {{$categoria->render()}}	
	</section>
@endsection