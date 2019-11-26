<?php
 $readonly=(isset($readonly) && $readonly == 'S') ? 'readonly' : '';
 $disabled=(isset($readonly) && $readonly == 'readonly') ? 'disabled' : '';
?>
<div id="addEndereco" class="panel-collapse collapse {{ isset($params['endereco']) && count($params['endereco'])?'in':'' }}" role="tabpanel">

    <form class="form-horizontal" method="POST" action="{{ route('endereco.store') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="endereco[pessoa_id]" value="{{ $pessoa->id }}">
        <input type="hidden" id="idEndereco" name="endereco[id]" value="{{ Input::old('endereco.id') }}">
        <input type="hidden" id="endereco[tipo_id]" name="endereco[tipo_id]" value="1">

        @include('endereco.fields', ['params' => $params])

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>

    <hr />
</div>

<div class="table-responsive">
    <table class="table table-condensed table-striped">
        <thead>
        <tr>
            <th>Endereço</th>
            <th>Tipo Endereço</th
            <th width="65">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @forelse($pessoas->enderecos as $endereco)
            <tr>
                <td>{{ $endereco->logradouro }}, {{ $endereco->numero }} {{ $endereco->complemento or '' }} {{ $endereco->bairro }} - {{ $endereco->cidade->nome }}/{{ $endereco->cidade->uf }}</td>
                <td>
                @if ($endereco->tipo_id=="01")
                <span class="label label-default">End. Principal</span>
                @elseif ($endereco->tipo_id=="03")
                <span class="label label-primary">End. Instalacao</span>
                @else
                <span class="label label-primary">End. Cobrança</span>
                @endif
                </td>
                <td>
                    <a class="btn btn-info btn-xs enderecoCarregarDados" itemscope="{{ json_encode($endereco->toArray()) }}" {{ $disabled }}>
                        <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <a href="{{ route('enderecos.excluir', $endereco->id) }}" class="btn btn-danger btn-xs" {{ $disabled}}>
                        <i class="glyphicon glyphicon-remove"></i>
                    </a>
                    @if (empty($endereco->latitude))
                    <a href="{{ route('mapa', ["latitude"=>$endereco->cidade->latitude,"longitude"=>$endereco->cidade->longitude,"Cliente"=>$pessoa->id,"endereco"=>$endereco->id]) }}" class="btn btn-info btn-xs" {{ $disabled}}>
                        <i class="glyphicon glyphicon-map-marker"></i>
                    </a>

                    @else
                    <a href="{{ route('mapa', ["latitude"=>$endereco->latitude,"longitude"=>$endereco->longitude,"Cliente"=>$pessoa->id,"endereco"=>$endereco->id]) }}" class="btn btn-info btn-xs" {{ $disabled}}>
                        <i class="glyphicon glyphicon-map-marker"></i>
                    </a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Nenhum endereço encontrado</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<script>
    $(function() {

        $(".enderecoCarregarDados").click(function () {

            var dados = $.parseJSON($(this).attr('itemscope'));

            $("#addEndereco").collapse();

            $("#idEndereco").val(dados.id);
            $('#cep').val(dados.cep);

            $('#logradouro').val(dados.logradouro);
            $('#numero').val(dados.numero);
            $('#complemento').val(dados.complemento);
            $('#bairro').val(dados.bairro);
            $('#tipo_id').val(dados.tipo_id);
            $('#cidade_id').attr('default', dados.cidade.id);
            $('#uf').val(dados.cidade.uf);
            $('#uf').trigger('change');
        });

    });
</script>
