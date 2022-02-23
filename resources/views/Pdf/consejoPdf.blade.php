<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Consejo | Campo Verde</title>
</head>

<body>

    <br>
    <br>

    <div class="row">
        <div class="col-xs-4">
            <!-- Imagen LOGO -->


        </div>

        <div class="col-xs-6">

            <h1 class="text-right">Condominio Campo Verde</h1>
            <h4 class="text-right"> Consejo </h5>
        </div>


    </div>

    <div class="container">

        <hr style="background-color: #B9C9C9; border: none; height: 2px;"> <br> <br>

        <table class="table table-bordered table-striped table-hover ">
            <tr>
                <th>CC</th>
                <th>Nombre Completo</th>

                <th>Correo</th>
                <th>Tipo Habitante</th>
                <th>Celular</th>
                <th>Bloque #</th>

                <th>Cargo</th>
                <th>Fecha Inicio</th>
                <th>Fecha Finalización</th>

            </tr>@foreach($habitantes as $ha)<tr>
                <td>CC:{{$ha->numero_identificacion}}</td>
                <td>{{$ha->nombre}} {{$ha->apellidos}}</td>

                <td>{{$ha->correo}}</td>
                <td>{{$ha->tipo_habitante}}</td>
                <td>{{$ha->telefono_celular}}</td>
                <td>{{$ha->bloque}} {{$ha->numero_apartamento}}</td>

                <td>{{$ha->cargo_consejo}}</td>
                <td>{{$ha->fecha_inicio}}</td>
                <td>{{$ha->fecha_final}}</td>


            </tr>@endforeach

        </table>

        <footer style="position: running(pageFooter);">
            <hr style="background-color: #3c506d; border: none; height: 2px;">
            <div class="span7">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4> Datos de contacto </h4>
                        <div class=" panel-body ">
                            <h5 class="text-center">Condominio Campo Verde</h5>
                            <h5 class="text-center">Tel. 555555</h5>
                            <h6 class="text'center">Version 2.0</h6>
                            <h4><small> NIT: 123456-1 </small></h4>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>