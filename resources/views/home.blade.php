@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success mb-3" style="box-shadow:10px 5px 5px #B8DABA">
            
                <div class="card-header" ><a href="{{url('consejo')}}" style="color: #007723;">Consejo</a></div>
                <div class="card-header"><a href="{{url('empleado')}}" style="color: #007723;">Empleados</a></div>
                <div class="card-header"><a href="{{url('evento')}}" style="color: #007723;">Eventos</a></div>
                <div class="card-header"><a href="{{url('factura')}}" style="color: #007723;">Facturación</a></div>
                <div class="card-header"><a href="{{url('habitante')}}" style="color: #007723;">Habitantes</a></div>
                <div class="card-header"><a href="{{url('mascota')}}" style="color: #007723;">Mascotas</a></div>
                <div class="card-header"><a href="{{url('mercancia')}}" style="color: #007723;">Mercancía</a></div>
                <div class="card-header"><a href="{{url('multa')}}" style="color: #007723;">Multas</a></div>
                <div class="card-header"><a href="{{url('parqueadero')}}" style="color: #007723;">Parqueaderos</a></div>
                <div class="card-header"><a href="{{url('Lista_vehiculo')}}" style="color: #007723;">Vehiculos</a></div>
                <div class="card-header"><a href="{{url('visitante')}}" style="color: #007723;">Visitantes</a></div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection