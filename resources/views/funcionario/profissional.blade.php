<div class="form-group">
    <label class="col-sm-3 control-label"><i>*</i>Formação:</label>
    <div class="col-sm-9">
        <select name="estado_civil" class="form-control" >
            <option selected disabled>Selecione uma...</option>
            <option value="1" >Primário</option>
            <option value="2" >Ensino Médio Cursando</option>
            <option value="3" >Ensino Médio</option>
            <option value="4" >Curso Técnico Cursando</option>
            <option value="5" >Curso Técnico</option>
            <option value="6" >Graduação Cursando</option>
            <option value="7" >Graduação</option>
            <option value="8" >Pós-Graduação/MBA Cursando</option>
            <option value="9" >Pós-Graduação/MBA</option>
            <option value="10" >Doutorado Cursando</option>
            <option value="11" >Doutorado</option>
            <option value="12" >Pós-Doutorado Cursando</option>
            <option value="13" >Pós-Doutorado</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label">*Empresa:</label>
    <div class="col-sm-3">
        <select name="empresa_id" class="form-control" >
            <option selected disabled>Selecione uma...</option>
            @foreach ($empresas as $empresa)
                <option value="{{$empresa->id }}">{{$empresa->pessoa->nome }}</option>
            @endforeach
        </select>
    </div>
    <label class="col-sm-3 control-label">*Setor:</label>
    <div class="col-sm-3">
        <select name="setor_id" class="form-control" >
            <option selected disabled>Selecione um...</option>
            @foreach ($setores as $setor)
                <option value="{{$setor->id }}" >{{$setor->setor }}</option>
            @endforeach
        </select>
    </div>
    <label class="col-sm-3 control-label">*Departamento:</label>
    <div class="col-sm-3">
        <select name="setor_id" class="form-control" >
            <option selected disabled>Selecione um...</option>
            @foreach ($departamentos as $departamento)
                <option value="{{$departamento->id }}" >{{$departamento->description }}</option>
            @endforeach
        </select>
    </div>
    <label class="col-sm-3 control-label">*Centro de Custo:</label>
    <div class="col-sm-3">
        <select name="setor_id" class="form-control" >
            <option selected disabled>Selecione um...</option>
            @foreach ($departamentos as $departamento)
                <option value="{{$departamento->id }}">{{$departamento->description }}</option>
            @endforeach
        </select>
    </div>
    <label class="col-sm-3 control-label">*Cargo:</label>
    <div class="col-sm-3">
        <select name="cargo_id" class="form-control" >
            <option selected disabled>Selecione um...</option>
            @foreach ($cargos as $cargo)
                <option value="{{$cargo->id }}" >{{$cargo->Cargo }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i>*</i>Admissão:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="data_admissao" name="data_admissao" value="{{ Input::old('funcionario.data_admissao' or '' )}}" placeholder="Data de Admissão" />
    </div>
    <label class="col-sm-3 control-label"><i></i>Rescisão:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="data_rescisao" name="data_rescisao" value="{{ Input::old('funcionario.data_rescisao' or '' )}}" placeholder="Data de Rescisão" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i>*</i>Salário:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="salario" name="salario" value="{{ Input::old('funcionario.salario' or '' )}}" placeholder="Salário" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i></i>Insalubridade:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="salario" name="salario" value="{{ Input::old('funcionario.salario' or '' )}}" placeholder="Salário" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i></i>Valor do Vale Transporte:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="valor_vale_transporte" name="valor_vale_transporte" value="{{ Input::old('funcionario.valor_vale_transporte' or '' )}}" placeholder="Valor do Vale Transporte" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i></i>Quantidade:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="numero_vale_transporte" name="numero_vale_transporte" value="{{ Input::old('funcionario.numero_vale_transporte' or '' )}}" placeholder="Número de Vale Transporte" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i></i>Vale Refeição:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="valor_refeicao" name="valor_refeicao" value="{{ Input::old('funcionario.valor_refeicao' or '' )}}" placeholder="Valor de Vale Refeição" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i>*</i>Exame Médico:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="data_exame_medico" name="data_exame_medico" value="{{ Input::old('funcionario.data_exame_medico' or '' )}}" placeholder="Data do Exame Médico" />
    </div>
    <label class="col-sm-3 control-label"><i></i>Validade:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="exame_validade" name="exame_validade" value="{{ Input::old('funcionario.exame_validade' or '' )}}" placeholder="Validade do Exame Médico de Rescisão" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i>*</i>Início da Experiência:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="experiencia_inicio" name="experiencia_inicio" value="{{ Input::old('funcionario.experiencia_inicio' or '' )}}" placeholder="Data do Início" />
    </div>
    <label class="col-sm-3 control-label"><i>*</i>Fim da Experiência:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="experiencia_fim" name="experiencia_fim" value="{{ Input::old('funcionario.experiencia_fim' or '' )}}" placeholder="Data do Fim" />
    </div>
</div>
<script>
    $(function () {
        $('#data_admissao').datetimepicker({locale: 'pt-br', showClose: true, format: "L"});
        $('#data_rescisao').datetimepicker({locale: 'pt-br', showClose: true, format: "L"});
        $('#data_exame_medico').datetimepicker({locale: 'pt-br', showClose: true, format: "L"});
        $('#exame_validade').datetimepicker({locale: 'pt-br', showClose: true, format: "L"});
        $('#experiencia_inicio').datetimepicker({locale: 'pt-br', showClose: true, format: "L"});
        $('#experiencia_fim').datetimepicker({locale: 'pt-br', showClose: true, format: "L"});
    });

    $(function(){
        $.fn.datepicker.defaults.autoclose = true;
        $.fn.datepicker.defaults.language = "pt-BR";
        $('.tipoSexo').change(function () {
            var labelCertificado_Reservista = $('#' + $(this).attr('labelCertificado_Reservista'));
            if ($(this).val() === '1') {
                $("#certificado_reservista").removeClass('hide');
            };
            if ($(this).val() === '2') {
                $("#certificado_reservista").addClass('hide');
            };
        });
    });
</script>