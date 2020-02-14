@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<h3 style="margin: 0% 20% 0% 25%">Ingreso de Provedor</h3>
    <form style="margin: 0% 20% 0% 20%"  method="post" enctype="multipart/form-data" id="form2">
        <input type="hidden" name="_token" id="token" value="{{csrf_token() }}">
        <div class="col-md-6">
            <input autocomplete="off" type="text" class="form-control" placeholder="Nombre del Proveedor" name="nombre" id="nombre">
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <input autocomplete="off" type="text" class="form-control" placeholder="Telefono del Proveedor" name="tlf" id="telefono">
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <input autocomplete="off" type="text" class="form-control" placeholder="Direccion del Proveedor" name="direccion" id="direccion">
        </div>
        <br>
        <br>
        <div class="col-md-6">
            <input autocomplete="off" type="text" class="form-control" placeholder="Caracteristicas del Proveedor" name="caracteristicas" id="caracteristicas">
        </div>
        <br>
        <br>
        <div class="col-xs-2">
            <a type="submit" class="btn btn-primary" id="guardarProvedor">Guardar</a>
        </div>
    </form>


    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
        <thead>
            <tr role="row">
                <th class="col-sm-1" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">#</th>
                
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nombre Porvedor</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Telefono</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Direccion Provedor</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Caracteristicas provedor</th>
                <th class="col-sm-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Opciones</th>
                
            </tr>
        </thead>
        <tbody id="tablaprovedor">
                
            </tbody>
            <tfoot>
               
            </tfoot>

    </table>


<section>
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Provedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="idprovedor" id="idprovedor">
                    <div class="col-md-6">
                        <input type="text" id="nombremdl" class="form-control" name="nombremodal">
                    </div>
                    <br>
                    <br>
                    <div class="col-md-6">
                        <input type="text" id="telefonomdl" class="form-control"  name="ubicacion">
                    </div>
                    <br>
                    <br>

                    <div class="col-md-6">
                        <input type="text" id="ubicacionmdl" class="form-control" placeholder="Ubicacion" name="ubicacionmdl">
                    </div>
                    <br>
                    <br>
                    <div class="col-md-6">
                        <input type="text" id="caracteristicasmdl" class="form-control" placeholder="Nombre" name="caracteristicasmdl">
                    </div>
                    <br>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <a type="button" id="actualizarprove" class="btn btn-primary">Guardar</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="../js/jquery.js" type="text/javascript"></script>
<script  src="../js/Provedor.js" type="text/javascript"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
