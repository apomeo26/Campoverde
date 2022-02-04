<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consejo;
use App\Habitante;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ConsejoCreateRequest;


class ConsejoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        if ($request) {
            $query = trim($request->get('searchText'));
            $consejo = Consejo::where('cargo_consejo', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'ASC')->paginate(7);

            return view("consejo.index", ["consejo" => $consejo, "searchText" => $query]);
        }
    }
    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $pro = 'Propietario/Residente';
        $p = 'Propietario';
        $ha = Habitante::join('detalle_habitantes as dh', 'dh.habitantes_id', '=', 'habitantes.id')
            ->select('habitantes.id', 'nombre', 'apellidos', 'tipo_habitante')
            ->where('tipo_habitante', 'LIKE', '%' . $pro . '%')
            ->orwhere('tipo_habitante', 'LIKE', '%' . $p . '%')
            ->orderBy('id', 'ASC')
            ->get();

        return view("consejo.create",  ["apartamento" => $ha], ["habitantes" => $ha]);
    }

    public function store(ConsejoCreateRequest $request)
    {

        $request->user()->authorizeRoles('admin');
        $consejo = new Consejo();
        $consejo->cargo_consejo = $request->get('cargo_consejo');
        $consejo->fecha_inicio = $request->get('fecha_inicio');
        $consejo->fecha_final = $request->get('fecha_final');
        $consejo->habitantes_id = $request->get('habitantes_id');
        $consejo->save();

        return Redirect::to('consejo');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $consejo = Consejo::findOrFail($id);



        return view("consejo.edit",  ["consejo" => $consejo]);
    }

    public function update(Request $request, $id)
    {

        $request->user()->authorizeRoles('admin');
        $dh = Consejo::select('id')
            ->get()->last();

        $con = Consejo::findOrFail($id);


        $con->cargo_consejo = $request->get('cargo_consejo');
        $con->fecha_inicio = $request->get('fecha_inicio');
        $con->fecha_final = $request->get('fecha_final');
        $con->update();

        return Redirect::to('consejo');
    }

    public function destroy(Request $request,$id)
    {

        $request->user()->authorizeRoles('admin');
        $dc = Consejo::findOrFail($id);
        $dc->delete();
        return Redirect::to('consejo');
    }
    
}
