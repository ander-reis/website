<div class="row">
    <div class="col-md-3">
        @component('admin.form-components._form_group', ['field' => 'Cep'])
            {{ Form::label('Cep', 'Cep', ['class' => 'control-label']) }}
            <div class="input-group">
                {{ Form::text('CEP', null, ['class' => 'form-control', 'id' => 'cep']) }}
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="buscar-cep">Buscar</button>
                </div>
            </div>
        @endcomponent
    </div>

    <div class="col-md-7">
        @component('admin.form-components._form_group',['field' => 'Endereco'])
            {{ Form::label('Endereco', 'Endereço', ['class' => 'control-label']) }}
            {{ Form::text('Endereco', null, ['class' => 'form-control', 'readonly']) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'Numero'])
            {{ Form::label('Numero', 'Número', ['class' => 'control-label']) }}
            {{ Form::text('Numero', null, ['class' => 'form-control', 'maxlength' => 6]) }}
        @endcomponent
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        @component('admin.form-components._form_group',['field' => 'Complemento'])
            {{ Form::label('Complemento', 'Complemento', ['class' => 'control-label']) }}
            {{ Form::text('Complemento', null, ['class' => 'form-control text-uppercase', 'maxlength' => 50]) }}
        @endcomponent
    </div>
    <div class="col-md-3">
        @component('admin.form-components._form_group',['field' => 'Bairro'])
            {{ Form::label('Bairro', 'Bairro', ['class' => 'control-label']) }}
            {{ Form::text('Bairro', null, ['class' => 'form-control', 'readonly']) }}
        @endcomponent
    </div>
    <div class="col-md-3">
        @component('admin.form-components._form_group',['field' => 'Cidade'])
            {{ Form::label('Cidade', 'Cidade', ['class' => 'control-label']) }}
            {{ Form::text('Cidade', null, ['class' => 'form-control', 'readonly']) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'Estado'])
            {{ Form::label('Estado', 'Estado', ['class' => 'control-label']) }}
            {{ Form::text('Estado', null, ['class' => 'form-control', 'readonly']) }}
        @endcomponent
    </div>
</div>
