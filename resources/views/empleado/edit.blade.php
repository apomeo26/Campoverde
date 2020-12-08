@extends('layout.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Empleado</h3>
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
{{Form::open(array('action'=>array('EmpleadoController@update', $empleado->id),'method'=>'patch'))}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$empleado->nombre}}">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{$empleado->apellidos}}">
        </div>
    </div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="numero_identificacion">Documento del Empleado</label>
        <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" value="{{$empleado->numero_identificacion}}">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="direccion">Direccion del Empleado</label>
        <input type="text" name="direccion" id="direccion" class="form-control" value="{{$empleado->direccion}}">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="telefono">Telefono del Empleado</label>
        <input type="text" name="telefono" id="telefono" class="form-control" value="{{$empleado->telefono}}">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="correo">Correo del Empleado</label>
        <input type="email" name="correo" id="correo" class="form-control" value="{{$empleado->correo}}">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="cargo">Cargo del Empleado</label>
        <input type="text" name="cargo" id="cargo" class="form-control" value="{{$empleado->cargo}}">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="dotacion">Dotacion del Empleado</label>
        <input type="text" name="dotacion" id="dotacion" class="form-control" value="{{$empleado->dotacion}}">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="fecha_registro">Fecha de Registro</label>
        <input type="date" name="fecha_registro" class="form-control" value="{{$empleado->fecha_registro}}">
    </div>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-15">
    <div class="form-group"> <br>
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar
        </button>
        <a class="btn btn-info" type="reset" href="{{url('empleado')}}"><span class="glyphicon 
            glyphicon-home"></span> Regresar </a>
    </div>
</div>
</div>
{!!Form::close()!!}
@endsection