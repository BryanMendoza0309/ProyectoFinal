<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Stock;
use App\Provedor;
use App\CategoriaProducto;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $ListaProducto=Producto::all()->where('eliminadolog','1');
        $proveedor=Provedor::all();
        $categoria=CategoriaProducto::all();
        return view('adminlte::Paginas.Productos',compact('proveedor','categoria','ListaProducto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Tipo=CategoriaProducto::find($request->Cate1);
        $file=$request->file('imagen');
       $name=$file->getClientMimeType();
       $tipoimg=str_replace('image/','.',$name);
       $TipoImagen=uniqid();
       $FileName=$Tipo->id.'/'.$TipoImagen.$tipoimg;
       $path=public_path().'/imagen/'.$Tipo->id;
       $file->move($path,$FileName);

        $cont=1;
        $stock2=Stock::all();
        foreach ($stock2 as $item) {
            $cont++;
        }
        $tipo2=new Stock();
        $tipo=new Producto();
        $tipo->codigoProducto=$request->codigo;
        $tipo->nombreProducto=$request->nombre;
        $tipo->descipcionProducto=$request->descripcion;
        $tipo->marcaProducto=$request->marca;
        $tipo->modeloProducto=$request->modelo;
        $tipo->eliminadolog=true;
        $tipo->imagenProducto=$FileName;  
        $tipo->fecha_caducidadProducto=$request->fecha;
        $tipo->categoriaproducto_id=$request->Cate1;
        $tipo2->cantidadProducto=$request->cantidad;
        $tipo2->precioVentaPublico=$request->precioP;
        $tipo2->precioAdministrador=$request->precioA;
        $tipo2->eliminadolog=true;
        $tipo2->descuentoPublico=$request->descuento/100;
        $tipo2->gananciaUnidad=($tipo2->precioVentaPublico-($tipo2->precioVentaPublico*$tipo2->descuentoPublico)-$tipo2->precioAdministrador);
        $tipo2->gananciaTotal=($request->cantidad*$tipo2->gananciaUnidad);
                $tipo2->totalVentas='0';
        $tipo2->provedor_id=$request->proveedor2;
        $tipo->stock_id=$cont;
        $tipo2->totalProductosVentas='0';
        $tipo2->save();
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
        //
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
       $ListaProducto=Producto::find($id);
       $stock=Stock::find($id);
        $ListaProducto->eliminadolog=false;
        $stock->eliminadolog=false;
        return redirect()->action('ProductoController@index');
    }
}
