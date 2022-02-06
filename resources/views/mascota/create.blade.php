@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Nueva Mascota</h3>
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
{!!Form::open(array('url'=>'mascota','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br><label for="tipo">Tipo</label>
        <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Tipo" maxlength="50" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="Solo Letras" required>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br><label for="raza">Raza</label>
        <input type="text" name="raza" id="raza" class="form-control" placeholder="Raza" maxlength="50" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="Solo Letras" required>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br> <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" maxlength="50" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="Solo Letras" required>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <br> <label for="color">Color</label>
        <input type="text" name="color" id="color" class="form-control" placeholder="Color" maxlength="50" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="Solo Letras" required>
    </div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group">
        <label for="Role">Responsable</label>
        <select name="habitantes_id" id="habitantes_id" class="form-control selectpicker" data-livesearch="true" required>
            <option value="" disabled selected>Responsable:</option>
            @foreach($habitantes as $habitante)
            <option value="{{$habitante->id}}"> {{$habitante->nombre}} {{$habitante->apellidos}} - {{$habitante->numero_identificacion}}
            </option>

            @endforeach
        </select>
    </div>
</div>
<div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
    <div class="form-group"> 
        <br>
        <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span>Guardar</button>
        <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar Campos</button>
        <a class="btn btn-info" type="reset" href="{{url('mascota')}}"><span class="glyphicon glyphicon-home"></span> Regresar </a>
    </div>
</div>
</div>
{!!Form::close()!!}
@endsection