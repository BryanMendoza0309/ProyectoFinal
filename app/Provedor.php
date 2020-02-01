<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provedor extends Model
{
    protected $table='provedors';
    public $timestamps=false;
    protected $fillable = [
        'nombreProvedor', 'tlfProvedor', 'Direccion','caracteristicaProvedor'
    ];
}
