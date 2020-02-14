<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('loadmodal', 'TablaproductoController@modal');
Route::get('loadProducto', 'TablaproductoController@load');
Route::get('loadCategoria', 'CategoriaController@load');
Route::get('loadContactos', 'VistaContactoController@load');
Route::get('loadProvedors', 'ProveedorController@load');
Route::resource('InsertProducto','ProductoController');
Route::resource('Categoria','CategoriaController');
Route::resource('InsertProveedor','ProveedorController');
Route::resource('TablaProductos','TablaproductoController');
Route::resource('vistaComprador','VistaCompradorController');
Route::resource('vistaContacto','VistaContactoController');
Route::resource('principalComprador','VistaPrincipalCompradorController');
Route::resource('detalleComprador','DetalleCompradorController');
Route::resource('categoriaComprador','VistaCategoriaCompradorController');
Route::resource('totalProductos','VistaTotalProductos');
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
