<div class="row">
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'DDD_Telefone_Residencial'])
            {{ Form::label('DDD_Telefone_Residencial', 'DDD', ['class' => 'control-label']) }}
            {{ Form::text('DDD_Telefone_Residencial', null, ['class' => 'form-control', 'maxlength' => 2]) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'Telefone_Residencial'])
            {{ Form::label('Telefone_Residencial', 'Tel. Residencial', ['class' => 'control-label']) }}
            {{ Form::text('Telefone_Residencial', null, ['class' => 'form-control', 'maxlength' => 20]) }}
        @endcomponent
    </div>

    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'DDD_Telefone_Comercial'])
            {{ Form::label('DDD_Telefone_Comercial', 'DDD', ['class' => 'control-label']) }}
            {{ Form::text('DDD_Telefone_Comercial', null, ['class' => 'form-control', 'maxlength' => 2]) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'Telefone_Comercial'])
            {{ Form::label('Telefone_Comercial', 'Tel. Comercial', ['class' => 'control-label']) }}
            {{ Form::text('Telefone_Comercial', null, ['class' => 'form-control', 'maxlength' => 9]) }}
        @endcomponent
    </div>

    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'DDD_Telefone_Celular'])
            {{ Form::label('DDD_Telefone_Celular', 'DDD', ['class' => 'control-label']) }}
            {{ Form::text('DDD_Telefone_Celular', null, ['class' => 'form-control', 'maxlength' => 2]) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'Telefone_Celular'])
            {{ Form::label('Telefone_Celular', 'Tel. Celular', ['class' => 'control-label']) }}
            {{ Form::text('Telefone_Celular', null, ['class' => 'form-control', 'maxlength' => 10]) }}
        @endcomponent
    </div>
</div>
