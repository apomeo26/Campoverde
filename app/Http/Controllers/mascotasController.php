<?php

namespace App\Http\Controllers;

use App\Habitante;
use App\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class mascotasController extends Controller
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

            $mascotas = Mascota::orwhere('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'ASC')->paginate(10);
            return view('mascota.index', ["mascotas" => $mascotas, "searchText" => $query]);
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
        
        $habitantes = Habitante::orderBy('id', 'DESC')
        ->select('habitantes.id', 'habitantes.nombre','habitantes.apellidos','habitantes.numero_identificacion')
        ->get();
        return view('mascota.create')->with('habitantes', $habitantes);
      
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
        $mascotas = new Mascota;
        $mascotas->tipo = $request->get('tipo');
        $mascotas->raza = $request->get('raza');
        $mascotas->nombre = $request->get('nombre');
        $mascotas->color = $request->get('color');
        $mascotas->habitantes_id =$request->get('habitantes_id');
        $mascotas->save();
        return Redirect::to('mascota');
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
        $mascotas = Mascota::findOrFail($id);

        $habitantes = Habitante::orderBy('id', 'DESC')
        ->select('id', 'nombre', 'apellidos','numero_identificacion')
        ->get();
        return view("mascota.edit", ["mascotas" => $mascotas, "habitantes" => $habitantes]);
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

        $mascotas = Mascota::findOrFail($id);
        $mascotas->tipo = $request->get('tipo');
        $mascotas->raza = $request->get('raza');
        $mascotas->nombre = $request->get('nombre');
        $mascotas->color = $request->get('color');
        $mascotas->update();
        return Redirect::to('mascota');
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
        $mascotas = Mascota::findOrFail($id);
        $mascotas->delete();
        return Redirect::to('mascota');
    }
}
