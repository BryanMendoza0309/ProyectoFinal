<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provedor;
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $ListaProvedor=Provedor::orderBy('id','asc')->where('eliminadolog','1')->paginate(5);
        if ($request->ajax()) {
                 return response()->json(['users'=>$ListaProvedor]);
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
        $tipo->nombreProvedor=$request->nombre;
        $tipo->tlfProvedor=$request->tlf;
        $tipo->Dirección=$request->direccion;
        $tipo->caracteristicaProvedor=$request->caracteristicas;
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
        $provedoredit=Provedor::find($id);
        return view('adminlte::Paginas.EditarProvedor', compact('provedoredit'));
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
        $provedoredit->nombreProvedor=$request->nombre;
        $provedoredit->tlfProvedor=$request->tlf;
        $provedoredit->Dirección=$request->direccion;
        $provedoredit->caracteristicaProvedor=$request->caracteristicas;
        $provedoredit->save();
        return redirect()->action('ProveedorController@index');
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
        return redirect()->action('ProveedorController@index');
    }
}
