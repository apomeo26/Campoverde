<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitante extends Model
{
   
    protected $fillable = [
        'nombre', 
        'apellidos',
        'tipo_documento', 
        'numero_identificacion', 
        'telefono',
        'correo',
        'fecha_registro',
        'estado_vigencia'
    ];
    public $timestamps = false;

    //Relacion con la tabla detalle_habitante

    public function detalle_habitantes()
    {
        return $this->hasMany('App\detalle_habitantes');
    }

    public function mascota(){
        return $this->hasMany('App\Mascota');
    }

    public function evento(){
        return $this->hasMany('App\Evento');
    }
}

