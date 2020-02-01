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
        $proveedor=Provedor::all();
        $categoria=CategoriaProducto::all();
        return view('adminlte::Paginas.Productos',compact('proveedor','categoria'));
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

        $cont=1;
        $stock=Stock::all();
        foreach ($stock as $item) {
            $cont++;
        }
        $tipo2=new Stock();
        $tipo=new Producto();
        $tipo->codigoProducto=$request->codigo;
        $tipo->nombreProducto=$request->nombre;
        $tipo->descipcionProducto=$request->descripcion;
        $tipo->marcaProducto=$request->marca;
        $tipo->modeloProducto=$request->modelo;
        $tipo->imagenProducto='imagen';  
        $tipo->fecha_caducidadProducto=$request->fecha;
        $tipo->categoriaproducto_id=$request->Cate1;
        $tipo2->cantidadProducto=$request->cantidad;
        $tipo2->precioVentaPublico=$request->precioP;
        $tipo2->precioAdministrador=$request->precioA;
        $tipo2->descuentoPublico=$request->descuento;
        $tipo2->gananciaUnidad=(($request->precioP-($request->descuento))-($request->precioA));
        $tipo2->gananciaTotal=($request->cantidad*(($request->precioP-($request->descuento))-($request->precioA)));
                $tipo2->totalVentas='1';
        $tipo2->provedor_id=$request->proveedor2;
        $tipo->stock_id=$cont;
        $tipo2->totalProductosVentas='1';
        $tipo2->save();
        $tipo->save();
        $proveedor=Provedor::all();
        $categoria=CategoriaProducto::all();
        return view('adminlte::Paginas.Productos',compact('proveedor','categoria')); 
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
        //
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
