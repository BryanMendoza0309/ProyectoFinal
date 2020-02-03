@extends('adminlte::layouts.app')
@section('htmlheader_title')
{{ trans('adminlte_lang::message.home') }}
@endsection
@section('main-content')
@foreach($producto as $item)
<div class="card" style="width: 18rem;">
  <img src="imagen\{{$item->imagenProducto}}" class="card-img-top" alt="...">
  <div class="card-body"> 
    <h5 class="card-title">{{$item->nombreProducto}}</h5>
    <p class="card-text">{{$item->descipcionProducto}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$item->marcaProducto}}</li>
    <li class="list-group-item">{{$item->modeloProducto}}</li>
    <li class="list-group-item">${{$item->stock->precioVentaPublico}}</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Comprar</a>
  </div>
</div>
@endforeach
@endsection

