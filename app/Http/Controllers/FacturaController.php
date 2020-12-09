<?php

namespace App\Http\Controllers;

use App\Concepto_cobro;
use App\Factura;
use App\Habitante;
use App\Detalle_factura;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        if ($request) {
            $query = trim($request->get('searchText'));


            $liquidacion =  Factura::join('habitantes', 'habitantes.id', '=', 'facturas.habitantes_id')
                ->join('detalle_habitantes',         'habitantes.id', '=', 'detalle_habitantes.habitantes_id')
                ->join('apartamento',     'apartamento.id', '=', 'detalle_habitantes.apartamento_id')
                ->join('detalle_facturas', 'detalle_facturas.facturas_id', '=', 'facturas.id')
                ->join('concepto_cobros',  'detalle_facturas.concepto_cobros_id', '=', 'concepto_cobros.id')
                ->SELECT(
                    'facturas.id',
                    'facturas.habitantes_id',
                    'habitantes.nombre',
                    'habitantes.apellidos',
                    'habitantes.numero_identificacion',
                    DB::raw('SUM(concepto_cobros.valor) as valor_total'),
                    'facturas.fecha_emision',
                    'facturas.fecha_vencimiento',
                    'facturas.estado_factura'
                )
                ->orwhere('habitantes.numero_identificacion', 'LIKE', '%' . $query . '%')
                ->orwhere('facturas.id', 'LIKE', '%' . $query . '%')
                ->orwhere('apartamento.numero_apartamento', 'LIKE', '%' . $query . '%')
                ->groupBy(
                    'facturas.id',
                    'facturas.habitantes_id',
                    'habitantes.nombre',
                    'habitantes.apellidos',
                    'habitantes.numero_identificacion',
                    'facturas.fecha_emision',
                    'facturas.fecha_vencimiento',
                    'facturas.estado_factura'
                )
                ->orderBy('facturas.id', 'ASC')
                ->paginate(4);

            return view('factura.index', ["Facturacion" => $liquidacion, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $cuota = Concepto_cobro::orderBy('id', 'DESC')
            ->select('concepto_cobros.id', 'concepto_cobros.tipo_cobro', 'concepto_cobros.descripcion')
            ->where('concepto_cobros.tipo_cobro', '=', 'cuota administracion')
            ->get();
        return view('factura.create')->with('factura', $cuota);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles('admin');
        $liquidacion = Habitante::findOrFail($id);
        $liquidacion->delete();
        return Redirect::to('factura');
    }

    public function pagar(Request $request,$id, $habitan_id)
    {
        $request->user()->authorizeRoles('admin');
        $estado = 'Pagada';

        $emision = date('Y-m-d H:i:s');
        $vencimiento = date("Y-m-d H:i:s", strtotime($emision . "+1 month"));

        // date("d-m-Y",strtotime($fecha_actual."+ 1 days"));

        $cancelar = Factura::select('facturas.id')
            ->where('facturas.id', '=', $id)
            ->where('facturas.habitantes_id', '=', $habitan_id)
            ->where('facturas.estado_factura', '=', 'Pagada')
            ->first();


        // descartamos las facturas ya canceladas para el pago duplicado
        if (strlen($cancelar) > 0) {


            echo '<script type="text/javascript">
            alert("La factura ya fue cancelada anteriormente");
            window.location.assign("http://localhost:8000/factura");
                                    </script>';
        } else {

            $sv = Factura::findOrFail($id);
            $sv->estado_factura = $estado;
            $sv->update();

            $emision = date('Y-m-d H:i:s',strtotime($emision . "+1 month"));
            $vencimiento = date("Y-m-d H:i:s", strtotime($emision . "+1 month"));
            $factura = new Factura;
            $factura->habitantes_id = $habitan_id;
            $factura->valor_total = 0;
            $factura->fecha_emision = $emision;
            $factura->fecha_vencimiento = $vencimiento;
            $factura->estado_factura = 'Pendiente';
            $factura->save();

            $cuota = Concepto_cobro::select('concepto_cobros.id')
                ->where('concepto_cobros.tipo_cobro', '=', 'cuota administracion')
                ->first();

            $creada = Factura::select('facturas.id')
                ->where('facturas.habitantes_id', '=', $habitan_id)
                ->where('facturas.estado_factura', '=', 'Pendiente')
                ->first();


            $detfactura = new Detalle_factura;
            $detfactura->facturas_id = $creada->id;
            $detfactura->concepto_cobros_id = $cuota->id;
            $detfactura->save();

            echo '<script type="text/javascript">
                                alert("Factura pagada");
                                window.location.assign("http://localhost:8000/factura");
                                    </script>';
        }
    }
}
