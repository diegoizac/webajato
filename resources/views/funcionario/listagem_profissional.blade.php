<?php
$readonly=(isset($readonly) && $readonly == 'S') ? 'readonly' : '';
$disabled=(isset($readonly) && $readonly == 'readonly') ? 'disabled' : '';
?>

<div id="addProfissional" class="panel-collapse collapse {{ isset($params['profissional']) && count($params['profissional'])?'in':'' }}">
    <form class="form-horizontal" method="POST" action="#">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="profissional[pessoa_id]" value="{{ $pessoa->id }}">
        @include('funcionario.profissional', ['params' => $params])
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
    <hr />
</div>

<script>
    $(function() {


        $(".carregarProfissional").click(function () {

            var profissional = $.parseJSON($(this).attr('itemscope'));

            $("#addProfissional").collapse();

            $("#idProfissional").val(profissional.id);

        });

    });
</script>