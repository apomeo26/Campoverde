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
{{Form::open(array('action'=>array('HabitantesController@update', $Habitantes->id),'method'=>'patch'))}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$Habitantes->nombre}}" maxlength="45" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="Solo Letras" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{$Habitantes->apellidos}}" maxlength="45" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="Solo Letras" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="tipo_documento">Tipo de Documento</label>
            <select name="tipo_documento" id="tipo_documento" class="form-control" required>
                <option value="{{$Habitantes->tipo_documento}}" selected>{{$Habitantes->tipo_documento}}</option>
                <option>Cedula Ciudadania</option>
                <option>Tarjeta de Identidad</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="numero_identificacion">Numero de Documento</label>
            <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" value="{{$Habitantes->numero_identificacion}}" minlength="8" maxlength="10" pattern="[0-9]+" title="Solo Numeros" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="telefono">Telefono Fijo</label>
            <input type="text" name="telefono_fijo" id="telefono_fijo" class="form-control" value="{{$Habitantes->telefono_fijo}}" minlength="7" maxlength="7" pattern="[0-9]+" title="Solo Numeros" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="telefono">Telefono celular</label>
            <input type="text" name="telefono_celular" id="telefono" class="form-control" value="{{$Habitantes->telefono_celular}}" minlength="10" maxlength="10" pattern="[0-9]+" title="Solo Numeros" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="correo">Correo electronico</label>
            <input type="email" name="correo" id="correo" class="form-control" value="{{$Habitantes->correo}}" maxlength="45" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="fecha_registro">Fecha de Registro</label>
            <input type="date" name="fecha_registro" class="form-control" value="{{$Habitantes->fecha_registro}}" required>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="estado_vigencia">Estado</label>
            <select name="estado_vigencia" id="estado_vigencia" class="form-control" required>
                <option value="{{$Habitantes->estado_vigencia}}" diseable selected>{{$Habitantes->estado_vigencia}}</option>
                <option>Activo</option>
                <option>Inactivo</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <br>
            <label for="Role">Tipo habitante</label>
            <select name="tipo_habitante" id="tipo_habitante" class="form-control selectpicker" data-livesearch="true" required>
                @foreach($detalle_habitante as $detalle_h)
                <option value="{{$detalle_h->tipo_habitante}}​​​​​" selected>{{$detalle_h->tipo_habitante}}​​​​​</option>
                @endforeach
                <option>Propietario</option>
                <option>Propietario/Residente</option>
                <option>Residente</option>
                <option>Residente/Titular</option>
            </select>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="Role">Número apartamento</label>
            <select name="apartamento_id" id="apartamento_id" class="form-control selectpicker" data-livesearch="true" required>
                @foreach($detalle_habitante as $ap)
                <option value="{{$ap->ap_id}}" selected>{{$ap->numero_apartamento}} - {{$ap->bloque}}​​​​​</option>
                @endforeach
                @foreach($apartamento as $ap)
                <option value="{{$ap->id}}"> {{$ap->numero_apartamento}} - {{$ap->bloque}}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-15">
        <div class="form-group"> <br>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar
            </button>
            <a class="btn btn-info" type="reset" href="{{url('habitante')}}"><span class="glyphicon 
            glyphicon-home"></span> Regresar </a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection