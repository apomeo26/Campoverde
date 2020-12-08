@extends('layout.plantilla')
@section('contenido')
<h3>Eventos</h3>
<div class="row">
    <div class="col-md-8 col-xs-12">
        @include('evento.search')
    </div>
    <div class="col-md-3" >
        <a href="evento/create" class="pull-right">
            <button class="btn btn-success">Crear Evento</button>
        </a>
        <a href="\imprimirEventos">
        <button class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha de registro</th>
                    <th>Responsable</th>
                    <th width="180">Opciones</th>
                </thead>
                <tbody>
                    @foreach($eventos as $evento)
                    <tr>
                        <td>{{$evento->id}}</td>
                        <td>{{$evento->tipo}}</td>
                        <td>{{$evento->descripcion}}</td>
                        <td>{{$evento->estado}}</td>
                        <td>{{$evento->fecha_registro}}</td>
                        <td>{{$evento->habitantes->nombre}} {{$evento->habitantes->apellidos}}</td>
                        <td>
                            <a href="{{URL::action('EventoController@edit',$evento->id)}}"><button class="btn btn-primary">Actualizar</button></a>
                            <a href="" data-target="#modal-delete-{{$evento->id}}" data-toggle="modal">
                                <button class="btn btn btn-danger">Eliminar</button>
                            </a>
                        </td>
                    </tr>
                    @include('evento.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$eventos->links()}}
    </div>
</div>
@endsection