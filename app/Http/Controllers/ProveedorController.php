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
    public function index()
    {
        $ListaProvedor=Provedor::orderBy('id','asc')->paginate(5);
        return view('adminlte::Paginas.Proveedores',compact('ListaProvedor'));
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
        $tipo=new Provedor();
        $tipo->nombreProvedor=$request->nombre;
        $tipo->tlfProvedor=$request->tlf;
        $tipo->Dirección=$request->direccion;
        $tipo->caracteristicaProvedor=$request->caracteristicas;
        $tipo->save();
        return redirect()->action('ProveedorController@index');
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
        //
    }
}
