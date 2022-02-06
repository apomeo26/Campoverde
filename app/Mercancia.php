<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mercancia extends Model
{
    public $timestamps = false;
    protected $fillable = ['num_referencia','descripcion','transportadora','fecha_recibido','fecha_entrega'];
    
    
    public function habitantes(){
        return $this->belongsTo('App\Habitante');
    }
}
