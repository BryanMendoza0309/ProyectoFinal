@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
<form method="post" enctype="multipart/form-data" id="form2">
    <input type="hidden" name="_token" id="token" value="{{csrf_token() }}">
</form>
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
            <tbody id="datoscatetdb">
                
            </tbody>
        </table>
    </div>
</div>





<section>
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Codigo del Producto" id="codigoProducto" name="codigo" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Nombre del Producto" id="nombreProducto"accept="" name="nombre" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Descripcion del Producto" name="descripcion" id="descipcionProducto" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Marca del Producto" id="marcaProducto"  name="marca" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Modelo del Producto" id="modeloProducto" name="modelo" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <div class="col-xs-6">
                        <input type="file" class="form-control" placeholder="imagen" id="imagenProducto" name="imagen" />
                    </div>
                    <br>
                    <br>
                    <div class="col-xs-6">
                        <label>Fecha de Caducidad:</label>
                        <div class="input-group date">
                            
                            <input type="date" class="form-control pull-right" id="fecha_caducidadProducto" name="fecha" autocomplete="off">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-xs-6">
                        <input type="text" class="form-control" placeholder="Cantidad de Producto" id="cantidadProducto" name="cantidad" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="text" class="col-xs-1" id="precioVentaPublico" name="precioP" placeholder="PvP">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="text" class="col-xs-1" id="precioAdministrador" name="precioA" placeholder="PvA">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                        <input type="text" class="col-xs-1" id="descuentoPublico" name="descuento" placeholder="Decuento">
                    </div>
                    <br>
                    <br>
                    <div class="col-xs-2">
                        <label>Seleccionar Categoria</label>
                        <select class="" name="Cate1">
                            
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="col-xs-2">
                        <label>Seleccionar Proveedor</label>
                        <select class="" name="proveedor2">
                            
                        </select>
                    </div>
                    <br>
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
<script  src="../js/producto.js" type="text/javascript"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
