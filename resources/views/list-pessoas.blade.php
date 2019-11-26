<!-- Stored in resources/views/list-pessoas.blade.php -->
<!--
 Lista clientes cadastrados
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Pessoas Web a Jato</title>
    <!-- Favicon -->
    <link href="{{URL::asset('img/favicon.ico')}}" rel="shortcut icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/lightbox.css')}}" rel="stylesheet" type="text/css" />
    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{URL::asset('js/ajax.js')}}"></script>
    <script src="{{URL::asset('js/lightbox.js')}}"></script>
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
                <h1><b>CLIENTES</b></h1>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="{{route('person.index')}}">Home</a></li>
                    <li class="active">Clientes</li>
                </ol>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br />
                <h4 id="center"><b>CLIENTES CADASTRADOS ({{$total}})</b></h4>
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="GET" class="form-inline">
                                <div class="pull-right">
                                    <a href="{{route('person.create')}}"
                                       class="btn btn-success" title="Cadastrar Cliente">
                                        <i class="glyphicon glyphicon-plus"></i>  Cadastrar novo</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Lista de Clientes
                                </div>
                                <div class="panel-body">
                                    <form method="POST">
                                        <div class="table-responsive col-sm-12">
                                            <table class="table table-condensed table-striped">
                                                <thead>
                                                <tr>
                                                    <th id="left">Código</th>
                                                    <th>Nome</th>
                                                    <th>Sobrenome</th>
                                                    <th>CPF</th>
                                                    <th width="65">&nbsp;</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($pessoas as $pessoa)
                                                    <tr>
                                                        <td>
                                                            <a href="{{route('person.edit', $pessoa->id) }}">#{{$pessoa->id}}</a>
                                                        </td>
                                                        <td>{{ $pessoa->nome}}</td>
                                                        <td>{{ $pessoa->sobrenome}}</td>
                                                        <td>{{ $pessoa->cpf }}</td>
                                                        <td>
                                                            <a href="{{route('person.edit', $pessoa->id) }}" class="btn btn-info btn-xs" data-toggle="tooltip"
                                                               data-placement="top" title="Alterar">
                                                                <i class="glyphicon glyphicon-edit"></i>
                                                            </a>
                                                            <form style="display: inline-block;" method="post"
                                                                  action="{{route('person.destroy', $pessoa->id)}}"
                                                                  data-toggle="tooltip" data-placement="top"
                                                                  title="Excluir"
                                                                  onsubmit="return confirm('Confirma exclusão?')">
                                                                {{method_field('DELETE')}}{{ csrf_field() }}
                                                                <button type="submit">
                                                                    <a href="{{ route('person.destroy', $pessoa->id) }}" class="btn btn-danger btn-xs">
                                                                        <i class="glyphicon glyphicon-remove"></i>
                                                                    </a>
                                                                </button></form></td>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<img src="{{URL::asset('img/subir.png')}}"
     id="up"
     style="display: none;"
     alt="Ícone Subir ao Topo"
     title="Subir ao topo?">
</body>
</html>
