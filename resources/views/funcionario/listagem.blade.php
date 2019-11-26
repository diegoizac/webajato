<?php
$readonly=(isset($readonly) && $readonly == 'S') ? 'readonly' : '';
$disabled=(isset($readonly) && $readonly == 'readonly') ? 'disabled' : '';
?>
<div id="addFields" class="panel-collapse collapse {{ isset($params['fields']) && count($params['fields'])?'in':'' }}">
    <form class="form-horizontal" method="POST" action="#">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="dados[pessoa_id]" value="{{ $pessoa->id }}">
        @include('funcionario.fields', ['params' => $params])
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
    <hr />
</div>

<script>
    $(function() {

        $(".carregarFields").click(function () {

            var fields = $.parseJSON($(this).attr('itemscope'));

            $("#addFields").collapse();

            $("#idFields").val(fields.id);

        });

    });
</script>