@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3><b>Nuevo Empleado</b></h3>
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
{!!Form::open(array('url'=>'empleado','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos">
        </div>
    </div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="numero_identificacion">Documento del Empleado</label>
        <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" placeholder="Digite el número de Documento">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="direccion">Direccion del Empleado</label>
        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Digite direccion del empleado">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="telefono">Telefono del Empleado</label>
        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Digite telefono del empleado">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="correo">Correo del Empleado</label>
        <input type="email" name="correo" id="correo" class="form-control" placeholder="Digite correo del empleado">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="cargo">Cargo del Empleado</label>
        <input type="text" name="cargo" id="cargo" class="form-control" placeholder="Digite cargo del empleado">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="dotacion">Dotacion del Empleado</label>
        <input type="text" name="dotacion" id="dotacion" class="form-control" placeholder="Digite dotacion del empleado">
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br>
        <label for="fecha_registro">Fecha de Registro</label>
        <input type="date" name="fecha_registro" class="form-control">
    </div>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-xs-15">
    <div class="form-group">
        <br> <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span>
            Guardar</button>
        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span>
            Vaciar Campos</button>
        <a class="btn btn-info" type="reset" href="{{url('empleado')}}"><span class="glyphicon 
            glyphicon-home"></span> Regresar </a>
    </div>
</div>
</div>
{!!Form::close()!!}
@endsection