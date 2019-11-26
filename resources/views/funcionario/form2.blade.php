<style>
    .avatar-pic {
        width: 150px;
    }

    #abas {
        margin: 0;
        padding: 0;

    }

    #abas li {
        display: inline;
    }

    #abas li a {
        display: block;
        width: auto;
        padding: 3px 8px;
        margin: 0 1px 0 0;
        width: 150px;
        float: left;

        color: #797979;
        text-decoration: none;
        text-indent: 5px;
    }

    #abas li a.selected {
        background: #888;
        color: #FFF;
        cursor: default;
        text-decoration: underline;
    }

    .contaba {
        clear: both;
    }

    #tab1 {
        margin: 0 1px 0 0;
        padding: 0;
        padding: 3px 8px;
    }

    label {
        display: block;
    }

    input[type=text]

</style>
@extends('app')

@section('content')
    <form class="form-horizontal" role="form" method="post" action="{{ route('funcionarios.salvar') }}"
          enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h2>Criar Novo Funcionário</h2>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <a href="{{ route('funcionarios.index') }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Dados do Funcionário
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="container-fluid">
                                        <div class="form-group">
                                            <figure class="figure">
                                                <label for="avatar">
                                                    <img class="figure-img img-fluid img-thumbnail"
                                                    src ="{{ asset('vendor/laraerp/template/images/homem.png') }}"
                                                         style="width:auto; height:auto; border:none;"/>
                                                    <figcaption class="figure-caption">
                                                        <h3><a id="modal"
                                                                                          href="#modal-container"
                                                                                          role="button"
                                                                                          class="alert-link"
                                                                                          data-toggle="modal">Foto</a>
                                                        </h3></figcaption>
                                                </label>
                                            </figure>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Dados da pessoa
                                        </div>
                                        <div class="panel-body">

                                            @include('pessoa.funcionario', ['params' => old()])


                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Endereço
                                        </div>
                                        <div class="panel-body">
                                            @include('endereco.fields', ['params' => old()])
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Contato
                                        </div>
                                        <div class="panel-body">
                                            @include('contato.fields', ['params' => old()])
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Dados Complementares
                                        </div>
                                        <div class="panel-body">
                                            @include('funcionarios.fields', ['params' => old()])
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Currículo
                                        </div>
                                        <div class="panel-body">
                                            @include('curriculo.fields', ['params' => old()])
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-save-file"></i>Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Inicio do modal-->
        <div class="modal fade" id="modal-container" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">
                            Editar Foto do Perfil
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="text-center">
                                <!--Imagem  do Usuario-->
                                <label for="avatarModal">
                                    <img src ="{{ asset('vendor/laraerp/template/images/homem.png') }}"
                                         class="img-fluid img-thumbnail mx-auto d-block"
                                         style="width:150px; height:auto; border:none;"/>
                                </label>
                                <!--Fim da Imagem do Usuario-->
                            </div>
                            <p class="help-block">
                                <input type="file" class="form-control-file" name="foto" id="fotoFile"
                                       aria-describedby="fileHelp">
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--Botão Selecionar-->
                        <button type="button" class="btn btn-success" data-dismiss="modal">
                            <i class="glyphicon glyphicon-picture"></i> Confirmar Foto!
                        </button>
                        <!--Fim Botão Selecionar-->
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        $(function () {
            // abas
            // oculta todas as abas
            $("div.contaba").hide();
            // mostra somente  a primeira aba
            $("div.contaba:first").show();
            // seta a primeira aba como selecionada (na lista de abas)
            $("#abas a:first").addClass("selected");
            // quando clicar no link de uma aba
            $("#abas a").click(function () {
                // oculta todas as abas
                $("div.contaba").hide();
                // tira a seleção da aba atual
                $("#abas a").removeClass("selected");

                // adiciona a classe selected na selecionada atualmente
                $(this).addClass("selected");
                // mostra a aba clicada
                $($(this).attr("href")).show();
                // pra nao ir para o link
                return false;
            });
        });

        var avatarInput = document.getElementById('avatar')
        var img = document.querySelector('label[for=avatar] img')
        var imgModal = document.querySelector('label[for=avatarModal] img')
        fotoFile.onchange = function (e) {
            img.classList.add('preview')
            img.src = URL.createObjectURL(e.target.files[0])
            imgModal.classList.add('preview')
            imgModal.src = URL.createObjectURL(e.target.files[0])
        }

    </script>
@endsection
