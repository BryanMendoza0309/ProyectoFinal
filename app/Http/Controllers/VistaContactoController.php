<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;
class VistaContactoController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function load(Request $request)
    {
        $contacto=Contacto::all();
        if ($request->ajax()) {
                 return response()->json($contacto->toArray());
        }else{
             return view('adminlte::Paginas.VistaContacto',compact('contacto'));;
        }
        
        
    }

    public function index(Request $request)
    {
        $contacto=Contacto::paginate(3);;
        if ($request->ajax()) {
                 return response()->json($contacto->toArray());
        }else{
             return view('adminlte::Paginas.VistaContacto',compact('contacto'));;
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacto=Contacto::all();
         return view('adminlte::Paginas.VistaContacto',compact('contacto'));;
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
        $tipo=new Contacto();
        $tipo->ubicacion=$request->ubicacion;
        $tipo->telefono =$request->telefono;
        $tipo->correoAdmin =$request->correoAdmin;
         $tipo->eliminadolog=true;
        $tipo->save();
        $id=$tipo->id;
        return response()->json(['mensaje'=>'Datos Ingresados Correctamente','id'=>$id]);
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
        $contacto=Contacto::find($id);
        return response()->json($contacto);
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
        $tipo=Contacto::find($id);
        $tipo->ubicacion=$request->ubicacion;
        $tipo->telefono=$request->telefono;
        $tipo->correoAdmin=$request->correoAdmin;

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
        $contacto=Contacto::find($id);
        $contacto->eliminadolog=false;
        $contacto->save();
        return response()->json(["mensaje"=>"listo"]); 
    }
}
