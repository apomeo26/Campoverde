<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Zona;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EmpleadoCreateRequest;

class EmpleadoController extends Controller
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

            $empleados = Empleado::orwhere('nombre', 'LIKE', '%' . $query . '%')
            ->orwhere('apellidos', 'LIKE', '%' . $query . '%')
            ->orwhere('numero_identificacion', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'ASC')->paginate(3);
            return view('empleado.index', ["empleados" => $empleados, "searchText" => $query]);
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
        $zona = Zona::orderBy('id', 'DESC')
        ->select('zona.id', 'zona.nombre')
        ->get();
        return view('empleado.create')->with('zona', $zona);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpleadoCreateRequest $request)
    {
        $request->user()->authorizeRoles('admin');
        $empleado = new Empleado;
        $empleado->nombre = $request->get('nombre');
        $empleado->apellidos = $request->get('apellidos');
        $empleado->numero_identificacion = $request->get('numero_identificacion');
        $empleado->direccion = $request->get('direccion');
        $empleado->telefono = $request->get('telefono');
        $empleado->correo = $request->get('correo');
        $empleado->cargo = $request->get('cargo');
        $empleado->dotacion = $request->get('dotacion');
        $empleado->zona_id = $request->get('zona_id');
        $empleado->fecha_registro = $request->get('fecha_registro');
        $empleado->save();
        return Redirect::to('empleado');
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
        $empleado = Empleado::findOrFail($id);

        $zona = Zona::orderBy('id', 'DESC')
        ->select('id', 'nombre')
        ->get();
        return view("empleado.edit", ["empleado" => $empleado, "zona" => $zona]);

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
        $empleado = Empleado::findOrFail($id);
        $empleado->nombre = $request->get('nombre');
        $empleado->apellidos = $request->get('apellidos');
        $empleado->numero_identificacion = $request->get('numero_identificacion');
        $empleado->direccion = $request->get('direccion');
        $empleado->telefono = $request->get('telefono');
        $empleado->correo = $request->get('correo');
        $empleado->cargo = $request->get('cargo');
        $empleado->dotacion = $request->get('dotacion');
        $empleado->zona_id = $request->get('zona_id');
        $empleado->fecha_registro = $request->get('fecha_registro');
        $empleado->update();
        return Redirect::to('empleado');
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
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return Redirect::to('empleado');
    }
}
