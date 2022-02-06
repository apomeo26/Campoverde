@extends('layout.plantilla')
@section('contenido')
<h3>Mascotas</h3>
<div class="row">
    <div class="col-md-8 col-xs-12">
        @include('mascota.search')
    </div>
    <div class="col-md-2">
        <a href="mascota/create" class="pull-right">
            <button class="btn btn-success">Nueva mascota</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <th>Tipo</th>
                    <th>Raza</th>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th>Responsable</th>
                    <th width="180">Opciones</th>
                </thead>
                <tbody>
                    @foreach($mascotas as $mascota)
                    <tr>
                        <td>{{ $mascota->tipo }}</td>
                        <td>{{ $mascota->raza}}</td>
                        <td>{{ $mascota->nombre }}</td>
                        <td>{{ $mascota->color }}</td>
                        <td>{{ $mascota->habitantes->nombre}} {{ $mascota->habitantes->apellidos}} - {{ $mascota->habitantes->numero_identificacion}}</td>
                        <td>
                            <a href="{{URL::action('mascotasController@edit',$mascota->id)}}"><button class="btn btn-primary">Actualizar</button></a>
                            <a href="" data-target="#modal-delete-{{$mascota->id}}" data-target="" data-toggle="modal">
                                <button class="btn btn-danger">Eliminar</button>
                            </a>
                        </td>
                    </tr>
                    @include('mascota.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$mascotas->links()}}
    </div>
</div>
@endsection