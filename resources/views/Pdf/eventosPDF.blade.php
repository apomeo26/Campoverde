<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Eventos | Campo Verde</title>
</head>

<body>
    <div class="row">
    <div class="col-xs-4">
            <!-- Imagen LOGO -->


        </div>
        <div class="col-xs-6">

            <h1 class="text-right">Condominio Campo Verde</h1>
            <h4 class="text-right"> Reporte de Eventos </h5>
        </div>
    </div>
    <div class="container">
    <hr style="background-color: #B9C9C9; border: none; height: 2px;">
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Fecha de Registro</th>
            </tr>@foreach($eventos as $evento)<tr>
                <td>{{$evento->tipo}}</td>
                <td>{{$evento->descripcion}}</td>
                <td>{{$evento->estado}}</td>
                <td>{{$evento->fecha_registro}}</td>
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