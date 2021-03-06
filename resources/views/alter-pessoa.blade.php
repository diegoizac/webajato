<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Comercial Laravel</title>

        <!-- Favicon -->
        <link href="{{URL::asset('img/favicon.ico')}}" rel="shortcut icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />

        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{URL::asset('js/ajax.js')}}"></script>
    </head>
    <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav" id="link-white">
                <li>
                    <a href="/person" style="text-decoration: none"
                       title="Página Inicial" style="margin-top: -3px">
                        <span class="glyphicon glyphicon-home"></span>
                        <span id="underline">Home</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"
                       href="#" style="text-decoration: none">
                        <span class="glyphicon glyphicon-pencil"></span>
                        <span id="underline">Cadastros</span>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('person.create')}}">Clientes</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="link-white">
                <li class="dropdown">
                    <a href="http://www.linkedin.com/in/diegoizac" style="text-decoration: none" target="_blank">
                        <img src="{{URL::asset('img/diego.jpg')}}"
                             class="img-circle" width="26" height="26"
                             style="margin-top: -3px">
                        <span id="underline">Diego Silva</span>
                    </a>
                </li>
                <li><a href="{{url('/')}}"
                       style="text-decoration: none">
                        <span class="glyphicon glyphicon-log-in"></span>
                        <span id="underline">Sair</span></a></li>
                <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            </ul>
        </div>
    </nav>
        <div id="line-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="center">
                        <h1><b>Cliente</b></h1>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="{{route('person.index')}}">Home</a></li>
                            <li><a href="{{route('person.index')}}">Clientes</a></li>
                            <li class="active">Alteração</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <br>
                    <h4 id="center"><b>ALTERAÇÃO DOS DADOS DO CLIENTE</b></h4>
                    <br>
                    <form method="post"
                          action="{{route('person.update', $person->id)}}"
                          enctype="multipart/form-data">
                        {!! method_field('put') !!}
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome"
                                       class="form-control"
                                       value="{{$person->nome}}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Sobrenome</label>
                                <input type="text" name="sobrenome"
                                       class="form-control"
                                       value="{{$person->sobrenome}}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">CPF</label>
                                <input type="text" name="cpf"
                                       class="form-control"
                                       value="{{$person->cpf}}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">RG</label>
                                <input type="text" name="rg"
                                       class="form-control"
                                       value="{{$person->rg}}"
                                       required>
                            </div>
                        </div>

{{--                        @include('endereco.listagem')--}}

                        <div class="col-md-12">
                            <button type="submit"
                                    class="btn btn-warning" id="black">
                                Alterar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
