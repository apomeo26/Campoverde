@extends('layout.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar miembro</h3>
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
{{Form::open(array('action'=>array('ConsejoController@update', $consejo->id),'method'=>'patch'))}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    
        <div class="form-group">
            <br>
            <label for="fecha_inicio">Fecha de Registro</label>
            <input type="date" name="fecha_inicio" class="form-control" value="{{$consejo->fecha_inicio}}" required>
        </div>

        <div class="form-group">
            <br>
            <label for="fecha_final">Fecha de Finalización</label>
            <input type="date" name="fecha_final" class="form-control" value="{{$consejo->fecha_final}}" required>
        </div>


        <div class="form-group">
            <br>
            <label for="cargo_consejo">Cargo</label>
            <select name="cargo_consejo" id="cargo_consejo" class="form-control selectpicker" data-livesearch="true" required value="{{$consejo->cargo_consejo}}">
                <option value="{{$consejo->cargo_consejo}}" selected>{{$consejo->cargo_consejo}}</option>
                <option>Presidente</option>
                <option>Vicepresidente</option>
                <option>Tesorero</option>
                <option>Secretario</option>
                <option>Fiscal interno</option>
                <option>Representante</option>
            </select>
        </div>


        <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group"> <br>
                <button class="btn btn-primary" type="submit">
                    <span class="glyphicon glyphicon-refresh"></span>Actualizar</button>
                <a class="btn btn-info" type="reset" href="{{url('consejo')}}">
                    <span class="glyphicon glyphicon-home"></span>Regresar</a>
            </div>
        </div>


    </div>
</div>
{!!Form::close()!!}
@endsection