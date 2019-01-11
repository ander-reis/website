<div class="row">
    <div class="col-md-12">
        @component('admin.form-components._form_group',['field' => 'escola'])
            {{ Form::label('escola', 'Escola', ['class' => 'control-label']) }}
            {{ Form::text('escola', null, ['class' => 'form-control', 'maxlength' => 80]) }}
        @endcomponent
    </div>

    <div class="col-md-12">
        @component('admin.form-components._form_group',['field' => 'endereco'])
            {{ Form::label('endereco', 'Endereço', ['class' => 'control-label']) }}
            {{ Form::text('endereco', null, ['class' => 'form-control', 'maxlength' => 80]) }}
        @endcomponent
    </div>

    <div class="col-md-12">
        @component('admin.form-components._form_group',['field' => 'telefone'])
            {{ Form::label('telefone', 'Telefone', ['class' => 'control-label']) }}
            {{ Form::text('telefone', null, ['class' => 'form-control', 'maxlength' => 80]) }}
        @endcomponent
    </div>
</div>