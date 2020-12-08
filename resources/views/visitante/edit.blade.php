@extends('layout.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Visitante</h3>
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
{{Form::open(array('action'=>array('VisitanteController@update', $visitantes->id),'method'=>'patch'))}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$visitantes->nombre}}">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{$visitantes->apellidos}}">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br><label for="tipo_documento">Tipo Documento</label>
            <select name="tipo_documento" id="tipo_documento" class="form-control">
                <option value="CC">Cedula de Ciudadania</option>
                <option value="TI">Tarjeta de Identidad</option>
            </select>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="numero_identificacion">Documento del Visitante</label>
        <input type="number" name="numero_identificacion" id="numero_identificacion" class="form-control" value="{{$visitantes->numero_identificacion}}">
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="temperatura">Temperatura del Visitante</label>
        <input type="number" name="temperatura" id="temperatura" class="form-control" value="{{$visitantes->temperatura}}">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="fecha_visita">Fecha de Visita</label>
        <input type="date" name="fecha_visita" class="form-control" value="{{$visitantes->fecha_visita}}">
    </div>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-15">
    <div class="form-group"> <br>
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar
        </button>
        <a class="btn btn-info" type="reset" href="{{url('visitante')}}"><span class="glyphicon 
            glyphicon-home"></span> Regresar </a>
    </div>
</div>
</div>
{!!Form::close()!!}
@endsection