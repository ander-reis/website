<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
        {{ Form::label('ds_escola', 'Nome da Escola', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::text('ds_escola', null, ['class' => 'form-control']) }}
    @endcomponent

    @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
        {{ Form::label('id_motivo', 'Motivo', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::select('id_motivo', \Website\Models\CoronaMotivos::orderBy('ds_descricao')->pluck('ds_descricao', 'id')->prepend('Selecione um Motivo', '0'), null, ['class' => 'form-control']) }}
    @endcomponent

    @component('website.form-components._form_col_group', ['class' => 'col-md-12 ds d-none'])
        {{ Form::label('ds_descricao', 'Outros Motivo', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::textarea('ds_descricao', null, ['class' => 'form-control']) }}
    @endcomponent

    @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
        {{ Form::label('ds_funcionario', 'Funcionário do Sinpro que atendeu', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::text('ds_funcionario', null, ['class' => 'form-control']) }}
    @endcomponent
</div>
