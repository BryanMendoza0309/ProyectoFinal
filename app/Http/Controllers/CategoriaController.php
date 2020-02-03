<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoriaProducto;
class CategoriaController extends Controller
{
    public function index()
    {
        return view('adminlte::Paginas.Categoria');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria=CategoriaProducto::orderBy('id','asc')->paginate(5);
        return view('adminlte::layouts.partials.sidebar',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo=new CategoriaProducto();
        $tipo->nombreTipoProducto=$request->Categoria;
        $tipo->save();
        return view('adminlte::Paginas.Categoria');
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
        $CategoriaProducto=CategoriaProducto::find($id);
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
        $tipo=new CategoriaProducto();
        $tipo->nombreTipoProducto=$request->Categoria;
        $tipo->save();
        return view('adminlte::Paginas.Categoria');
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
