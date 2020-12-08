@extends('layout.plantilla')
@section('contenido')
<h3>EMPLEADOS</h3>
<div class="row">
    <div class="col-md-8 col-xs-12">
    @include('empleado.search')
    </div>
    <div class="col-md-2">
        <a href="empleado/create" class="pull-right">
            <button class="btn btn-success  fa fa-user-plus">Crear Empleado</button>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive ">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>identificacion</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Cargo</th>
                    <th>Dotacion</th>
                    <th>Fecha de Registro</th>
                    <th width="180">Opciones</th>
                </thead>
                <tbody>
                    @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre}}</td>
                        <td>{{ $empleado->apellidos }}</td>
                        <td>{{ $empleado->numero_identificacion}}</td>
                        <td>{{ $empleado->direccion}}</td>
                        <td>{{ $empleado->telefono}}</td>
                        <td>{{ $empleado->correo}}</td>
                        <td>{{ $empleado->cargo}}</td>
                        <td>{{ $empleado->dotacion}}</td>
                        <td>{{ $empleado->fecha_registro}}</td>
                        <td>
                            <a href="{{URL::action('EmpleadoController@edit',$empleado->id)}}"> <button class="btn btn-primary">Actualizar</button></a>

                            <a href="" data-target="#modal-delete-{{$empleado->id}}" data-toggle="modal"> <button class="btn btn-danger ">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('empleado.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$empleados->links()}}
    </div>
</div>
@endsection