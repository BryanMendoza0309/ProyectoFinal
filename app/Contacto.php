<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table='contactos';
    public $timestamps=false;
    protected $fillable = [
        'ubicacion', 'telefono', 'correoAdmin','Nombre','Apellido','tlf','Mensaje','Correo'
    ];
}
