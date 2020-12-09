<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Detalle_factura;
use App\Factura;
use App\Detalle_habitantes;
use App\habitante;
use App\Concepto_cobro;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\MultaCreateRequest;
use App\Http\Requests\MultaEditRequest;

class Detalle_facturaController extends Controller
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

            $Detalle_factura = Detalle_factura::join('facturas as de', 'detalle_facturas.facturas_id', '=', 'de.id')
                ->join('habitantes as ha', 'de.habitantes_id', '=', 'ha.id')
                ->join('concepto_cobros as concep', 'detalle_facturas.concepto_cobros_id', '=', 'concep.id')
                ->SELECT('detalle_facturas.id', 'ha.nombre', 
                'ha.apellidos', 'ha.numero_identificacion', 
                'concep.tipo_cobro', 'detalle_facturas.fecha', 
                'concep.valor', 'concep.descripcion','de.estado_factura')
                
                ->orwhere('detalle_facturas.fecha', 'LIKE', '%' . $query . '%')
                ->orwhere('ha.nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('ha.apellidos', 'LIKE', '%' . $query . '%')
                ->orwhere('ha.numero_identificacion', 'LIKE', '%' . $query . '%')
                ->orderBy('detalle_facturas.id', 'DESC')
                ->get();
                    
            /**$Detalle_factura = Detalle_factura::where('fecha', 'LIKE', '%' . $query . '%')
                ->orderBy('detalle_facturas.id', 'DESC')
                ->paginate(4);*/


            return view('multa.index', ["Detalle_factura" => $Detalle_factura, "searchText" => $query]);
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
        $multa = Concepto_cobro::orderBy('id', 'DESC')
            ->select('concepto_cobros.id', 'concepto_cobros.tipo_cobro', 'concepto_cobros.descripcion')
            ->where('concepto_cobros.tipo_cobro','=','Multa')
            ->get();
        return view('multa.create')->with('multa', $multa);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MultaCreateRequest $request)
    {
        $request->user()->authorizeRoles('admin');
        $id_habitant = habitante::select('id')
            ->where('numero_identificacion', '=', $request->get('documento'))->first();
        $id_habitante = $id_habitant;

        if (strlen($id_habitante) == 0) {

            echo '<script type="text/javascript">
            alert("Responsable no reguistrado");
            window.location.href="multa/create";
                </script>';
        } else {

            $profession = Detalle_habitantes::select('tipo_habitante')
                ->where('habitantes_id', '=', $id_habitante->id)->first();
            $tipo = $profession;

            if ($tipo->tipo_habitante == 'Propietario' || $tipo->tipo_habitante == 'Propietario/Residente'){

                $profession = Factura::select('id')
                    ->where('estado_factura', '=', 'Pendiente')
                    ->where('habitantes_id', '=', $id_habitante->id)->first();
                $id_factura = $profession;


                if (strlen($id_factura) == 0) {

                    $factura = new Factura;
                    $factura->habitantes_id = $id_habitante->id;
                    $factura->valor_total = 0;
                    $factura->estado_factura = 'Pendiente';
                    $factura->save();

                    $profession = Factura::select('id')
                        ->where('estado_factura', '=', 'Pendiente')
                        ->where('habitantes_id', '=', $id_habitante->id)->first();

                    $id_factura = $profession;

                    $detalle = new Detalle_factura;
                    $detalle->facturas_id = $id_factura->id;
                    $detalle->concepto_cobros_id = $request->get('multa');
                    $detalle->fecha = $request->get('fecha');
                    $detalle->save();
                    //return Redirect::to('multa');
                    echo '<script type="text/javascript">
                    alert("Multa registrada");
                    window.location.href="multa";
                    </script>';
                } else {
                    $detalle = new Detalle_factura;
                    $detalle->facturas_id = $id_factura->id;
                    $detalle->concepto_cobros_id= $request->get('multa');
                    $detalle->fecha = $request->get('fecha');
                    $detalle->save();
                    //return Redirect::to('multa');
                    echo '<script type="text/javascript">
                    alert("Multa registrada");
                    window.location.href="multa";
                    </script>';
                }
            } else {
                echo '<script type="text/javascript">
                alert("no es la cedula del responsable del apartamento");
                window.location.href="multa/create";
                    </script>';
            }
        }
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
    public function edit(Request $request,$id)
    {
        $request->user()->authorizeRoles('admin');
        $Detalle_factura = Detalle_factura::findOrFail($id);
        $tipo_cobros = Concepto_cobro::orderBy('id', 'DESC')
        ->select('concepto_cobros.id', 'concepto_cobros.tipo_cobro', 'concepto_cobros.descripcion')
        ->where('concepto_cobros.tipo_cobro','=','Multa')
        ->get();
        return view("multa.edit", ["Detalle_factura" => $Detalle_factura, "tipo_cobros" => $tipo_cobros]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MultaEditRequest $request, $id)
    {
        $request->user()->authorizeRoles('admin');
        $detalle = Detalle_factura::findOrFail($id);
        $detalle->concepto_cobros_id = $request->get('multa');
        $detalle->fecha = $request->get('fecha');
        $detalle->update();
        //return Redirect::to('multa');
        echo '<script type="text/javascript">
        alert("Multa Actualizada");
        window.location.assign("http://localhost:8000/multa");
        </script>';
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
        $detalle_factura = Detalle_factura::findOrFail($id);
        $detalle_factura->delete();
        //return Redirect::to('multa');
        echo '<script type="text/javascript">
        alert("Multa Borrada");
        window.location.assign("http://localhost:8000/multa");
        </script>';
    }
}
