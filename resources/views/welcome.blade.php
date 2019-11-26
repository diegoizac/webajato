<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro de Clientes Web a Jato</title>
        <!-- Favicon -->
        <link href="{{URL::asset('img/favicon.ico')}}" rel="shortcut icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{URL::asset('css/style-home.css')}}" rel="stylesheet" type="text/css" />
        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{URL::asset('js/ajax.js')}}"></script>
        <script src="https://kit.fontawesome.com/3c32baff80.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height" id="fundo">
            <div class="content">
                <div class="title m-b-md">
                    <i class="fa fa-user-circle"> Cadastro de Clientes Web a Jato</i>
                </div>
                <div class="links">
                    <a href="{{url('/person')}}"
                       title="Ver Clientes" style="margin-top: -3px">
                        <i class="fas fa-users"> Clientes</i>
                    </a>
                    <a href="{{url('http://webajato.com.br')}}"
                       title="Web A Jato" style="margin-top: -3px" target="_blank">
                        <img src="{{URL::asset('img/logo.png')}}">
                    </a>
                    <a href="https://github.com/diegoizac/"
                        title="Git Hub Diego Izac" style="margin-top: -3px" target="_blank">
                        <i class="fab fa-github"> GitHub</i>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
