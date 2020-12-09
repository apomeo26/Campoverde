@extends('layout.plantilla')
@section('contenido')
<h3>Habitantes</h3>
<div class="row">
    <div class="col-md-8 col-xs-12">
        @include('habitante.search')
    </div>
    <div class="col-md-3">
        <a href="habitante/create" class="pull-right">
            <button class="fa fa-user-plus btn btn-success ">Crear Habitante</button>
        </a>
        <a href="\imprimirHabitantes">
        <button class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover" >
                <thead>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Tipo de Documento</th>
                    <th>Identificación</th>
                    <th>Fijo</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Tipo Habitante</th>
                    <th>Bloque</th>
                    <th>Apartamento</th>
                    <th width="180">Opciones</th>
                </thead>
                <tbody>
                    @foreach($habitantes as $hab)
                    <tr>
                        <td>{{ $hab->nombre}}</td>
                        <td>{{ $hab->apellidos}}</td>
                        <td>{{ $hab->tipo_documento}}</td>
                        <td>{{ $hab->numero_identificacion}}</td>
                        <td>{{ $hab->telefono_fijo}}</td>
                        <td>{{ $hab->telefono_celular}}</td>
                        <td>{{ $hab->correo}}</td>
                        <td>{{ $hab->tipo_habitante}}</td>
                        <td>{{ $hab->bloque}}</td>
                        <td>{{ $hab->numero_apartamento}}</td>
                        <td>
                            <a href="{{URL::action('HabitantesController@edit',$hab->id)}}"> <button class="btn btn-primary">Actualizar</button></a>

                            <a href="" data-target="#modal-delete-{{$hab->id}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('habitante.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$habitantes->links()}}
</div>

@endsection