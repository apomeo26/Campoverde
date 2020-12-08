<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apartamento extends Model
{
    protected $table = "apartamento";
    protected $fillable = [
        'bloque',
        'numero_apartamento'
        
    ];
    public $timestamps = false;

    //Relacion con la tabla detalle_habitante

    public function detalle_habitantes()
    {
        return $this->hasMany('App\detalle_habitantes');
    }
}