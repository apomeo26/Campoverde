<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Eventos| Sistema Web</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Reporte de Eventos</h3><img align="right" src="" alt="" width='100px'><br><br>
        <h1 class="text-center">Unidad residencial Campo Verde</h1>
        <h3 class="text-center">NIT: 123456-1</h3>
        <h3 class="text-center">Tel. 555555</h3><br> <br> <br>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>id</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Estado</th>
                <th>Fecha de Registro</th>
            </tr>@foreach($eventos as $evento)<tr>
                <td>ID: {{$evento->id}}</td>
                <td>{{$evento->tipo}}</td>
                <td>{{$evento->descripcion}}</td>
                <td>{{$evento->estado}}</td>
                <td>{{$evento->fecha_registro}}</td>
            </tr>@endforeach
        </table>
        <h5 class="text-center">Unidad residencial Campo Verde</h5>
        <h6 align="center">version 1.0</h6>
    </div>
</body>

</html>