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

    #tab1, #tab2, #tab3, #tab4 {
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
        <input type="hidden" name="user_id" value="{{ $funcionarios->user_id }}">
        <input type="hidden" name="id" value="{{ $funcionarios->id }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">

                    @if ($funcionarios->sexo==1)
                        <h2>Funcionário {{ $funcionarios->pessoa->nome }}</h2>
                    @elseif ($funcionarios->sexo==2)
                        <h2>Funcionária {{ $funcionarios->pessoa->nome }}</h2>
                    @endif
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
                            Edição de Dados do Funcionário
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">

                                                    <div class="panel-body">

                                                        <div class="form-group">
                                                            <figure class="figure">
                                                                <label for="avatar">
                                                                    <img class="figure-img img-fluid img-thumbnail"
                                                                         @if ($funcionarios->foto)
                                                                         src="data:image/jpeg;base64,{{ base64_encode($funcionarios->foto) }}"
                                                                         @else
                                                                         src ="{{ asset('vendor/laraerp/template/images/homem.png') }}"
                                                                         @endif
                                                                         style="width:auto; height:auto; border:none;"/>
                                                                    <figcaption class="figure-caption"><a id="modal"
                                                                                                          href="#modal-container"
                                                                                                          role="button"
                                                                                                          class="alert-link"
                                                                                                          data-toggle="modal">Editar
                                                                            Foto</a></figcaption>
                                                                </label>
                                                            </figure>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">

                                            </div>


                                        </div>
                                    </div>


                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                Dados da pessoa
                                                            </div>
                                                            <div class="panel-body">
                                                                @include('pessoa.funcionario', ['params' => $funcionarios->pessoa->toArray()])
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                Dados adicionais

                                                                <a class="collapsed btn btn-xs btn-success pull-right" data-toggle="collapse" href="#addFields" aria-expanded="false">
                                                                    <i class="glyphicon glyphicon-plus"></i> Criar novo
                                                                </a>
                                                            </div>
                                                            <div class="panel-body">

                                                                @include('funcionario.listagem', ['params' => Input::old(), 'pessoa' => $funcionarios->pessoa])

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                Dados Profissionais

                                                                <a class="collapsed btn btn-xs btn-success pull-right" data-toggle="collapse" href="#addProfissional" aria-expanded="false">
                                                                    <i class="glyphicon glyphicon-plus"></i> Criar novo
                                                                </a>
                                                            </div>
                                                            <div class="panel-body">

                                                                @include('funcionario.listagem_profissional', ['params' => Input::old(), 'pessoa' => $funcionarios->pessoa])

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-md-10 col-md-offset-2">
                                        <button type="submit" class="btn btn-success">
                                            <i class="glyphicon glyphicon-save-file">
                                            </i>
                                            Salvar alterações
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Endereços

                            <a class="collapsed btn btn-xs btn-success pull-right" data-toggle="collapse" href="#addEndereco" aria-expanded="false">
                                <i class="glyphicon glyphicon-plus"></i> Criar novo
                            </a>
                        </div>
                        <div class="panel-body">

                            @include('endereco.listagem', ['params' => Input::old(), 'pessoa' => $funcionarios->pessoa])

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contatos

                            <a class="collapsed btn btn-xs btn-success pull-right" data-toggle="collapse" href="#addContato" aria-expanded="false">
                                <i class="glyphicon glyphicon-plus"></i> Criar novo
                            </a>
                        </div>
                        <div class="panel-body">
                            @include('contato.listagem', ['params' => Input::old(), 'pessoa' => $funcionarios->pessoa])
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Curriculo

                            <a class="collapsed btn btn-xs btn-success pull-right" data-toggle="collapse" href="#addCurriculo" aria-expanded="false">
                                <i class="glyphicon glyphicon-plus"></i> Criar novo
                            </a>
                        </div>
                        <div class="panel-body">

                            @include('curriculo.listagem', ['params' => Input::old(), 'pessoa' => $funcionarios->pessoa])

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
                                    <img @if ($funcionarios->foto)
                                         src="data:image/jpeg;base64,{{ base64_encode($funcionarios->foto) }}"
                                         @else
                                         src ="{{ asset('vendor/laraerp/template/images/homem.png') }}"
                                         @endif
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
    </div>
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
        $(function () {
            $('#datePicker1').datetimepicker({locale: 'pt-br', showClose: true, format: "L"});
            $('#datePicker2').datetimepicker({locale: 'pt-br', showClose: true, format: "L"});
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

        $('.tipoSexo').change(function (){
            var labelCertificado_Reservista = $('#' + $(this).attr('labelCertificado_Reservista'));
            if ($(this).val() === 'Masculino') {
                $("#certificado_reservista").removeClass('hide');
            }
            if ($(this).val() === 'Feminino') {
                $("#certificado_reservista").addClass('hide');
            }
        });
    </script>
@endsection
