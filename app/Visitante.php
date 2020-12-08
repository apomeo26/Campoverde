<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nombre', 'apellidos',
        'tipo_documento', 'numero_identificacion', 'temperatura', 'fecha_visita'
    ];
    public function apartamento()
    {
        return $this->belongsTo('App\apartamento');
    }
}
