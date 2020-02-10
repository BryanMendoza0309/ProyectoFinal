<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    protected $table='compradors';
    public $timestamps=false;
    protected $fillable = [
        'nombre', 'apellido', 'nombreEmpresa', 'numeroCasa_nombreCalle', 'apartamento_haitacion_etc', 'ciudad', 'provincia', 'codigoPostal', 'telefono', 'correoElectronico'
    ];
}
