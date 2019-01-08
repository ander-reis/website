<section>
    <legend>Informações Pessoais</legend>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div>Matrícula</div>
            <h2 class="my-2">
                <span class="badge badge-secondary">{{ $user->matricula }}</span>
            </h2>
        </div>
        <div class="col-md-5">
            @component('admin.form-components._form_group',['field' => 'ds_resumo'])
                {{ Form::label('name', 'Nome', ['class' => 'control-label']) }}
                {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 80]) }}
            @endcomponent
        </div>
        <div class="col-md-5">
            @component('admin.form-components._form_group',['field' => 'ds_email'])
                {{ Form::label('email', 'E-mail', ['class' => 'control-label']) }}
                {{ Form::text('email', null, ['class' => 'form-control', 'maxlength' => 80]) }}
            @endcomponent
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            @component('admin.form-components._form_group',['field' => 'rg'])
                {{ Form::label('rg', 'RG', ['class' => 'control-label']) }}
                {{ Form::text('rg', null, ['class' => 'form-control', 'maxlength' => 80]) }}
            @endcomponent
        </div>
        <div class="col-md-3">
            @component('admin.form-components._form_group',['field' => 'cpf'])
                {{ Form::label('cpf', 'CPF', ['class' => 'control-label']) }}
                {{ Form::text('cpf', null, ['class' => 'form-control', 'maxlength' => 80]) }}
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('admin.form-components._form_group',['field' => 'data_nascimento'])
                {{ Form::label('data_nascimento', 'Data de Nascimento', ['class' => 'control-label']) }}
                {{ Form::date('data_nascimento', null, ['class' => 'form-control']) }}
            @endcomponent
        </div>
        <div class="col-md-2">
            @component('admin.form-components._form_group',['field' => 'sexo'])
                {{ Form::label('sexo', 'Sexo', ['class' => 'control-label']) }}
                {{ Form::select('sexo', [1 => 'Masculino', 2 => 'Feminino'], null, ['class' => 'form-control']) }}
            @endcomponent
        </div>
    </div>

    <div>Grau que Leciona</div>
    <div class="row">
        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox('pre', 'value', 'checked', ['class' => 'custom-control-input', 'id' => 'check_pre']) }}
                {{ Form::label('check_pre', 'Pré', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox('check_primeira_quinta', 'value', 'checked', ['class' => 'custom-control-input', 'id' => 'check_primeira_quinta']) }}
                {{ Form::label('check_primeira_quinta', '1º à 5ª', ['class' => 'custom-control-label']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox('check_sexta_nona', 'value', 'checked', ['class' => 'custom-control-input', 'id' => 'check_sexta_nona']) }}
                {{ Form::label('check_sexta_nona', '6ª à 9ª', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox('check_ensi_medio', 'value', 'checked', ['class' => 'custom-control-input', 'id' => 'check_ensi_medio']) }}
                {{ Form::label('check_ensi_medio', 'Ensino Médio', ['class' => 'custom-control-label']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox('check_ensi_superior', 'value', 'checked', ['class' => 'custom-control-input', 'id' => 'check_ensi_superior']) }}
                {{ Form::label('check_ensi_superior', 'Ensino Superior', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox('check_tecnico', 'value', 'checked', ['class' => 'custom-control-input', 'id' => 'check_tecnico']) }}
                {{ Form::label('check_tecnico', 'Ensino Técnico', ['class' => 'custom-control-label']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox('check_curso_livre', 'value', 'checked', ['class' => 'custom-control-input', 'id' => 'check_curso_livre']) }}
                {{ Form::label('check_curso_livre', 'Curso Livre', ['class' => 'custom-control-label']) }}
            </div>
            <div class="custom-control custom-checkbox">
                {{ Form::checkbox('check_supletivo', 'value', 'checked', ['class' => 'custom-control-input', 'id' => 'check_supletivo']) }}
                {{ Form::label('check_supletivo', 'Supletivo', ['class' => 'custom-control-label']) }}
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-12">
            @component('admin.form-components._form_group',['field' => 'disciplina'])
                {{ Form::label('disciplina', 'Disciplina', ['class' => 'control-label']) }}
                {{ Form::select('disciplina', [1 => 'Administração', 2 => 'Alfabetização'], null, ['class' => 'form-control']) }}
            @endcomponent
        </div>
    </div>
</section>

<section>
    <legend>Endereço</legend>
    <hr>
</section>

<section>
    <legend>Contato</legend>
    <hr>
</section>