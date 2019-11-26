<div class="form-group">
    <label class="col-sm-3 control-label"><i>*</i>Matrícula:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="matricula" name="matricula"
               value="{{ Input::old('data_exame_medico' or '' )}}"
               placeholder="Matrícula"/>
    </div>
</div>
    <div class="form-group">
        <label class="col-sm-3 control-label"><i>*</i>Sexo:</label>
        <div class="col-sm-9">
            <select name="sexo" class="form-control none tipoSexo">
                <option selected disabled>Selecione um...</option>
                <option value="1" >Masculino</option>
                <option value="2" >Feminino</option>
            </select>
        </div>
    </div>
<div class="form-group">
        <label class="col-sm-3 control-label"><i>*</i>Estado Civil:</label>
        <div class="col-sm-9">
            <select name="estado_civil" class="form-control" >
                <option selected disabled>Selecione um...</option>
                <option value="1" >Solteiro</option>
                <option value="2" >Casado</option>
                <option value="3" >Separado</option>
                <option value="4" >Divorciado</option>
                <option value="5" >Viuvo</option>
            </select>
        </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i>*</i>RG:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="rg" name="rg" value="" placeholder="Registro" />
    </div>
    <label class="col-sm-3 control-label"><i></i>Emissor:</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="rg_emissao" name="rg_emissor" value="" placeholder="Orgão Emissor" />
    </div>
    <label class="col-sm-3 control-label"><i></i>Emissão:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="rg_data_emissao" name="rg_data_emissao" value="" placeholder="Data Emissão" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i>*</i>CTPS:</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="ctps" name="ctps" value="" placeholder="Carteira de TRabalho" />
    </div>
    <label class="col-sm-1 control-label"><i></i>Série:</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="serie" name="serie" value="" placeholder="Número de Série" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i>*</i>PIS:</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" id="pis" name="pis" value="" placeholder="PIS" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i>*</i>Título:</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="titulo_eleitor" name="titulo_eleitor" value="" placeholder="Título de Eleitor" />
    </div>
</div>
<div id="certificado_reservista" class="form-group hide">
    <label class="col-sm-3 control-label"><i>*</i>Certificado de Reservista:</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="certificado_reservista" name="certificado_reservista" value="" placeholder="Certificado de Reservista" />
    </div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label"><i></i>CNH:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="cnh" name="cnh" value="" placeholder="CNH" />
    </div>
    <label class="col-sm-2 control-label">Categoria:</label>
    <div class="col-sm-4">
        <select name="cnh_categoria" class="form-control">
            <option selected disabled>Selecione uma...</option>
            <option value="1" >A</option>
            <option value="2" >B</option>
            <option value="3" >C</option>
            <option value="4" >D</option>
            <option value="5" >E</option>
            <option value="6" >AB</option>
            <option value="7" >AC</option>
            <option value="8" >AD</option>
            <option value="9" >AE</option>
        </select>
    </div>
    <label class="col-sm-3 control-label"><i></i>Validade:</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="cnh_validade" name="cnh_validade" value="" placeholder="Validade" />
    </div>
</div>
<script>
    $(function () {
        $('#rg_data_emissao').datetimepicker({locale: 'pt-br', showClose: true, format: "L"});
        $('#cnh_validade').datetimepicker({locale: 'pt-br', showClose: true, format: "L"});
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