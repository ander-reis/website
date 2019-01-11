<div class="row">
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'ds_ddd'])
            {{ Form::label('ddd', 'DDD', ['class' => 'control-label']) }}
            {{ Form::text('ddd', null, ['class' => 'form-control', 'maxlength' => 2]) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'ds_tele_residencial'])
            {{ Form::label('tel_residencial', 'Tel. Residencial', ['class' => 'control-label']) }}
            {{ Form::text('tel_residencial', null, ['class' => 'form-control', 'maxlength' => 9]) }}
        @endcomponent
    </div>

    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'ds_ddd'])
            {{ Form::label('ddd', 'DDD', ['class' => 'control-label']) }}
            {{ Form::text('ddd', null, ['class' => 'form-control', 'maxlength' => 2]) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'ds_tele_residencial'])
            {{ Form::label('tel_residencial', 'Tel. Comercial', ['class' => 'control-label']) }}
            {{ Form::text('tel_residencial', null, ['class' => 'form-control', 'maxlength' => 10]) }}
        @endcomponent
    </div>

    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'ds_ddd'])
            {{ Form::label('ddd', 'DDD', ['class' => 'control-label']) }}
            {{ Form::text('ddd', null, ['class' => 'form-control', 'maxlength' => 2]) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'ds_tele_residencial'])
            {{ Form::label('tel_residencial', 'Tel. Celular', ['class' => 'control-label']) }}
            {{ Form::text('tel_residencial', null, ['class' => 'form-control', 'maxlength' => 9]) }}
        @endcomponent
    </div>
</div>