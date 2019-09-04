<div class="row">
    <div class="col-md-2">
        <div>Matrícula</div>
        <h2 class="my-2">
            <span class="badge badge-secondary">{{ $user->Codigo_Professor }}</span>
        </h2>
    </div>
    <div class="col-md-5">
        @component('admin.form-components._form_group',['field' => 'Nome'])
            {{ Form::label('Nome', 'Nome', ['class' => 'control-label']) }}
            {{ Form::text('Nome', null, ['class' => 'form-control text-uppercase', 'maxlength' => 100]) }}
        @endcomponent
    </div>
    <div class="col-md-5">
        @component('admin.form-components._form_group',['field' => 'Email'])
            {{ Form::label('Email', 'E-mail', ['class' => 'control-label']) }}
            {{ Form::text('Email', null, ['class' => 'form-control', 'maxlength' => 120]) }}
        @endcomponent
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        @component('admin.form-components._form_group',['field' => 'RG'])
            {{ Form::label('RG', 'RG', ['class' => 'control-label']) }}
            {{ Form::text('RG', null, ['class' => 'form-control', 'maxlength' => 15]) }}
        @endcomponent
    </div>
    <div class="col-md-3">
        @component('admin.form-components._form_group',['field' => 'CPF'])
            {{ Form::label('CPF', 'CPF', ['class' => 'control-label']) }}
            {{ Form::text('CPF', null, ['class' => 'form-control', 'disabled']) }}
        @endcomponent
    </div>
    <div class="col-md-4">
        @component('admin.form-components._form_group',['field' => 'Data_Aniversario'])
            {{ Form::label('Data_Aniversario', 'Data de Nascimento', ['class' => 'control-label']) }}
            {{ Form::date('Data_Aniversario', \Carbon\Carbon::parse($user->Data_Aniversario, 'UTC'), ['class' => 'form-control']) }}
        @endcomponent
    </div>
    <div class="col-md-2">
        @component('admin.form-components._form_group',['field' => 'Sexo'])
            {{ Form::label('Sexo', 'Sexo', ['class' => 'control-label']) }}
            {{ Form::select('Sexo', [0 => 'Masculino', 1 => 'Feminino'], null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
</div>

<div>Grau que Leciona</div>
<div class="row">
    <div class="col-md-3">
        <div class="custom-control custom-checkbox">
            {{ Form::checkbox('Pre', '1', ($user->Pre) ? true : false, ['class' => 'custom-control-input', 'id' => 'Pre']) }}
            {{ Form::label('Pre', 'Pré', ['class' => 'custom-control-label']) }}
        </div>
        <div class="custom-control custom-checkbox">
            {{ Form::checkbox('primeira_quarta_serie', '1', ($user->primeira_quarta_serie) ? true : false, ['class' => 'custom-control-input', 'id' => 'primeira_quarta_serie']) }}
            {{ Form::label('primeira_quarta_serie', '1º à 5ª', ['class' => 'custom-control-label']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="custom-control custom-checkbox">
            {{ Form::checkbox('quinta_oitava_serie', '1', ($user->quinta_oitava_serie) ? true : false, ['class' => 'custom-control-input', 'id' => 'quinta_oitava_serie']) }}
            {{ Form::label('quinta_oitava_serie', '6ª à 9ª', ['class' => 'custom-control-label']) }}
        </div>
        <div class="custom-control custom-checkbox">
            {{ Form::checkbox('Ens_Medio', '1', ($user->Ens_Medio) ? true : false, ['class' => 'custom-control-input', 'id' => 'Ens_Medio']) }}
            {{ Form::label('Ens_Medio', 'Ensino Médio', ['class' => 'custom-control-label']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="custom-control custom-checkbox">
            {{ Form::checkbox('Ens_Superior', '1', ($user->Ens_Superior) ? true : false, ['class' => 'custom-control-input', 'id' => 'Ens_Superior']) }}
            {{ Form::label('Ens_Superior', 'Ensino Superior', ['class' => 'custom-control-label']) }}
        </div>
        <div class="custom-control custom-checkbox">
            {{ Form::checkbox('Tecnico', '1', ($user->Tecnico) ? true : false, ['class' => 'custom-control-input', 'id' => 'Tecnico']) }}
            {{ Form::label('Tecnico', 'Ensino Técnico', ['class' => 'custom-control-label']) }}
        </div>
    </div>
    <div class="col-md-3">
        <div class="custom-control custom-checkbox">
            {{ Form::checkbox('Curso_Livre', '1', ($user->Curso_Livre) ? true : false, ['class' => 'custom-control-input', 'id' => 'Curso_Livre']) }}
            {{ Form::label('Curso_Livre', 'Curso Livre', ['class' => 'custom-control-label']) }}
        </div>
        <div class="custom-control custom-checkbox">
            {{ Form::checkbox('Supletivo', '1', ($user->Supletivo) ? true : false, ['class' => 'custom-control-input', 'id' => 'Supletivo']) }}
            {{ Form::label('Supletivo', 'Supletivo', ['class' => 'custom-control-label']) }}
        </div>
    </div>
</div>

<div class="row my-3">
    <div class="col-md-12">
        @component('admin.form-components._form_group',['field' => 'Materia'])
            {{ Form::label('Materia', 'Disciplina', ['class' => 'control-label']) }}
            {{ Form::select('Materia', $materia, null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
</div>
