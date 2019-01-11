<div class="row">
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'ds_cep'])
            {{ Form::label('ds_cep', 'CEP', ['class' => 'control-label']) }}
            {{ Form::text('ds_cep', null, ['class' => 'form-control', 'maxlength' => 9]) }}
        @endcomponent
    </div>
    <div class="col-md-8">
        @component('admin.form-components._form_group',['field' => 'ds_endereco'])
            {{ Form::label('endereco', 'Endereço', ['class' => 'control-label']) }}
            {{ Form::text('endereco', null, ['class' => 'form-control', 'maxlength' => 9]) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'ds_numero'])
            {{ Form::label('numero', 'Número', ['class' => 'control-label']) }}
            {{ Form::text('numero', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        @component('admin.form-components._form_group',['field' => 'ds_complement'])
            {{ Form::label('complemento', 'Complemento', ['class' => 'control-label']) }}
            {{ Form::text('complemento', null, ['class' => 'form-control', 'maxlength' => 155]) }}
        @endcomponent
    </div>
    <div class="col-md-3">
        @component('admin.form-components._form_group',['field' => 'ds_bairro'])
            {{ Form::label('bairro', 'Bairro', ['class' => 'control-label']) }}
            {{ Form::text('bairro', null, ['class' => 'form-control', 'maxlength' => 155]) }}
        @endcomponent
    </div>
    <div class="col-md-3">
        @component('admin.form-components._form_group',['field' => 'ds_cidade'])
            {{ Form::label('cidade', 'Cidade', ['class' => 'control-label']) }}
            {{ Form::text('cidade', null, ['class' => 'form-control', 'maxlength' => 155]) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'estado'])
            {{ Form::label('estado', 'Estado', ['class' => 'control-label']) }}
            {{ Form::select('estado', [1 => 'SP', 2 => 'RJ'], null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
</div>