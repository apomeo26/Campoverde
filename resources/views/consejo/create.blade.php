@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nuevo miembro</h3>
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
{!!Form::open(array('url'=>'consejo','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}


<!--<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br><label for="numero_identificacion">Numero de Documento</label>
        <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" placeholder="Digite el número de Documento" minlength="8" maxlength="10" pattern="[0-9]+" title="Solo Numeros" required> 
    </div>-->
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Role">Habitante</label>
        <select name="habitantes_id" id="habitantes_id" class="form-control selectpicker" data-livesearch="true">
            <option value="" disabled selected>Habitante:</option>
            @foreach($habitantes as $ha)
            <option value="{{$ha->id}}"> {{$ha->nombre}} {{$ha->apellidos}} - {{$ha->tipo_habitante}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="fecha_inicio">Fecha de Registro</label>
        <input type="date" name="fecha_inicio" class="form-control" required>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="fecha_final">Fecha de Finalización</label>
        <input type="date" name="fecha_final" class="form-control" required>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="cargo_consejo">Cargo</label>
        <select name="cargo_consejo" id="cargo_consejo" class="form-control" required>
            <option value="" disabled selected>Eliga su cargo:</option>
            <option>Presidente</option>
            <option>Vicepresidente</option>
            <option>Tesorero</option>
            <option>Secretario</option>
            <option>Fiscal Interno</option>
            <option>Representante</option>
        </select>
    </div>
</div>

<div class="col-lg-11 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span>
            Guardar</button>
        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span>
            Vaciar Campos</button>
        <a class="btn btn-info" type="reset" href="{{url('consejo')}}"><span class="glyphicon glyphicon-home"></span>
            Regresar </a>
    </div>
</div>

{!!Form::close()!!}
@endsection