<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consejo extends Model
{
    //

    protected $table = "Consejo";
    protected $fillable = ['id','cargo_consejo','fecha_inicio','fecha_final'];
    public $timestamps = false;

    //Relacion con la tabla habitantes y apartamento

    public function detalle_habitantes()
    {
         return $this->hasMany('App\detalle_habitantes');
        //return $this->belongsTo('App\detalle_habitantes');
    }
    public function habitantes()
    {
        //return $this->hasMany('App\habitante');
        return $this->belongsTo('App\Habitante');
    }
    
    public function apartamento()
    {
        return $this->hasMany('App\apartamento');
    }
}
