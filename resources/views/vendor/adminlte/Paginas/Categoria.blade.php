@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<form  method="POST" id="form1">
		<input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
		<div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Ingrese Categoria" id="categoria" name=" categoria" autocomplete="off">
        </div>
        <div class="col-xs-2">
        	<a type="submit" class="btn btn-primary" id="recargarCategoria">Guardar</a>
        </div>
	</form>

	<section>
	<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" id="tabla">
        <thead>
            <tr role="row">
                <th class="col-sm-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Id Tipo Producto</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nombre Tipo Producto</th> 
            </tr>
        </thead>
        <tbody>
             
        </tbody>
            

    </table>
    
	</section>

    <section>
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Contacto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idcontacto" id="id">
                    <div class="col-md-6">
                        <input type="text" id="ubicacion" class="form-control" placeholder="Ubicacion" name="ubicacion">
                    </div>
                    <br>
                    <br>
                    <div class="col-md-6">
                        <input type="text" id="telefono" class="form-control" placeholder="Telefono" name="telefono">
                    </div>
                    <br>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <a type="button" id="actualizarcontac" class="btn btn-primary">Guardar</a>
                </div>
            </div>
        </div>
    </div>
</section>
    <script src="../js/jquery.js"></script>
<script src="../js/stv.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

@endsection