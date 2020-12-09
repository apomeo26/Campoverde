<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PdfController extends Controller
{
    
    public function imprimirEventos(Request $request){
        $request->user()->authorizeRoles('admin');
        $eventos = DB::table('eventos as evento')
        -> select('evento.id','evento.tipo','evento.descripcion','evento.estado', 'evento.fecha_registro')
        -> get();

        $pdf = \PDF::loadView('Pdf.eventosPDF',['eventos'=> $eventos]);
        $pdf-> setPaper('carta',"A4");
        return $pdf->download('Listado de Eventos.pdf');
    }

    public function imprimirParqueadero(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $parqueadero = DB::table('lista_vehiculos as lista')->join('parqueaderos as p', 'lista.id', '=', 'p.lista_vehiculos_id')
        ->select('lista.id','lista.placa', 'lista.modelo','p.fecha','p.estado_ingreso')->get();
        $pdf = \PDF::loadView('Pdf.parqueaderoPdf', ['parqueadero' => $parqueadero]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de registros del parqueadero.pdf');
    }

    public function imprimirHabitantes(Request $request)
    {
        $request->user()->authorizeRoles('admin');
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


    public function imprimirFacturas ($id)
    {
        $request->user()->authorizeRoles('admin');
        $facturas = DB::table('facturas')
            ->join(     'habitantes',       'facturas.habitantes_id',   '=', 'habitantes.id')
            ->join(     'detalle_habitantes',         'habitantes.id',            '=', 'detalle_habitantes.habitantes_id')
            ->join(     'apartamento',     'apartamento.id',          '=', 'detalle_habitantes.apartamento_id')
            ->select(   'facturas.id',
                        'apartamento.numero_apartamento',
                        'habitantes.numero_identificacion',
                        'habitantes.nombre',

                        'habitantes.apellidos',
                        'facturas.fecha_emision',
                        'facturas.fecha_vencimiento',
                        'facturas.estado_factura')
            ->where(    'facturas.id','=', $id)
            ->get();

        $conceptos = DB::table('detalle_facturas')
            ->join(     'concepto_cobros',       'detalle_facturas.concepto_cobros_id', '=' , 'concepto_cobros.id')
            ->select(   'concepto_cobros.tipo_cobro',
                        'concepto_cobros.descripcion',
                        'concepto_cobros.valor',)
            ->where(    'detalle_facturas.facturas_id','=', $id)
            ->get();  
            
        $total = DB::table('detalle_facturas')
        ->join(     'concepto_cobros',       'detalle_facturas.concepto_cobros_id', '=' , 'concepto_cobros.id')
        ->select(    DB::raw('SUM(concepto_cobros.valor) as valor'),)
        ->where(    'detalle_facturas.facturas_id','=', $id)
        ->get(); 


        $pdf = \PDF::loadView('Pdf.facturasPDF', [  'facturas'  => $facturas, 
                                                    'conceptos' => $conceptos,
                                                    'total'     => $total]);
        $pdf->setPaper('carta', 'A4');
        return $pdf->download('Listado de facturas.pdf');
    }
}
