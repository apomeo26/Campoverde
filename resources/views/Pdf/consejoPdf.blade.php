<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Consejo | Sistema Web</title>
</head>

<body>

<br> 
<br> 

<div class="row">
<div class="col-xs-4">    <!-- Imagen LOGO -->
        <h2>
            <div class="col-xs-4 col-xs-offset-5" >
            <img 
            style="margin-right: -280px; margin-left: -45px; 
            margin-bottom: -150px; width: 124px; height: auto; border-radius: 18px;"
            class="user-image1"
            border-radius:10px;
            src="http://localhost/Camposverdes-pro/Campoverde/public/dist/img/logo2.jpg"  
            alt="User Image" > 
            </div>
        </h2>
        
</div>

        <div class="col-xs-6">
            <h3 class=" ">Listado De Los miembros del consejo</h3>
            <h1 class="text-right">Unidad residencial Campo Verde</h1>
            <h4 class="text-right"> Nota: Actuales </h5>
        </div>


</div>

    <div class="container">
    
    <hr style="background-color: #B9C9C9; border: none; height: 2px;" > <br> <br> 

        <table class="table table-bordered table-striped table-hover ">
            <tr>
                <th># Identificación</th>
                <th>Nombre Completo</th>
               
                <th>Correo</th>
                <th>Tipo Habitante</th>
                <th>Celular</th>
                <th>Bloque #</th>

                <th>cargo del miembro</th>
                <th>Fecha Incio</th>
                <th>Fecha Finaliza</th>
                
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
            <hr style="background-color: #3c506d; border: none; height: 2px;" >
                <div class="span7">            
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <h4> Datos de contacto </h4>
                            <div class=" panel-body ">
                                <h5 class="text-center">Unidad residencial Campo Verde</h5>
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