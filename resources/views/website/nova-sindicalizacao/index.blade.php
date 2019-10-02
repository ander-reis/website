@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9">
            <h2 class="mb-4">Nova Sindicalização</h2>
            <div class="mb-5">
                <div class="mb-4">
                    <span class="text-danger">*</span> Campo Obrigatório
                </div>

                {{ Form::open(['id' => 'formSindicalizacao', 'route' => 'nova-sindicalizacao.store', 'method' => 'POST']) }}
                    <div class="p-1 mb-2 rounded bg-secondary text-white">Dados Pessoais</div>

                    <div class="form-group fl {{ $errors->has('Nome') ?'has-error' : '' }}">
                        {{ Form::label('Nome', 'Nome completo', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                        {{ Form::text('Nome', null, ['id' => 'Nome','class' => 'form-control']) }}
                        @include('website.components.form-components._help_block',['field' => 'Nome'])
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-4 fl {{ $errors->has('CPF') ?'has-error' : '' }}">
                            {{ Form::label('CPF', 'CPF', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('CPF', null, ['id' => 'CPF','class' => 'form-control', 'placeholder' => '000.000.00-00']) }}
                            @include('website.components.form-components._help_block',['field' => 'CPF'])
                        </div>
                        <div class="form-group col-md-4 fl {{ $errors->has('Nascimento') ?'has-error' : '' }}">
                            {{ Form::label('Nascimento', 'Nascimento', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('Nascimento', null, ['id' => 'Nascimento','class' => 'form-control', 'placeholder' => 'DD/MM/AAAA']) }}
                            @include('website.components.form-components._help_block',['field' => 'Nascimento'])
                        </div>
                        <div class="form-group col-md-4 fl {{ $errors->has('Sexo') ?'has-error' : '' }}">
                            {{ Form::label('Sexo', 'Sexo', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::select('Sexo', ['1' => 'Feminino', '0' => 'Masculino'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) }}
                            @include('website.components.form-components._help_block',['field' => 'Sexo'])
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-4 fl {{ $errors->has('RG') ?'has-error' : '' }}">
                            {{ Form::label('RG', 'RG', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('RG', null, ['id' => 'RG','class' => 'form-control', 'placeholder' => 'Apenas números']) }}
                            @include('website.components.form-components._help_block',['field' => 'RG'])
                        </div>
                        <div class="form-group col-md-4 fl {{ $errors->has('EstadoCivil') ?'has-error' : '' }}">
                            {{ Form::label('EstadoCivil', 'Estado Civil', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::select('EstadoCivil', ['0' => 'Casada(o)', '1' => 'Divorciada(o)', '2' => 'Separada(o)', '3' => 'Solteira(o)', '4' => 'Viúva(o)', '5' => 'Outros'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) }}
                            @include('website.components.form-components._help_block',['field' => 'EstadoCivil'])
                        </div>
                        <div class="form-group col-md-4 fl {{ $errors->has('Nacionalidade') ?'has-error' : '' }}">
                            {{ Form::label('Nacionalidade', 'Nacionalidade', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('Nacionalidade', null, ['id' => 'Nacionalidade','class' => 'form-control']) }}
                            @include('website.components.form-components._help_block',['field' => 'Nacionalidade'])
                        </div>
                    </div>

                    <div class="p-1 mb-2 rounded bg-secondary text-white">Dados de contato</div>

                    <div class="form-group fl {{ $errors->has('Email') ?'has-error' : '' }}">
                        {{ Form::label('Email', 'E-mail', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                        {{ Form::text('Email', null, ['id' => 'Email','class' => 'form-control', 'placeholder' => 'email@email.com']) }}
                        @include('website.components.form-components._help_block',['field' => 'Email'])
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-6 fl {{ $errors->has('Telefone1') ?'has-error' : '' }}">
                            {{ Form::label('Telefone1', 'Telefone principal', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('Telefone1', null, ['id' => 'Telefone1','class' => 'form-control', 'placeholder' => '(XX) XXXXX-XXXX']) }}
                            @include('website.components.form-components._help_block',['field' => 'Telefone1'])
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('Telefone2', 'Telefone secundário', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('Telefone2', null, ['id' => 'Telefone2','class' => 'form-control', 'placeholder' => '(XX) XXXXX-XXXX']) }}
                        </div>
                    </div>
                    <div class="form-group row mt-2 align-items-center">
                        <div class="col-md-1">
                            {{ Form::label('CEP', 'CEP', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                        </div>
                        <div class="col-md-3 fl {{ $errors->has('CEP') ?'has-error' : '' }}">
                            {{ Form::text('CEP', null, ['id' => 'CEP','class' => 'form-control', 'placeholder' => '00000-000']) }}
                            @include('website.components.form-components._help_block',['field' => 'CEP'])
                        </div>
                        <div class="col-md-8 mt-2 mt-md-0">
                            <button type="button" class="btn btn-primary" onclick="pesquisacep(cep.value)">Pesquisar</button>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-7">
                            {{ Form::label('Endereco', 'Endereço', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('Endereco', null, ['id' => 'Endereco','class' => 'form-control','readonly']) }}
                        </div>
                        <div class="form-group col-md-2 fl {{ $errors->has('Numero') ?'has-error' : '' }}">
                            {{ Form::label('Numero', 'Nº', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('Numero', null, ['id' => 'Numero','class' => 'form-control']) }}
                            @include('website.components.form-components._help_block',['field' => 'Numero'])
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Complemento" class="control-label font-weight-bold">Complemento</label>
                            <input type="text" id="Complemento" name="Complemento" class="form-control" maxlength="13">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-5">
                            {{ Form::label('Bairro', 'Bairro', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('Bairro', null, ['id' => 'Bairro','class' => 'form-control','readonly']) }}
                        </div>
                        <div class="form-group col-md-5">
                            {{ Form::label('Cidade', 'Cidade', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('Cidade', null, ['id' => 'Cidade','class' => 'form-control','readonly']) }}
                        </div>
                        <div class="form-group col-md-2">
                            {{ Form::label('Estado', 'Estado', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('Estado', null, ['id' => 'Estado','class' => 'form-control','readonly']) }}
                        </div>
                    </div>

                    <div class="p-1 mb-2 rounded bg-secondary text-white">Informações acadêmicas</div>

                    <div class="form-group row mb-0">
                        <div class="form-group col-md-6 fl {{ $errors->has('Disciplina') ?'has-error' : '' }}">
                            {{ Form::label('Disciplina', 'Disciplinas que leciona ', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('Disciplina', null, ['id' => 'Disciplina','class' => 'form-control']) }}
                            @include('website.components.form-components._help_block',['field' => 'Disciplina'])
                        </div>
                        <div class="form-group col-md-6 fl {{ $errors->has('Situacao') ?'has-error' : '' }}">
                            {{ Form::label('Situacao', 'Situação', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::select('Situacao', ['Em atividade' => 'Em atividade', 'Aposentada(o)' => 'Aposentada(o)', 'Aposentada(o) em atividade na escola' => 'Aposentada(o) em atividade na escola'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) }}
                            @include('website.components.form-components._help_block',['field' => 'Situacao'])
                        </div>
                    </div>
                    
                    <div class="font-weight-bold">Níveis de ensino <span class="text-danger">*</span></div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('Infantil', '1', false, ['class' => 'custom-control-input', 'id' => 'Infantil']) }}
                            {{ Form::label('Infantil', 'Educação Infantil', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('FundI', '1', false, ['class' => 'custom-control-input', 'id' => 'FundI']) }}
                            {{ Form::label('FundI', 'Ensino Fundamental (1ª a 5ª)', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('FundII', '1', false, ['class' => 'custom-control-input', 'id' => 'FundII']) }}
                            {{ Form::label('FundII', 'Ensino Fundamental (6ª a 9ª)', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('Medio', '1', false, ['class' => 'custom-control-input', 'id' => 'Medio']) }}
                            {{ Form::label('Medio', 'Ensino Médio', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('Superior', '1', false, ['class' => 'custom-control-input', 'id' => 'Superior']) }}
                            {{ Form::label('Superior', 'Ensino Superior', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('Supletivo', '1', false, ['class' => 'custom-control-input', 'id' => 'Supletivo']) }}
                            {{ Form::label('Supletivo', 'Ensino Supletivo', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('CursosLivres', '1', false, ['class' => 'custom-control-input', 'id' => 'CursosLivres']) }}
                            {{ Form::label('CursosLivres', 'Cursos livres', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('Tecnico', '1', false, ['class' => 'custom-control-input', 'id' => 'Tecnico']) }}
                            {{ Form::label('Tecnico', 'Ensino Técnico', ['class' => 'custom-control-label']) }}
                        </div>
                    </div>

                    <div class="p-1 mb-2 rounded bg-secondary text-white">Instituições de ensino que leciona</div>

                    <div class="form-group fl {{ $errors->has('NomeInstI') ?'has-error' : '' }}">
                        {{ Form::label('NomeInstI', 'Nome da instituição', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                        {{ Form::text('NomeInstI', null, ['id' => 'NomeInstI','class' => 'form-control']) }}
                        @include('website.components.form-components._help_block',['field' => 'NomeInstI'])
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-8 fl {{ $errors->has('EndInstI') ?'has-error' : '' }}">
                            {{ Form::label('EndInstI', 'Endereço', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('EndInstI', null, ['id' => 'EndInstI','class' => 'form-control']) }}
                            @include('website.components.form-components._help_block',['field' => 'EndInstI'])
                        </div>
                        <div class="form-group col-md-4 fl {{ $errors->has('TelInstI') ?'has-error' : '' }}">
                            {{ Form::label('TelInstI', 'Telefone', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('TelInstI', null, ['id' => 'TelInstI','class' => 'form-control']) }}
                            @include('website.components.form-components._help_block',['field' => 'TelInstI'])
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        {{ Form::label('NomeInstII', 'Nome da instituição', ['class' => 'control-label font-weight-bold']) }}
                        {{ Form::text('NomeInstII', null, ['id' => 'NomeInstII','class' => 'form-control']) }}
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-8">
                            {{ Form::label('EndInstII', 'Endereço', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('EndInstII', null, ['id' => 'EndInstII','class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-md-4">
                            {{ Form::label('TelInstII', 'Telefone', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('TelInstII', null, ['id' => 'TelInstII','class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        {{ Form::label('NomeInstIII', 'Nome da instituição', ['class' => 'control-label font-weight-bold']) }}
                        {{ Form::text('NomeInstIII', null, ['id' => 'NomeInstIII','class' => 'form-control']) }}
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-8">
                            {{ Form::label('EndInstIII', 'Endereço', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('EndInstIII', null, ['id' => 'EndInstIII','class' => 'form-control']) }}
                        </div>
                        <div class="form-group col-md-4">
                            {{ Form::label('TelInstIII', 'Telefone', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('TelInstIII', null, ['id' => 'TelInstIII','class' => 'form-control']) }}
                        </div>
                    </div>

                    <div class="p-1 mt-3 mb-2 rounded bg-secondary text-white">Termo de aceite</div>

                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" value="1" id="optAutorizacao">
                        <label class="custom-control-label" for="optAutorizacao">Autorizo o desconto em folha de pagamento da contribuição associativa, no valor e forma determinados pela Assembleia Geral dos Professores.</label>
                    </div>

                    <div class="mt-4">
                        {{ Form::submit('Enviar informações',['name' => 'btnSubmit', 'id' => 'btnSubmit', 'class' => 'btn btn-primary']) }}
                    </div>                        

                {{ Form::close() }}
            </div>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
@endsection
