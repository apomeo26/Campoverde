@extends('layout.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar informacion de la mascota</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
{{Form::open(array('action'=>array('mascotasController@update', $mascotas->id),'method'=>'patch'))}}
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" value="{{$mascotas->tipo}}">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <label for="raza">Raza</label>
            <input type="text" name="raza" id="raza" class="form-control" value="{{$mascotas->raza}}">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$mascotas->nombre}}">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <label for="color">Color</label>
            <input type="text" name="color" id="color" class="form-control" value="{{$mascotas->color}}">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="Role">Responsable</label>
            <select name="habitantes_id" id="habitantes_id" class="form-control selectpicker" data-livesearch="true">
                <option value="" diseable selected >Responsable:</option>
                @foreach($habitantes as $habitante)
                <option value="{{$habitante->id}}"> {{$habitante->nombre}} - {{$habitante->apellidos}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>

            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar </button>

            <a class="btn btn-info" type="reset" href="{{url('mascota')}}"><span class="glyphiconglyphicon-home"></span> Regresar </a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection