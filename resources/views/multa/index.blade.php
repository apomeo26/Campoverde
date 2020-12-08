@extends('layout.plantilla')
@section('contenido')
<h3>Multas</h3>
<div class="row">
    <div class="col-md-8 col-xs-12">
        @include('multa.search')
    </div>
    <div class="col-md-3">
        <a href="multa/create" class="pull-right">
            <button class="btn btn-success">Crear multas</button>
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

                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Número de identificación</th>
                    <th>Tipo de multa</th>
                    <th>Fecha</th>
                    <th>Valor</th>
                    <th>Descripción</th>
                    <th width="180">Opciones</th>
                </thead>
                <tbody>
                    @foreach($Detalle_factura as $multa)
                    @if($multa->estado_factura == 'no generada')
                    <tr>

                        <td>{{$multa->nombre}}</td>
                        <td>{{$multa->apellidos}}</td>
                        <td>{{$multa->numero_identificacion}}</td>
                        <td>{{$multa->tipo_cobro}}</td>
                        <td>{{$multa->fecha}}</td>
                        <td>{{$multa->valor}}</td>
                        <td>{{$multa->descripcion}}</td>
                        <td>
                            <a href="{{URL::action('Detalle_facturaController@edit',$multa->id)}}"><button class="btn btn-primary">Actualizar</button></a>
                            <a href="" data-target="#modal-delete-{{$multa->id}}" data-toggle="modal">
                                <button class="btn btn-danger">Eliminar</button>
                            </a>
                        </td>
                    </tr>
                    @include('multa.modal')
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection