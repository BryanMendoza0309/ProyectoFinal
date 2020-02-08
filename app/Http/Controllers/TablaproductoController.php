<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;

class TablaproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria=Categoria::all();
        $producto=Producto::orderBy('id','asc')->where('eliminadolog','1')->paginate(3);
        return view('adminlte::Paginas.TablaProductos',compact('producto','categoria'));
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Tipo=Categoria::find($request->Cate1);
       $file=$request->file('imagen2');
       $name=$file->getClientMimeType();
       $tipoimg=str_replace('image/','.',$name);
       $TipoImagen=uniqid();
       $FileName=$Tipo->id.'/'.$TipoImagen.$tipoimg;
       $path=public_path().'/imagen/'.$Tipo->id;
       $file->move($path,$FileName); 
$tipo=Producto::find($request->id2);
$aux=$tipo->imagenProducto;
       unlink(public_path().'/imagen/'.$aux);
       
        
        $tipo->codigoProducto=$request->codigo;
        $tipo->nombreProducto=$request->nombre;
        $tipo->descipcionProducto=$request->descripcion;
        $tipo->marcaProducto=$request->marca;
        $tipo->modeloProducto=$request->modelo;
        
        $tipo->imagenProducto=$FileName;  
        $tipo->fecha_caducidadProducto=$request->fecha;
        $tipo->categoria_id=$request->Cate1;
        

        
        $tipo->save();
        return redirect()->action('ProductoController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=Categoria::all();
        $ProducEdit=Producto::find($id);
        return view('adminlte::Paginas.EditarProducto', compact('ProducEdit','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
