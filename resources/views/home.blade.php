@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{url('consejo')}}">Consejo</a></div>
                <div class="card-header"><a href="{{url('empleado')}}">Empleados</a></div>
                <div class="card-header"><a href="{{url('evento')}}">Eventos</a></div>
                <div class="card-header"><a href="{{url('factura')}}">Facturación</a></div>
                <div class="card-header"><a href="{{url('habitante')}}">Habitantes</a></div>
                <div class="card-header"><a href="{{url('mascota')}}">Mascotas</a></div>
                <div class="card-header"><a href="{{url('mercancia')}}">Mercancía</a></div>
                <div class="card-header"><a href="{{url('multa')}}">Multas</a></div>
                <div class="card-header"><a href="{{url('parqueadero')}}">Parqueaderos</a></div>
                <div class="card-header"><a href="{{url('Lista_vehiculo')}}">Vehiculos</a></div>
                <div class="card-header"><a href="{{url('visitante')}}">Visitantes</a></div>
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