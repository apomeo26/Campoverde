<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitante;
use App\Apartamento;
use Illuminate\Support\Facades\Redirect;

class VisitanteController extends Controller
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
            $visitantes = Visitante::where('numero_identificacion', 'LIKE', '%' . $query . '%')
                ->orwhere('nombre', 'LIKE', '%' . $query . '%')
                ->orwhere('apellidos', 'LIKE', '%' . $query . '%')
                ->orwhere('tipo_documento', 'LIKE', '%' . $query . '%')
                ->orwhere('temperatura', 'LIKE', '%' . $query . '%')
                ->orwhere('fecha_visita', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'ASC')->paginate(3);
            /**  return view('visitante.index', compact('visitantes'));
             */
            return view("visitante.index", ["visitantes" => $visitantes, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ap = Apartamento::select('id', 'bloque', 'numero_apartamento')
            ->orderBy('id', 'ASC')
            ->get();
        return view("visitante.create", ["apartamento" => $ap]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visitante = new Visitante;
        $visitante->nombre = $request->get('nombre');
        $visitante->apellidos = $request->get('apellidos');
        $visitante->tipo_documento = $request->get('tipo_documento');
        $visitante->numero_identificacion = $request->get('numero_identificacion');
        $visitante->temperatura = $request->get('temperatura');
        $visitante->fecha_visita = $request->get('fecha_visita');
        $visitante->apartamento_id = $request->get('apartamento_id');
        $visitante->save();
        return Redirect::to('visitante');
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
        $visitante = Visitante::findOrFail($id);
        return view("visitante.edit", ["visitantes" => $visitante]);
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
        $visitante = Visitante::findOrFail($id);
        $visitante->nombre = $request->get('nombre');
        $visitante->apellidos = $request->get('apellidos');
        $visitante->tipo_documento = $request->get('tipo_documento');
        $visitante->numero_identificacion = $request->get('numero_identificacion');
        $visitante->temperatura = $request->get('temperatura');
        $visitante->fecha_visita = $request->get('fecha_visita');
        $visitante->update();
        return Redirect::to('visitante');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitantes = Visitante::findOrFail($id);
        $visitantes->delete();
        return Redirect::to('visitante');
    }
}
