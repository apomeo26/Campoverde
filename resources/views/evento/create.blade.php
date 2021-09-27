@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo Evento</h3>
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
{!!Form::open(array('url'=>'evento','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br><label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="" disabled selected>Elija el evento:</option>
                <option>Fiesta</option>
                <option>Reunión</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese una descripción" maxlength="200" required>
            
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="" disabled selected>Elija el estado:</option>
                <option>Activo</option>
                <option>Inactivo</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="fecha_registro">Fecha de registro</label>
            <input type="text" name="fecha_registro" id="fecha_registro" class="form-control" value="{{date('Y-m-d H:i:s') }}" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="fecha_finalizacion">Fecha de finalización</label>
            <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="Role">Responsable</label>
            <select name="habitantes_id" id="habitantes_id" class="form-control selectpicker" data-livesearch="true" required>
                <option value="" disabled selected>Responsable:</option>
                @foreach($habitantes as $habitante)
                <option value="{{$habitante->id}}"> {{$habitante->nombre}} {{$habitante->apellidos}}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span>Guardar</button>
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span>Vaciar campos</button>
            <a class="btn btn-info" type="reset" href="{{url('evento')}}"><span class="glyphicon glyphicon-home"></span>Regresar</a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection