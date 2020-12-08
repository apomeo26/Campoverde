<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use Illuminate\Support\Facades\Redirect;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));

            $empleados = Empleado::where('id', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'ASC')->paginate(3);
            return view('empleado.index', ["empleados" => $empleados, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleado;
        $empleado->nombre = $request->get('nombre');
        $empleado->apellidos = $request->get('apellidos');
        $empleado->numero_identificacion = $request->get('numero_identificacion');
        $empleado->direccion = $request->get('direccion');
        $empleado->telefono = $request->get('telefono');
        $empleado->correo = $request->get('correo');
        $empleado->cargo = $request->get('cargo');
        $empleado->dotacion = $request->get('dotacion');
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
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view("empleado.edit", ["empleado" => $empleado]);
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
        $empleado = Empleado::findOrFail($id);
        $empleado->nombre = $request->get('nombre');
        $empleado->apellidos = $request->get('apellidos');
        $empleado->numero_identificacion = $request->get('numero_identificacion');
        $empleado->direccion = $request->get('direccion');
        $empleado->telefono = $request->get('telefono');
        $empleado->correo = $request->get('correo');
        $empleado->cargo = $request->get('cargo');
        $empleado->dotacion = $request->get('dotacion');
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
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return Redirect::to('empleado');
    }
}
