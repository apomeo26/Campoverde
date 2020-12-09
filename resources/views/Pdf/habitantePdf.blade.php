<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Habitantes| Sistema Web</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Reporte de Habitantes</h3><img src="" alt="" width='100px'><br><br>
        <h1 class="text-center">Unidad residencial Campo Verde</h1>
        <h3 class="text-center">NIT: 123456-1</h3>
        <h3 class="text-center">Tel. 555555</h3><br> <br> <br>
        <table class="table table-bordered table-striped table-hover ">
            <tr>
                <th>Número de identificación</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Tipo Habitante</th>
                <th>Celular</th>
                <th>Bloque</th>
                <th>Apartamento</th>
            </tr>@foreach($habitantes as $ha)<tr>
                <td>CC:{{$ha->numero_identificacion}}</td>
                <td>{{$ha->nombre}}</td>
                <td>{{$ha->apellidos}}</td>
                
                <td>{{$ha->correo}}</td>
                <td>{{$ha->tipo_habitante}}</td>
                <td>{{$ha->telefono_celular}}</td>
                <td>{{$ha->bloque}}</td>
                <td>{{$ha->numero_apartamento}}</td>
                

            </tr>@endforeach
            
        </table>    
        
        <h5 class="text-center">Unidad residencial Campo Verde</h5>
        <h6 class="text-center"">Version 1.0</h6>
    </div>
</body>

</html>