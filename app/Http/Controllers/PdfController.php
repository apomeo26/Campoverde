<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PdfController extends Controller
{
    
    public function imprimirEventos(Request $request){
        $eventos = DB::table('eventos as evento')
        -> select('evento.id','evento.tipo','evento.descripcion','evento.estado', 'evento.fecha_registro')
        -> get();

        $pdf = \PDF::loadView('Pdf.eventosPDF',['eventos'=> $eventos]);
        $pdf-> setPaper('carta',"A4");
        return $pdf->download('Listado de Eventos.pdf');
    }

    public function imprimirParqueadero(Request $request)
    {
        $parqueadero = DB::table('lista_vehiculos as lista')->join('parqueaderos as p', 'lista.id', '=', 'p.lista_vehiculos_id')
        ->select('lista.id','lista.placa', 'lista.modelo','p.fecha','p.estado_ingreso')->get();
        $pdf = \PDF::loadView('Pdf.parqueaderoPdf', ['parqueadero' => $parqueadero]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de registros del parqueadero.pdf');
    }

    public function imprimirHabitantes(Request $request)
    {
        $habitantes = DB::table('habitantes')
        ->join('detalle_habitantes','habitantes.id','=','detalle_habitantes.habitantes_id')
        ->join('apartamento', 'detalle_habitantes.apartamento_id', '=', 'apartamento.id')
        ->select('habitantes.numero_identificacion','habitantes.nombre','habitantes.apellidos',
        'habitantes.correo','habitantes.telefono_celular',
        'detalle_habitantes.tipo_habitante','apartamento.bloque', 'apartamento.numero_apartamento')->get();
        $pdf = \PDF::loadView('Pdf.habitantePdf', ['habitantes' => $habitantes]);
        $pdf->setPaper('A4','landscape');
        return $pdf->download('Listado de Habitantes.pdf');
    }
}
