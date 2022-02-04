@extends('layout.plantilla')
@section('contenido')
<h3>Consejo</h3>
<div class="row">
    <div class="col-md-8 col-xs-12">
        @include('consejo.search')
    </div>
    <div class="col-md-3">
        <a href="consejo/create" class="pull-right">
            <button class="fa fa-user-plus btn btn-success ">Agregar</button>
        </a>
        <a href="\imprimirConsejo">
            <button class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Nombre Apellidos</th>
                    <th>Tipo de documento</th>
                    <th>Identificación</th>
                    <th>Cargo</th>
                    <th width="90">Fecha inicio</th>
                    <th width="90">Fecha final</th>
                    <th width="180">Opciones</th>
                </thead>
                <tbody>
                    @foreach($consejo as $hab)
                    <tr>
                        <td>{{ $hab->habitantes->nombre}} {{ $hab->habitantes->apellidos}}</td>
                        <td>{{ $hab->habitantes->tipo_documento}}</td>
                        <td>{{ $hab->habitantes->numero_identificacion}}</td>
                        <td>{{ $hab->cargo_consejo}}</td>
                        <td>{{ $hab->fecha_inicio}}</td>
                        <td>{{ $hab->fecha_final}}</td>
                        <td>
                            <a href="{{URL::action('ConsejoController@edit',$hab->id)}}"> <button class="btn btn-primary">Actualizar</button></a>

                            <a href="" data-target="#modal-delete-{{$hab->id}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('consejo.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{$consejo->links()}}
</div>

@endsection