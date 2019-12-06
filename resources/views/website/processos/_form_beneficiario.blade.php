<h5>Informações Pessoais</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-8'])
        {{ Form::label('Nome', 'Nome', ['class' => 'control-label']) }}
        {{ Form::text('Nome', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('sexo', 'Sexo', ['class' => 'control-label']) }}
        {{ Form::select('sexo', ['Masculino', 'Feminino'], null, ['placeholder' => 'Selecione o Sexo', 'class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('cpf', 'CPF', ['class' => 'control-label']) }}
        {{ Form::text('cpf', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('rg', 'RG', ['class' => 'control-label']) }}
        {{ Form::text('RG', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('data', 'Data de Nascimento', ['class' => 'control-label']) }}
        {{ Form::date('data', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-6'])
        {{ Form::label('pis', 'PIS', ['class' => 'control-label']) }}
        {{ Form::text('pis', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-6'])
        {{ Form::label('nome_mae', 'Nome completo da Mãe', ['class' => 'control-label']) }}
        {{ Form::text('nome_mae', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<h5>Endereço</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-2'])
        {{ Form::label('cep', 'CEP', ['class' => 'control-label']) }}
        {{ Form::text('cep', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-5'])
        {{ Form::label('endereco', 'Endereço', ['class' => 'control-label']) }}
        {{ Form::text('endereco', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-2'])
        {{ Form::label('numero', 'Número', ['class' => 'control-label']) }}
        {{ Form::text('numero', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])
        {{ Form::label('complemento', 'Complemento', ['class' => 'control-label']) }}
        {{ Form::text('complemento', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('bairro', 'Bairro', ['class' => 'control-label']) }}
        {{ Form::text('bairro', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('cidade', 'Cidade', ['class' => 'control-label']) }}
        {{ Form::text('cidade', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('estado', 'Estado', ['class' => 'control-label']) }}
        {{ Form::text('estado', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<h5>Contato</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('email1', 'E-mail 1', ['class' => 'control-label']) }}
        {{ Form::text('email1', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('email2', 'E-mail 2', ['class' => 'control-label']) }}
        {{ Form::text('email2', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('email3', 'E-mail 3', ['class' => 'control-label']) }}
        {{ Form::text('email3', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<h5>Telefones</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-1'])
        {{ Form::label('ddd_telefone_residencial', 'DDD', ['class' => 'control-label']) }}
        {{ Form::text('ddd_telefone_residencial', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])
        {{ Form::label('telefone_residencial', 'Residencial', ['class' => 'control-label']) }}
        {{ Form::text('telefone_residencial', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-1'])
        {{ Form::label('ddd_telefone_comercial', 'DDD', ['class' => 'control-label']) }}
        {{ Form::text('ddd_telefone_comercial', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])
        {{ Form::label('telefone_comercial', 'Comercial', ['class' => 'control-label']) }}
        {{ Form::text('telefone_comercial', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-1'])
        {{ Form::label('ddd_telefone_celular', 'DDD', ['class' => 'control-label']) }}
        {{ Form::text('ddd_telefone_celular', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-3'])
        {{ Form::label('telefone_celular', 'Celular', ['class' => 'control-label']) }}
        {{ Form::text('telefone_celular', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<h5>Conta Bancária</h5>
<hr class="line">
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('banco', 'Banco', ['class' => 'control-label']) }}
        {{ Form::select('banco', ['Bradesco', 'Itaú'], null, ['placeholder' => 'Selecione o Banco', 'class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('agencia', 'Agência', ['class' => 'control-label']) }}
        {{ Form::text('agencia', null, ['class' => 'form-control']) }}
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-md-4'])
        {{ Form::label('conta', 'Conta', ['class' => 'control-label']) }}
        {{ Form::text('conta', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
<div class="row">
    @component('website.form-components._form_col_group',['class' => 'col-12 col-sm-6 col-md-3'])
        {{ Form::label('fl_status', 'É conta poupança?', ['class' => 'control-label']) }}
        <div class="radio{{$errors->has('fl_status') ? ' text-danger' : ''}}">
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('fl_status', '1', true, ['class' => 'custom-control-input', 'id' => 'fl_status_ativo']) }}
                {{ Form::label('fl_status_ativo', 'Ativo', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('fl_status', '0', false, ['class' => 'custom-control-input', 'id' => 'fl_status']) }}
                {{ Form::label('fl_status', 'Oculto', ['class' => 'custom-control-label']) }}
            </div>
        </div>
    @endcomponent
    @component('website.form-components._form_col_group',['class' => 'col-12 col-sm-6 col-md-3'])
        {{ Form::label('fl_status', 'É conta conjunta?', ['class' => 'control-label']) }}
        <div class="radio{{$errors->has('fl_status') ? ' text-danger' : ''}}">
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('fl_status', '1', true, ['class' => 'custom-control-input', 'id' => 'fl_status_ativo']) }}
                {{ Form::label('fl_status_ativo', 'Ativo', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                {{ Form::radio('fl_status', '0', false, ['class' => 'custom-control-input', 'id' => 'fl_status']) }}
                {{ Form::label('fl_status', 'Oculto', ['class' => 'custom-control-label']) }}
            </div>
        </div>
    @endcomponent
</div>
