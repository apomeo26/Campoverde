@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar evento</h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
{{Form::open(array('action'=>array('EventoController@update',$eventos->id),'method'=>'patch'))}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" value="{{$eventos->tipo}}" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$eventos->descripcion}}" maxlength="20" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="{{$eventos->estado}}" selected>{{$eventos->estado}}</option>
                <option>Activo</option>
                <option>Inactivo</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <label for="fecha_registro">Fecha de registro</label>
            <input type="date" name="fecha_registro" id="fecha_registro" class="form-control" value="{{$eventos->fecha_registro}}" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <label for="fecha_finalizacion">Fecha de finalización</label>
            <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control" value="{{$eventos->fecha_finalizacion}}" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <label for="Role">Responsable</label>
            <select name="habitantes_id" id="habitantes_id" class="form-control selectpicker" data-livesearch="true" required>
                <option value="{{$eventos->habitantes->id}}" diseable selected>{{$eventos->habitantes->nombre}} {{$eventos->habitantes->apellidos}} - {{$eventos->habitantes->numero_identificacion}}</option>
                @foreach($habitantes as $habitante)
                <option value="{{$habitante->id}}"> {{$habitante->nombre}} {{$habitante->apellidos}} - {{$habitante->numero_identificacion}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
        <br>
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-home"></span>Actualizar</button>
            <a class="btn btn-info" type="reset" href="{{url('evento')}}"><span class="glyphicon glyphicon-home"></span>Regresar</a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection