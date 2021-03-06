<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $table='productos';
    public $timestamps=false;
    protected $fillable = [
        'codigoProducto', 'nombreProducto', 'descripcioProducto','marcaProducto','modeloProducto','imagenProducto','fecha_caducidadProducto'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    public  function stock()
    {
        return  $this->belongsTo(Stock::class);
    }
    
}
