<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Provedor;
use App\Stock;
use Illuminate\Support\Facades\DB;
class TablaproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function load(Request $request)
    {
        $product=DB::table('stocks')
        ->join('productos','stocks.id','=','productos.stock_id')
        ->join('provedors','provedors.id','=','stocks.provedor_id')
        ->join('categorias','categorias.id','=','productos.categoria_id')
        ->select('productos.id','productos.codigoProducto','productos.nombreProducto','productos.descipcionProducto','productos.marcaProducto','productos.modeloProducto','productos.fecha_caducidadProducto','productos.imagenProducto','productos.eliminadolog','stocks.cantidadProducto','stocks.precioVentaPublico','stocks.precioAdministrador','stocks.descuentoPublico','stocks.totalVentas','stocks.totalProductosVentas','provedors.nombreProvedor','categorias.nombreTipoProducto')->get();
        //$producto);
      //  $pro=$producto->stock;
        if ($request->ajax()) {
                  return response()->json($product->toArray());
         }else{
              return view('adminlte::Paginas.TablaProductos',compact('product'));;
         }
        
        
    }


    public function modal(Request $request)
    {


$categoria = DB::table('categorias')->select('categorias.*')->where('eliminadolog', '=', true)->get();
//$categoria = DB::table('categorias')->select('eliminadolog')->take(true)->get();
       $provedor = DB::table('provedors')->select('provedors.*')->where('eliminadolog', '=', true)->get();
       
        $lista=array(
            $provedor->toArray(),
            $categoria->toArray()
            
        );
 return response()->json($lista);  
        if ($request->ajax()) {
            return response()->json($lista->toArray());     
         }else{
              return view('adminlte::Paginas.TablaProductos',compact('lista'));;
         }
            
    }

     public function index(Request $request)
     {
          $product=DB::table('stocks')
        ->join('productos','stocks.id','=','productos.stock_id')
        ->select('stocks.*','productos.*')->get();
        //$producto);
      //  $pro=$producto->stock;
        if ($request->ajax()) {
                  return response()->json($product->toArray());
         }else{
              return view('adminlte::Paginas.TablaProductos',compact('product'));;
         }
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
        if($request->ajax()){
$Tipo=Categoria::find($request->Cate1);
     
        
    $file=$request->file('imagen');
       $name=$file->getClientMimeType();
       $tipoimg=str_replace('image/','.',$name);
       $TipoImagen=uniqid();
       $FileName=$Tipo->id.'/'.$TipoImagen.$tipoimg;
       $path=public_path().'/imagen/'.$Tipo->id;
       $file->move($path,$FileName);

        $tipo= Producto::find($request->id);
        $aux=$tipo->imagenProducto;
        unlink(public_path().'/imagen/'.$aux);
        $tipo2= Stock::find($request->id);
        
        $tipo->codigoProducto=$request->codigo;
        $tipo->nombreProducto=$request->nombre;
        $tipo->descipcionProducto=$request->descripcion;
        $tipo->marcaProducto=$request->marca;
        $tipo->modeloProducto=$request->modelo;
        $tipo->imagenProducto=$FileName;  
        $tipo->fecha_caducidadProducto=$request->fecha;
        $tipo->categoria_id=$request->Cate1;
        $tipo2->cantidadProducto=$request->cantidad;
        $tipo2->precioVentaPublico=$request->precioP;
        $tipo2->precioAdministrador=$request->precioA;
        $tipo2->descuentoPublico=$request->descuento/100;
        $tipo2->gananciaUnidad=($tipo2->precioVentaPublico-($tipo2->precioVentaPublico*$tipo2->descuentoPublico)-$tipo2->precioAdministrador);
        $tipo2->gananciaTotal=($request->cantidad*$tipo2->gananciaUnidad);
        $tipo2->provedor_id=$request->proveedor2;
        $tipo2->save();
        $tipo->save();
         return response()->json($request);
         }
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
        $producto=Producto::find($id);
         return response()->json($producto); 
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
        
        
        //   $Tipo=Categoria::find($request->Cate1);
     
        

        // $tipo= Producto::find($id);
        // $aux=$tipo->imagenProducto;
        // unlink(public_path().'/imagen/'.$aux);
        // $tipo2= Stock::find($id);
        
        // $tipo->codigoProducto=$request->codigo;
        // $tipo->nombreProducto=$request->nombre;
        // $tipo->descipcionProducto=$request->descripcion;
        // $tipo->marcaProducto=$request->marca;
        // $tipo->modeloProducto=$request->modelo;

        // $tipo->fecha_caducidadProducto=$request->fecha;
        // $tipo->categoria_id=$request->Cate1;
        // $tipo2->cantidadProducto=$request->cantidad;
        // $tipo2->precioVentaPublico=$request->precioP;
        // $tipo2->precioAdministrador=$request->precioA;
        // $tipo2->descuentoPublico=$request->descuento/100;
        // $tipo2->gananciaUnidad=($tipo2->precioVentaPublico-($tipo2->precioVentaPublico*$tipo2->descuentoPublico)-$tipo2->precioAdministrador);
        // $tipo2->gananciaTotal=($request->cantidad*$tipo2->gananciaUnidad);
        // $tipo2->provedor_id=$request->proveedor2;
        // $tipo2->save();
        // $tipo->save();
        //  return response()->json($request);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $producto=Producto::find($id);
        $producto->eliminadolog = false;
        $producto->save();  
        $stock2=Stock::find($id);
        $stock2->eliminadolog = false;
                $stock2->save(); 
    
        return response()->json(["mensaje"=>"listo"]); 
    }
    }
    

