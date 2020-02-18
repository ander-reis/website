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

                    <div class="form-group fl {{ $errors->has('nome') ?'has-error' : '' }}">
                        {{ Form::label('nome', 'Nome completo', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                        {{ Form::text('nome', null, ['id' => 'nome','class' => 'form-control','maxlength' => '50']) }}
                        @include('website.form-components._help_block',['field' => 'nome'])
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-4 fl {{ $errors->has('cpf') ?'has-error' : '' }}">
                            {{ Form::label('cpf', 'CPF', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('cpf', null, ['id' => 'cpf','class' => 'form-control', 'placeholder' => '000.000.00-00','maxlength' => '14']) }}
                            @include('website.form-components._help_block',['field' => 'cpf'])
                        </div>
                        <div class="form-group col-md-4 fl {{ $errors->has('nascimento') ?'has-error' : '' }}">
                            {{ Form::label('nascimento', 'Nascimento', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::date('nascimento', null, ['id' => 'nascimento','class' => 'form-control', 'placeholder' => 'DD/MM/AAAA','maxlength' => '10']) }}
                            @include('website.form-components._help_block',['field' => 'nascimento'])
                        </div>
                        <div class="form-group col-md-4 fl {{ $errors->has('sexo') ?'has-error' : '' }}">
                            {{ Form::label('sexo', 'Sexo', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::select('sexo', ['1' => 'Feminino', '0' => 'Masculino'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) }}
                            @include('website.form-components._help_block',['field' => 'sexo'])
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-4 fl {{ $errors->has('rg') ?'has-error' : '' }}">
                            {{ Form::label('rg', 'RG', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('rg', null, ['id' => 'rg','class' => 'form-control', 'placeholder' => 'Apenas números','maxlength' => '12']) }}
                            @include('website.form-components._help_block',['field' => 'rg'])
                        </div>
                        <div class="form-group col-md-4 fl {{ $errors->has('estadocivil') ?'has-error' : '' }}">
                            {{ Form::label('estadocivil', 'Estado Civil', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::select('estadocivil', ['0' => 'Casada(o)', '1' => 'Divorciada(o)', '2' => 'Separada(o)', '3' => 'Solteira(o)', '4' =>'Viúva(o)', '5' => 'Outros'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) }}
                            @include('website.form-components._help_block',['field' => 'estadocivil'])
                        </div>
                        <div class="form-group col-md-4 fl {{ $errors->has('nacionalidade') ?'has-error' : '' }}">
                            {{ Form::label('nacionalidade', 'Nacionalidade', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('nacionalidade', null, ['id' => 'nacionalidade','class' => 'form-control','maxlength' => '20']) }}
                            @include('website.form-components._help_block',['field' => 'nacionalidade'])
                        </div>
                    </div>

                    <div class="p-1 mb-2 rounded bg-secondary text-white">Dados de contato</div>

                    <div class="form-group fl {{ $errors->has('email') ?'has-error' : '' }}">
                        {{ Form::label('email', 'E-mail', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                        {{ Form::text('email', null, ['id' => 'email','class' => 'form-control', 'placeholder' => 'email@email.com','maxlength' => '120']) }}
                        @include('website.form-components._help_block',['field' => 'email'])
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-6 fl {{ $errors->has('celular') ?'has-error' : '' }}">
                            {{ Form::label('celular', 'Telefone celular', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('celular', null, ['id' => 'celular','class' => 'form-control', 'placeholder' => '(XX) XXXXX-XXXX','maxlength' => '15']) }}
                            @include('website.form-components._help_block',['field' => 'celular'])
                        </div>
                        <div class="form-group col-md-6 fl {{ $errors->has('telefoneresidencial') ?'has-error' : '' }}">
                            {{ Form::label('telefoneresidencial', 'Telefone residencial', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('telefoneresidencial', null, ['id' => 'telefoneresidencial','class' => 'form-control', 'placeholder' => '(XX) XXXX-XXXX','maxlength' => '14']) }}
                            @include('website.form-components._help_block',['field' => 'telefoneresidencial'])
                        </div>
                    </div>
                    <div class="form-group row mt-2 align-items-center">
                        <div class="col-md-1 fl {{ $errors->has('cep') ?'has-error' : '' }}">
                            {{ Form::label('cep', 'CEP', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                        </div>
                        <div class="col-md-3 fl {{ $errors->has('cep') ?'has-error' : '' }}">
                            {{ Form::text('cep', null, ['id' => 'cep','class' => 'form-control', 'placeholder' => '00000-000','maxlength' => '9']) }}
                            @include('website.form-components._help_block',['field' => 'cep'])
                        </div>
                        <div class="col-md-8 mt-2 mt-md-0">
                            {{ Form::button('Pesquisar', ['id' => 'btPesquisaCep','class' => 'btn btn-primary']) }}
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-7 fl {{ $errors->has('endereco') ?'has-error' : '' }}">
                            {{ Form::label('endereco', 'Endereço', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('endereco', null, ['id' => 'endereco','class' => 'form-control','readonly']) }}
                            @include('website.form-components._help_block',['field' => 'endereco'])
                        </div>
                        <div class="form-group col-md-2 fl {{ $errors->has('numero') ?'has-error' : '' }}">
                            {{ Form::label('numero', 'Nº', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('numero', null, ['id' => 'numero','class' => 'form-control','maxlength' => '6']) }}
                            @include('website.form-components._help_block',['field' => 'numero'])
                        </div>
                        <div class="form-group col-md-3">
                            {{ Form::label('complemento', 'Complemento', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('complemento', null, ['id' => 'complemento','class' => 'form-control','maxlength' => '50']) }}
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-5">
                            {{ Form::label('bairro', 'Bairro', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('bairro', null, ['id' => 'bairro','class' => 'form-control','readonly']) }}
                        </div>
                        <div class="form-group col-md-5">
                            {{ Form::label('cidade', 'Cidade', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('cidade', null, ['id' => 'cidade','class' => 'form-control','readonly']) }}
                        </div>
                        <div class="form-group col-md-2">
                            {{ Form::label('estado', 'Estado', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('estado', null, ['id' => 'estado','class' => 'form-control','readonly']) }}
                        </div>
                    </div>

                    <div class="p-1 mb-2 rounded bg-secondary text-white">Informações acadêmicas</div>

                    <div class="form-group row mb-0">
                        <div class="form-group col-md-6 fl {{ $errors->has('disciplina') ?'has-error' : '' }}">
                            {{ Form::label('disciplina', 'Disciplinas que leciona ', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('disciplina', null, ['id' => 'disciplina','class' => 'form-control','maxlength' => '150']) }}
                            @include('website.form-components._help_block',['field' => 'disciplina'])
                        </div>
                        <div class="form-group col-md-6 fl {{ $errors->has('situacao') ?'has-error' : '' }}">
                            {{ Form::label('situacao', 'Situação', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::select('situacao', ['Em atividade' => 'Em atividade', 'Aposentada(o)' => 'Aposentada(o)', 'Aposentada(o) em atividade na escola' => 'Aposentada(o) em atividade na escola'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) }}
                            @include('website.form-components._help_block',['field' => 'situacao'])
                        </div>
                    </div>

                    <div class="font-weight-bold">Níveis de ensino <span class="text-danger">*</span></div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('optInfantil', '1', false, ['class' => 'custom-control-input', 'id' => 'optInfantil']) }}
                            {{ Form::label('optInfantil', 'Educação Infantil', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('optFundI', '1', false, ['class' => 'custom-control-input', 'id' => 'optFundI']) }}
                            {{ Form::label('optFundI', 'Ensino Fundamental (1ª a 5ª)', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('optFundII', '1', false, ['class' => 'custom-control-input', 'id' => 'optFundII']) }}
                            {{ Form::label('optFundII', 'Ensino Fundamental (6ª a 9ª)', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('optMedio', '1', false, ['class' => 'custom-control-input', 'id' => 'optMedio']) }}
                            {{ Form::label('optMedio', 'Ensino Médio', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('optSuperior', '1', false, ['class' => 'custom-control-input', 'id' => 'optSuperior']) }}
                            {{ Form::label('optSuperior', 'Ensino Superior', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('optSupletivo', '1', false, ['class' => 'custom-control-input', 'id' => 'optSupletivo']) }}
                            {{ Form::label('optSupletivo', 'Ensino Supletivo', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('optCursosLivres', '1', false, ['class' => 'custom-control-input', 'id' => 'optCursosLivres']) }}
                            {{ Form::label('optCursosLivres', 'Cursos livres', ['class' => 'custom-control-label']) }}
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            {{ Form::checkbox('optTecnico', '1', false, ['class' => 'custom-control-input', 'id' => 'optTecnico']) }}
                            {{ Form::label('optTecnico', 'Ensino Técnico', ['class' => 'custom-control-label']) }}
                        </div>
                    </div>

                    <div class="p-1 mb-2 rounded bg-secondary text-white">Instituições de ensino que leciona</div>

                    <div class="form-group fl {{ $errors->has('NomeInstI') ?'has-error' : '' }}">
                        {{ Form::label('NomeInstI', 'Nome da instituição', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                        {{ Form::text('NomeInstI', null, ['id' => 'NomeInstI','class' => 'form-control','maxlength' => '50']) }}
                        @include('website.form-components._help_block',['field' => 'NomeInstI'])
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-8 fl {{ $errors->has('EndInstI') ?'has-error' : '' }}">
                            {{ Form::label('EndInstI', 'Endereço', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('EndInstI', null, ['id' => 'EndInstI','class' => 'form-control','maxlength' => '63']) }}
                            @include('website.form-components._help_block',['field' => 'EndInstI'])
                        </div>
                        <div class="form-group col-md-4 fl {{ $errors->has('TelInstI') ?'has-error' : '' }}">
                            {{ Form::label('TelInstI', 'Telefone', ['class' => 'control-label font-weight-bold']) }} <span class="text-danger font-weight-bold">*</span>
                            {{ Form::text('TelInstI', null, ['id' => 'TelInstI','class' => 'form-control','maxlength' => '9']) }}
                            @include('website.form-components._help_block',['field' => 'TelInstI'])
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        {{ Form::label('NomeInstII', 'Nome da instituição', ['class' => 'control-label font-weight-bold']) }}
                        {{ Form::text('NomeInstII', null, ['id' => 'NomeInstII','class' => 'form-control','maxlength' => '50']) }}
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-8">
                            {{ Form::label('EndInstII', 'Endereço', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('EndInstII', null, ['id' => 'EndInstII','class' => 'form-control','maxlength' => '63']) }}
                        </div>
                        <div class="form-group col-md-4">
                            {{ Form::label('TelInstII', 'Telefone', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('TelInstII', null, ['id' => 'TelInstII','class' => 'form-control','maxlength' => '9']) }}
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        {{ Form::label('NomeInstIII', 'Nome da instituição', ['class' => 'control-label font-weight-bold']) }}
                        {{ Form::text('NomeInstIII', null, ['id' => 'NomeInstIII','class' => 'form-control','maxlength' => '50']) }}
                    </div>
                    <div class="form-group row mb-0">
                        <div class="form-group col-md-8">
                            {{ Form::label('EndInstIII', 'Endereço', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('EndInstIII', null, ['id' => 'EndInstIII','class' => 'form-control','maxlength' => '63']) }}
                        </div>
                        <div class="form-group col-md-4">
                            {{ Form::label('TelInstIII', 'Telefone', ['class' => 'control-label font-weight-bold']) }}
                            {{ Form::text('TelInstIII', null, ['id' => 'TelInstIII','class' => 'form-control','maxlength' => '9']) }}
                        </div>
                    </div>

                    <div class="p-1 mt-3 mb-2 rounded bg-secondary text-white">Termo de aceite</div>

                    @component('website.form-components._form_group',['field' => 'optAutorizacao'])
                        <div class="custom-control custom-checkbox">
                            {{ Form::checkbox('optAutorizacao', '1', false, ['class' => 'custom-control-input', 'id' => 'optAutorizacao']) }}
                            {{ Form::label('optAutorizacao', 'Autorizo o desconto em folha de pagamento da contribuição associativa, no valor e forma determinados pela Assembleia Geral dos Professores.', ['class' => 'custom-control-label']) }}
                        </div>
                    @endcomponent

                    <div class="mt-4">
                        {{ Form::submit('Enviar informações',['name' => 'btnSubmit', 'id' => 'btnSubmit', 'class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>

    @push('pesquisa-cep-script')
        <script type="text/javascript">
            $(document).ready(function () {
                $('#cpf').mask('000.000.000-00', {reverse: true});
                $('#cep').mask('00000-000');
                $('#celular').mask('(00) 00000-0000');
                $('#telefoneresidencial').mask('(00) 0000-0000');

                $("#btPesquisaCep").on("click", function (){
                    pesquisacep(cep.value);
                });

                $("#formSindicalizacao").submit(function( event ) {
                    $("#btnSubmit").prop("value", "Enviando...");
                    $("#btnSubmit").prop("disabled", true);
                });
            });
        </script>
    @endpush
@endsection
