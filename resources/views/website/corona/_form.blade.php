<div class="row">
    @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
        {{ Form::label('ds_escola', 'Nome da Instituição', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::text('ds_escola', null, ['class' => 'form-control', 'maxlength' => '100']) }}
    @endcomponent

    @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
        {{ Form::label('id_motivo', 'Motivo', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::select('id_motivo', \Website\Models\CoronaMotivos::orderBy('ds_descricao')->pluck('ds_descricao', 'id')->prepend('Selecione um Motivo', '0'), null, ['class' => 'form-control']) }}
    @endcomponent

    @component('website.form-components._form_col_group', ['class' => 'col-md-12 ds d-none'])
        {{ Form::label('ds_descricao_motivo', 'Outros Motivo', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::text('ds_descricao_motivo', null, ['class' => 'form-control', 'maxlength' => '200']) }}
    @endcomponent

    @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
        {{ Form::label('ds_descricao', 'Descrição', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::text('ds_descricao', null, ['class' => 'form-control', 'maxlength' => '500']) }}
    @endcomponent

    @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
        {{ Form::label('ds_meio', 'Ocorrência comunicada por', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::select('ds_meio', ['PROFESSOR' => 'Professor', 'ESCOLA' => 'Escola', 'CONTABILIDADE' => 'Contabilidade', 'OUTROS' => 'Outros'], null, ['class' => 'form-control', 'placeholder' => 'Selecione...']) }}
    @endcomponent

    @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
        {{ Form::label('ds_funcionario', 'Funcionário do Sinpro que atendeu', ['class' => 'control-label font-weight-bold']) }}
        {{ Form::text('ds_funcionario', null, ['class' => 'form-control', 'maxlength' => '100']) }}
    @endcomponent
</div>
