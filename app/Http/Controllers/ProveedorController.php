<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provedor;
class ProveedorController extends Controller
{

    public function load(Request $request)
    {
        $ListaProvedor=Provedor::all();
        if ($request->ajax()) {
                 return response()->json($ListaProvedor->toArray());
        }else{
             return view('adminlte::Paginas.Proveedores',compact('ListaProvedor'));;
        }
        
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $ListaProvedor=Provedor::all();
        if ($request->ajax()) {
                 return response()->json($ListaProvedor->toArray());
        }else{
             return view('adminlte::Paginas.Proveedores',compact('ListaProvedor'));
        }
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
        

        if ($request->ajax()) {
        $tipo=new Provedor();
        $tipo->nombreProvedor=$request->nombreProvedor;
        $tipo->tlfProvedor=$request->tlfProvedor;
        $tipo->direccion=$request->direccion;
        $tipo->caracteristicaProvedor=$request->caracteristicaProvedor;
        $tipo->eliminadolog=true;
        $tipo->save();
        $id=$tipo->id;
        return response()->json(['mensaje'=>'Datos Ingresados Correctamente','id'=>$id]);
        }
       // return response()->json(['mensaje'=>'Datos Ingresados Correctamente','id'=>$tipo->id]);
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
        $provedoredit=Provedor::find($id);
         return response()->json($provedoredit); 
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
        $provedoredit=Provedor::find($id);
        $provedoredit->nombreProvedor=$request->nombreProvedor;
        $provedoredit->tlfProvedor=$request->tlfProvedor;
        $provedoredit->direccion=$request->direccion;
        $provedoredit->caracteristicaProvedor=$request->caracteristicaProvedor;
        $provedoredit->save();
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
       $ListaProvedor=Provedor::find($id);
    
        $ListaProvedor->eliminadolog=false;
      $ListaProvedor->save();
         return response()->json(["mensaje"=>"listo"]); 
    }
}
