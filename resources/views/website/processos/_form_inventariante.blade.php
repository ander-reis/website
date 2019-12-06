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
<h5>Contato</h5>
<hr class="line">
<h5>Conta Bancária</h5>
<hr class="line">
<h5>Dados do Beneficiário</h5>
<hr class="line">
