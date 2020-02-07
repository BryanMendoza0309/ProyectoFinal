@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<div class="col-md-12">
<form action="{{route('vistaContacto.store')}}" method="post" enctype="multipart/form-data" id="form1">
    <input type="hidden" name="_token" value="{{csrf_token() }}" id="token">
    <div class="col-xs-6">
        <input type="text" class="form-control" placeholder="Ubicacion" id="ubicacionfm" name="ubicacionfm" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Telefono" id="telefonofm" name="telefonofm" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Correo del Administradorlb" id="correoadminfm" name="correoadminfm" autocomplete="off">
    </div>
    <br>
    <br>
    <div class="col-xs-2">
        <a type="submit" class="btn btn-primary" id="registrar">Registrar</a>
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
        <tbody id="datostdb">
                
            </tbody>
             
    
    </table>

    

</div><section>
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
        <input type="hidden" name="idcontacto"  id="id">
        <div class="col-md-6">
            <input type="text" id="ubicacion" class="form-control" placeholder="Ubicacion" name="ubicacion">
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <input type="text" id="telefono"class="form-control" placeholder="Telefono" name="telefono">
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <input type="text" id="correoadmin" class="form-control" placeholder="Nombre" name="correoAdmin">
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
</div></section>

<script src="../js/jquery.js"></script>
<script src="../js/contacto.js"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection

