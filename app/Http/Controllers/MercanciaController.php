<?php

namespace App\Http\Controllers;

use App\Habitante;
use App\Mercancia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;



class MercanciaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        
        if ($request) {
            $query = trim($request->get('searchText'));

            $mercancia = Mercancia::orwhere('num_referencia', 'LIKE', '%' . $query . '%')
                ->orderBy('id','DESC')->paginate(10);
            return view('mercancia.index', ["mercancia" => $mercancia, "searchText" => $query]);
        }
    }

    public function create(Request $request)
    {
       
        
        $habitantes = Habitante::orderBy('id', 'DESC')
        ->select('habitantes.id', 'habitantes.nombre','habitantes.apellidos','habitantes.numero_identificacion')
        ->get();
        return view('mercancia.create')->with('habitantes', $habitantes);
      
    }

    public function store(Request $request)
    {
      
        $mercancia = new Mercancia;
        $mercancia->habitantes_id = $request->get('habitantes_id');
        $mercancia->num_referencia = $request->get('num_referencia');
        $mercancia->descripcion = $request->get('descripcion');
        $mercancia->transportadora =$request->get('transportadora');
        $mercancia->fecha_recibido =$request->get('fecha_recibido');
        $mercancia->fecha_entrega =$request->get('fecha_entrega');
        $mercancia->save();
        return Redirect::to('mercancia');
    }

    public function show($id)
    {
        //
    }

    public function edit(Request $request,$id)
    {
       
        $mercancia = Mercancia::findOrFail($id);

        $habitantes = Habitante::orderBy('id', 'DESC')
        ->select('id', 'nombre', 'apellidos','numero_identificacion')
        ->get();
        return view("mercancia.edit", ["mercancia" => $mercancia, "habitantes" => $habitantes]);
    }

    public function update(Request $request, $id)
    {
       

        $mercancia = Mercancia::findOrFail($id);
        $mercancia->habitantes_id = $request->get('habitantes_id');
        $mercancia->num_referencia = $request->get('num_referencia');
        $mercancia->descripcion = $request->get('descripcion');
        $mercancia->transportadora =$request->get('transportadora');
        $mercancia->fecha_recibido =$request->get('fecha_recibido');
        $mercancia->fecha_entrega =$request->get('fecha_entrega');
        $mercancia->update();
        return Redirect::to('mercancia');
    }

    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles('admin');
        $mercancia = Mercancia::findOrFail($id);
        $mercancia->delete();
        return Redirect::to('mercancia');
    }
}
