<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CampoVerde</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles -->
    <style>
        html,
        body {

            font-family: 'Nunito', sans-serif;

        }

        header {
            height: 100vh;
            background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
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

        .img-galeria {
            width: 30%;
            display: block;
            margin-left: 20px;
            margin-bottom: 15px;

            cursor: pointer;
        }
    </style>
</head>

<body>

    <header class="header" id="inicio">


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

        <img src="{{asset('dist/img/principal.svg')}}" alt="" class="img-galeria">
        <div>
        <h1 class="titulo">CampoVerde</h1>
        </div>



    </header>


    <style type="text/css">
       
        .subtitulo {
            text-align: center;
            font-weight: 300;
            color: #08549c;
            margin-bottom: 40px;
            font-size: 40px;
        }

        .titulo {
            text-align: center;
            font-weight: 300;
            margin-bottom: 40px;
            font-size: 60px;
        }

        .brand {
            font-weight: 500;
            font-size: 45px;
            color: #56B649;
            margin-left: 20px;
        }



        footer {
            background: white;
            padding-bottom: 0.1px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .info-footer{

            margin-right: 20px;
        }

        .footer-info{
            flex-wrap: wrap;
            height: 90px;
            margin-left: 700px;
        }
        
    </style>

    <footer id="contacto">
        <div class="contenedor footer-content">
            <div class="contacts-us">
                <h2 class="brand">CAMPO VERDE</h2>

            </div>

            <img src="{{asset('dist/img/footer-info.svg')}}" alt="" class="footer-info">
            <div class="contacto">
                <h4 class="info-footer">(2) 123 4567</h4>
                <h4 class="info-footer">Calle 50 #101-60</h4>
                <h4 class="info-footer">campoverde@gmail.com</h4>
            </div>
        </div>

    </footer>

</body>

</html>