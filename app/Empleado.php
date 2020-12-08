<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre', 'apellidos',
        'numero_identificacion',  'direccion', 'telefono',
        'correo', 'cargo', 'dotacion', 'fecha_registro'
    ];
}
