@extends('layout.plantilla')
@section('contenido')
<h3>Mercancia</h3>
<div class="row">
    <div class="col-md-8 col-xs-12">
        @include('mercancia.search')
    </div>
    <div class="col-md-2">
        <a href="mercancia/create" class="pull-right">
            <button class="btn btn-success">Registrar mercancia</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Habitante</th>
                    <th>Referencia</th>
                    <th>Descripción</th>
                    <th>Transportadora</th>
                    <th>Fecha de recibido</th>
                    <th>Fecha de entrega</th>
                    <th width="180">Opciones</th>
                </thead>
                <tbody>
                    @foreach($mercancia as $mercancia)
                    <tr>
                        <td>{{ $mercancia->habitantes->nombre}} {{ $mercancia->habitantes->apellidos}} - {{ $mercancia->habitantes->numero_identificacion}}</td>
                        <td>{{ $mercancia->num_referencia}}</td>
                        <td>{{ $mercancia->descripcion}}</td>
                        <td>{{ $mercancia->transportadora}}</td>
                        <td>{{ $mercancia->fecha_recibido}}</td>
                        <td>{{ $mercancia->fecha_entrega}}</td>
                        <td>
                            <a href="{{URL::action('MercanciaController@edit',$mercancia->id)}}"><button class="btn btn-primary">Actualizar</button></a>
                            <a href="" data-target="#modal-delete-{{$mercancia->id}}" data-target="" data-toggle="modal">
                                <button class="btn btn-danger">Eliminar</button>
                            </a>
                        </td>
                    </tr>
                    @include('mercancia.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection