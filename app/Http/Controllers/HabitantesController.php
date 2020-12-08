<?php

namespace App\Http\Controllers;

use App\apartamento;
use App\detalle_habitantes;
use Illuminate\Http\Request;
use App\Habitante;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Variable;
use DB;

class HabitantesController extends Controller
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

        $habitantes = Habitante::join('detalle_habitantes as dh', 'dh.habitantes_id', '=', 'habitantes.id')
            ->join('apartamento as ap', 'dh.apartamento_id', '=', 'ap.id')
            ->SELECT(
                'habitantes.id',
                'nombre',
                'apellidos',
                'tipo_documento',
                'numero_identificacion',
                'telefono_fijo',
                'telefono_celular',
                'correo',
                'fecha_registro',
                'estado_vigencia',
                'tipo_habitante',
                'bloque',
                'numero_apartamento'
            )
            ->orderBy('habitantes.id', 'ASC')->paginate(3);


        return view('habitante.index', compact('habitantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');

       $ap = apartamento::select('id', 'bloque', 'numero_apartamento')
            ->orderBy('id', 'ASC')
            ->get();

        return view("habitante.create", ["apartamento" => $ap]);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles('admin');

        $habitante = new Habitante;
        $habitante->nombre = $request->get('nombre');
        $habitante->apellidos = $request->get('apellidos');
        $habitante->tipo_documento = $request->get('tipo_documento');
        $habitante->numero_identificacion = $request->get('numero_identificacion');
        $habitante->telefono_fijo = $request->get('telefono_fijo');
        $habitante->telefono_celular = $request->get('telefono_celular');
        $habitante->correo = $request->get('correo');
        $habitante->fecha_registro = $request->get('fecha_registro');
        $habitante->estado_vigencia = $request->get('estado_vigencia');
        $habitante->save();


        //Trae el ultimo registro de habitante

        $dh = Habitante::select('id')
            ->get()->last();

        //insertar datos de la tabla detalle_habitante
        $detalle = new detalle_habitantes;
        $detalle->tipo_habitante = $request->get('tipo_habitante');
        $detalle->habitantes_id = $dh->id;
        $detalle->apartamento_id = $request->get('apartamento_id');
        $detalle->save();


        return Redirect::to('habitante');
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
        $ha = Habitante::findOrFail($id);
        $ap = apartamento::orderBy('id', 'DESC')
            ->select('id', 'bloque', 'numero_apartamento')
            ->get();


        return view("habitante.edit", ["Habitantes" => $ha, "apartamento" => $ap]);
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
        $request->user()->authorizeRoles('admin');
        $habitante = Habitante::findOrFail($id);
        $habitante->nombre = $request->get('nombre');
        $habitante->apellidos = $request->get('apellidos');
        $habitante->tipo_documento = $request->get('tipo_documento');
        $habitante->numero_identificacion = $request->get('numero_identificacion');
        $habitante->telefono_fijo = $request->get('telefono_fijo');
        $habitante->telefono_celular = $request->get('telefono_celular');
        $habitante->correo = $request->get('correo');
        $habitante->fecha_registro = $request->get('fecha_registro');
        $habitante->estado_vigencia = $request->get('estado_vigencia');
        $habitante->update();

        $dh = Habitante::select('id')
            ->get()->last();

        //insertar datos de la tabla detalle_habitante

        $id_d = detalle_habitantes::select('id')
            ->where('habitantes_id', '=', $id)->first();
        $id_detalle = $id_d;


        $detalle = detalle_habitantes::findOrFail($id_detalle->id);
        $detalle->tipo_habitante = $request->get('tipo_habitante');
        $detalle->apartamento_id = $request->get('apartamento_id');
        $detalle->update();

        return Redirect::to('habitante');
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

        $dh = detalle_habitantes::where('habitantes_id', '=', $id);
        $dh->delete();

        $habitantes = Habitante::findOrFail($id);
        $habitantes->delete();


        return Redirect::to('habitante');
    }
}
