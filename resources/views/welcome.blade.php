<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CampoVerde</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            
        }

        .position-ref {
            position: relative;
            
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

       
    </style>
</head>

<body>


    <div class="flex-center position-ref full-height">

        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}"> <button>Home</button> </a>
            @else
            <a href="{{ route('login') }}"><button class="btn btn-success">Login</button></a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"><button class="btn btn-primary">Registrarme</button></a>
            @endif
            @endauth
        </div>
        @endif
        



        <style type="text/css">
            #boton1 {
                background: #fff;
                float: left;
                top: 450px;
                position: absolute;
                color: #56B649;
                width: 30%;
                font-weight: bold;
                text-align: center;
                font-size: 40px;
                border-radius: 12px;
                border: 2px solid #fff;
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            #boton2 {
                background: #4073FC;
                float: left;
                top: 550px;
                margin-left: -400px;
                position: absolute;
                color: #fff;
                width: 20%;
                font-weight: bold;
                text-align: center;
                font-size: 20px;
                border-radius: 12px;
                border: 2px solid #4073FC;
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            #boton3 {
                background: #4073FC;
                float: left;
                top: 550px;
                margin-left: 400px;
                position: absolute;
                color: #fff;
                width: 20%;
                font-weight: bold;
                text-align: center;
                font-size: 20px;
                border-radius: 12px;
                border: 2px solid #4073FC;
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            #boton4 {
                background: #4073FC;
                float: left;
                top: 610px;
                margin-left: -400px;
                position: absolute;
                color: #fff;
                width: 20%;
                font-weight: bold;
                text-align: center;
                font-size: 20px;
                border-radius: 12px;
                border: 2px solid #4073FC;
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            #boton5 {
                background: #4073FC;
                float: left;
                top: 610px;
                margin-left: 400px;
                position: absolute;
                color: #fff;
                width: 20%;
                font-weight: bold;
                text-align: center;
                font-size: 20px;
                border-radius: 12px;
                border: 2px solid #4073FC;
                box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }

            #titulo {
                margin-top: -585px;
                position: absolute;
                font-size: 30px;
                margin-left: -1000px;
                color: #56B649;
                font-weight: bold;
                
            }
        </style>
       <img src="{{asset('dist/img/campoverde.jpeg')}}" height="50%" width="95%" style="border-radius: 20px; box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-top:#bdbdbd 5px solid; ">

        <div id="boton1"> Bienvenidos</div>
        <div id="boton2"><span class="glyphicon glyphicon-earphone"></span> (2) 123 4567</div>
        <div id="boton3"> <span class="glyphicon glyphicon-map-marker"></span> Calle 50 #101-60</div>
        <div id="boton4"> <span class="glyphicon glyphicon-envelope"></span> campoverde@gmail.com</div>
        <div id="boton5"> <span class="glyphicon glyphicon-home"></span> Nosotros</div>
        <div id="titulo">Campo Verde</div>


        <div class="content">



            <!-- <div class="title m-b-md">
                CampoVerde 2.0
            </div> -->

            <!--  <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>-->
        </div>
    </div>
</body>

</html>