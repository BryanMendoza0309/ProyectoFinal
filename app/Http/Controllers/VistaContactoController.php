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
    public function index(Request $request)
    {
        $contacto=Contacto::orderBy('id','asc')->where('eliminadolog','1')->paginate(5);
        if ($request->ajax()) {
                 return response()->json(['users'=>$contacto]);
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
        return view('adminlte::Paginas.EditarContacto', compact('contacto'));    }

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
       return redirect()->action('VistaContactoController@index');    }

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
        return redirect()->action('VistaContactoController@index');    }
}
