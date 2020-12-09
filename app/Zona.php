<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    public $timestamps=false;
    protected $table='zona';
    protected $fillable=['nombre'];

    public function empleados(){
        return $this->hasMany('App\Empleado');
    }

}
