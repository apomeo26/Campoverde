@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Registrar Mercancía</h3>
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
{!!Form::open(array('url'=>'mercancia','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
        <br><label for="Role">Habitante</label>
            <select name="habitantes_id" id="habitantes_id" class="form-control selectpicker" data-livesearch="true" required>
                <option value="" disabled selected>Habitante:</option>
                @foreach($habitantes as $habitante)
                <option value="{{$habitante->id}}"> {{$habitante->nombre}} {{$habitante->apellidos}} - {{$habitante->numero_identificacion}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br><label for="num_referencia">Referencia</label>
            <input type="text" name="num_referencia" id="num_referencia" class="form-control" placeholder="Ingrese la referencia de la mercancía" maxlength="60" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br><label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese una descripción" maxlength="200" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br><label for="transportadora">Transportadora</label>
            <input type="text" name="transportadora" id="transportadora" class="form-control" placeholder="Ingrese la transportadora" maxlength="100" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="fecha_recibido">Fecha de recibido</label>
            <input type="date" name="fecha_recibido" id="fecha_recibido" class="form-control" value="{{date('Y-m-d') }}" required>
        </div>
    </div>
    <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span>Guardar</button>
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span>Vaciar campos</button>
            <a class="btn btn-info" type="reset" href="{{url('mercancia')}}"><span class="glyphicon glyphicon-home"></span>Regresar</a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection