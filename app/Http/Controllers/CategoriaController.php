<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProducto;
class CategoriaController extends Controller
{
      public function load(Request $request)
    {
        $categoria=CategoriaProducto::all();
        if ($request->ajax()) {
                 return response()->json($categoria->toArray());
        }else{
             return view('adminlte::Paginas.Categoria',compact('categoria'));;
        }
        
        
    }



    public function index(Request $request)
    {
        $categoria=CategoriaProducto::paginate(3);
        if ($request->ajax()) {
                 return response()->json($categoria->toArray());
        }else{
             return view('adminlte::Paginas.Categoria',compact('categoria'));;
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
        if ($request->ajax()) {
        $tipo=new CategoriaProducto();
        $tipo->nombreTipoProducto=$request->categoria;
         $tipo->eliminadolog=true;
        $tipo->save();
        return response()->json(['mensaje'=>'Datos Ingresados Correctamente']);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=CategoriaProducto::find($id);
         return response()->json($categoria); 
         
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
        $tipo=CategoriaProducto::find($id);
        $tipo->nombreTipoProducto=$request->categoria;
        $tipo->save();
      return response()->json(["mensaje"=>"listo"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $categoria=CategoriaProducto::find($id);
        $categoria->eliminadolog=false;
        $categoria->save();
        return response()->json(["mensaje"=>"listo"]); 
    }
}
