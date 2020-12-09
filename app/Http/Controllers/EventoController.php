<?php

namespace App\Http\Controllers;
use App\Habitante;
use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
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

            $eventos = Evento::orwhere('tipo', 'LIKE', '%' . $query . '%')
            ->orderBy('id', 'ASC')->paginate(8);
            return view('evento.index', ["eventos" => $eventos, "searchText" => $query]);
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
        ->select('habitantes.id', 'habitantes.nombre','habitantes.apellidos')
        ->get();
        return view('evento.create')->with('habitantes', $habitantes);
        
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
        $eventos = new Evento;
        $eventos->tipo = $request->get('tipo');
        $eventos->descripcion = $request->get('descripcion');
        $eventos->estado = $request->get('estado');
        $eventos->fecha_registro = $request->get('fecha_registro');
        $eventos->fecha_finalizacion = $request->get('fecha_finalizacion');
        $eventos->habitantes_id =$request->get('habitantes_id');
        $eventos->save();
        return Redirect::to('evento');
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
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');
        $eventos = Evento::findOrFail($id);
        $habitantes = Habitante::orderBy('id', 'DESC')
        ->select('id', 'nombre', 'apellidos')
        ->get();
        return view("evento.edit", ["eventos" => $eventos, "habitantes" => $habitantes]);
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
        $eventos = Evento::findOrFail($id);
        $eventos->tipo = $request->get('tipo');
        $eventos->descripcion = $request->get('descripcion');
        $eventos->estado = $request->get('estado');
        $eventos->fecha_registro = $request->get('fecha_registro');
        $eventos->fecha_finalizacion = $request->get('fecha_finalizacion');
        $eventos->update();
        return Redirect::to('evento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin');
        $eventos = Evento::findOrFail($id);
        $eventos->delete();
        return Redirect::to('evento');
    }
}
