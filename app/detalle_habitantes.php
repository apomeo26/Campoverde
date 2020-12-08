<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_habitantes extends Model
{

    protected $fillable = ['tipo_habitante'];
    public $timestamps = false;

    //Relacion con la tabla  habitantes y apartamento

    public function habitantes()
    {
        return $this->hasMany('App\habitante');
    }
    
    public function apartamento()
    {
        return $this->hasMany('App\apartamento');
    }
}
