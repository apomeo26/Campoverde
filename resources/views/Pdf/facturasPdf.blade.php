<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Facturacion| Sistema Web</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Factura Electronica</h3><img src="" alt="" width='100px'><br><br>
        <h1 class="text-center">Unidad residencial Campo Verde</h1>
        <h3 class="text-center">NIT: 123456-1</h3>
        <h3 class="text-center">Tel. 5555555</h3><br> <br> <br>

        <table class="table table-bordered table-striped table-hover">

        <!-- Primer bloque factura -->
            <tr>
                    <th>Numero de factura</th>
                    <th>Emision</th>
                    <th>Vencimiento</th>
                    <th>Estado</th>
            </tr>
            @foreach($facturas as $fact)
                <tr>
                    <td>{{$fact->id}}</td>
                    <td>{{$fact->fecha_emision}}</td>
                    <td>{{$fact->fecha_vencimiento}}</td>
                    <td>{{$fact->estado_factura}}</td>
                </tr>
            @endforeach

         <!-- Segundo bloque factura -->
            <tr>
                    <th>Apartamento</th>
                    <th>Identificación</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
            </tr>
            @foreach($facturas as $fact)
                <tr>
                    <td>{{$fact->numero_apartamento}}</td>
                    <td>{{$fact->numero_identificacion}}</td>
                    <td>{{$fact->nombre}}</td>
                    <td>{{$fact->apellidos}}</td>
                </tr>
            @endforeach

        <!-- Tercer bloque detalle conceptos -->    

                <tr>
                     <th>Tipo Cobro</th>
                     <th colspan="2">Concepto</th>
                     <th>valor</th>
                </tr>
            @foreach($conceptos as $con)
                <tr>
                    <td>{{$con->tipo_cobro}}</td>
                    <td colspan="2">{{$con->descripcion}}</td>
                    <td>$ {{number_format($con->valor,0)}}</td>
                   
                </tr>
            @endforeach

        <!-- Cuarto bloque Totales -->   

            @foreach($total as $tot)
                <tr>
                    <td colspan="3"><b>Total</b></td>
                    <td ><b>$ {{number_format($tot->valor,0)}}</b></td>
                   
                   
                </tr>
            @endforeach             


        </table>
        <h5 class="text-center">Unidad residencial Campo Verde</h5>
        <h6 class="text'center">Version 1.0</h6>
    </div>
</body>

</html>