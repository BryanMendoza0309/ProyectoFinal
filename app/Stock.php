<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table='stocks';
    public $timestamps=false;
    protected $fillable = [
        'cantidadProducto', 'precioVentaPublico', 'precioAdministrador','descuentoPublico'
    ];

}
