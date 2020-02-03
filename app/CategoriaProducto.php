<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
	protected $table='categoria_productos';
    public $timestamps=false;
    protected $fillable = [
        'nombreTipoProducto'
    ];

    
}
