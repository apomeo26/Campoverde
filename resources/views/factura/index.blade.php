@extends('layout.plantilla')
@section('contenido')

<h3>Facturación</h3>
<div class="row">
    <div class="col-md-8 col-xs-12">
       <!-- <h3>Factura <a href="\imprimirPropietarios"><button class="btn btn-success"><span class="glyphicon glyphicon-download-alt"></span> Generar PDF</button></a></h3>
         <h4>Ingrese numero de identificacion, numero de apartamento o numero de factura para consultar:</h4> -->
        @include('factura.search')
    </div>
   <!-- <div class="col-md-2">
        <a href="factura/create" class="pull-right">
            <button class="btn btn-success">Pagar cuota de administracion</button>
        </a>
    </div> -->
</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Número factura</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Número de identificación</th>
                    <th>Fecha expedición</th>
                    <th>Fecha vencimiento</th>
                    <th>Valor total</th>
                    <th>Estado</th>
                    <th width="180">Opciones</th>
                </thead>
                <tbody>
                    @foreach($Facturacion as $liquidacion)
                    <tr>
                        <td>{{$liquidacion->id}}</td>
                        <td>{{$liquidacion->nombre}}</td>
                        <td>{{$liquidacion->apellidos}}</td>
                        <td>{{$liquidacion->numero_identificacion}}</td>
                        <td>{{$liquidacion->fecha_emision}}</td>
                        <td>{{$liquidacion->fecha_vencimiento}}</td>
                        <td>{{$liquidacion->valor_total}}</td>
                        <td>{{$liquidacion->estado_factura}}</td>
                        <td>

                        <a href="{{route('pagar', [$liquidacion->id,$liquidacion->habitantes_id])}}" >
                                <button class="btn btn-danger">Pagar</button>

                        <!--<h3>Reporte De Facturas</h3> -->
                         
                         <!--<a href="\imprimirFacturas"> -->
                         <a href="{{route('imprimirFacturas', [$liquidacion->id])}}" >
                            <button class="btn btn-success">
                                <span class="glyphicon glyphicon-download-alt"></span> Imprimir
                            </button></a>


                            <!-- <a href="{{URL::action('FacturaController@edit',$liquidacion->id)}}">
                            <button class="btn btn-primary">Imprimir</button></a> -->

                        </td>
                    </tr>
                    @include('factura.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$Facturacion->links()}}
    </div>
</div>

@endsection
