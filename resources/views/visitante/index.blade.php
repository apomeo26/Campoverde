@extends('layout.plantilla')
@section('contenido')
<h3>Visitante</h3>
<div class="row">
    <div class="col-md-8 col-xs-12">
        @include('visitante.search')
    </div>
    <div class="col-md-2">
        <a href="visitante/create" class="pull-right">
            <button class="btn btn-success">Crear Visitante</button>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Tipo de Documento</th>
                    <th>Número de identificación</th>
                    <th>Temperatura</th>
                    <th>Fecha de visita</th>
                    <th>Bloque-Apartamento</th>
                    <th width="180">Opciones</th>
                </thead>
                <tbody>
                    @foreach($visitantes as $visitante)
                    <tr>
                        <td>{{ $visitante->id }}</td>
                        <td>{{ $visitante->nombre}}</td>
                        <td>{{ $visitante->apellidos }}</td>
                        <td>{{ $visitante->tipo_documento}}</td>
                        <td>{{ $visitante->numero_identificacion}}</td>
                        <td>{{ $visitante->temperatura}}</td>
                        <td>{{ $visitante->fecha_visita}}</td>
                        <td>{{$visitante->apartamento->numero_apartamento}} - {{$visitante->apartamento->bloque}}</td>
                        <td>
                            <a href="{{URL::action('VisitanteController@edit',$visitante->id)}}"> <button class="btn btn-primary">Actualizar</button></a>

                            <a href="" data-target="#modal-delete-{{$visitante->id}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('visitante.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$visitantes->links()}}
</div>

@endsection