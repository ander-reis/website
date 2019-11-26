<section>
    <h3>Dados Pessoais</h3>
    <hr class="line">
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-8'])
            {{ Form::label('ds_nome', 'Nome', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::text('ds_nome', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('ds_cpf', 'CPF', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::text('ds_cpf', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('ds_sexo', 'Sexo', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::select('ds_sexo', ['M' => 'Masculino', 'F' => 'Feminino'], null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('dt_data_nasc', 'Data de Nascimento', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::date('dt_data_nasc', (isset($model->dt_cadastro_utc_formatted) ? $model->dt_cadastro_utc_formatted : \Carbon\Carbon::now()), ['class' => 'form-control']) }}

        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('int_estado_civil', 'Estado Civil', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::select('int_estado_civil', \Website\Http\Controllers\Website\CurriculoController::estadoCivil(), null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
</section>

<section>
    <h3>Contato</h3>
    <hr class="line">
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-2'])
            {{ Form::label('ds_cep', 'Cep', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::text('ds_cep', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-10'])
            {{ Form::label('ds_endereco', 'Endereço Completo', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::text('ds_endereco', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
            {{ Form::label('ds_bairro', 'Bairro', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::text('ds_bairro', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
            {{ Form::label('ds_cidade', 'Cidade', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::text('ds_cidade', null, ['class' => 'form-control']) }}
        @endcomponent

        @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
            {{ Form::label('ds_estado', 'Estado', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::select('ds_estado', \Website\Http\Controllers\Website\CurriculoController::estados(), (isset($model->ds_estado) ? $model->ds_estado : null), ['class' => 'form-control']) }}

        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
            {{ Form::label('ds_pais', 'País', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::text('ds_pais', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
            {{ Form::label('ds_fone', 'Telefone (incluir DDD)', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::text('ds_fone', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
            {{ Form::label('ds_celular', 'Celular (incluir DDD)', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::text('ds_celular', null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
</section>

<section>
    <h3>Informações</h3>
    <hr class="line">
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-2'])
            {{ Form::label('ds_salario', 'Pretensão Salarial', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::text('ds_salario', null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
            {{ Form::label('int_empregado', 'Empregado atualmente?', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::select('int_empregado', ['0' => 'Não', '1' => 'Sim'], null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-3'])
            {{ Form::label('int_disp_horario', 'Disponibilidade de horário?', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::select('int_disp_horario', ['0' => 'Integral', '1' => 'Manhã', '2' => 'Tarde', '3' => 'Noite'], null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('int_disp_cidade', 'Disponibilidade para mudar de cidade?', ['class' => 'control-label']) }}
            <span class="text-danger font-weight-bold">*</span>
            {{ Form::select('int_disp_cidade', [0 => 'Não', 1 => 'Sim'], null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('int_formacao', 'Qual sua formação?', ['class' => 'control-label']) }}
            <span class="text-danger font-weight-bold">*</span>
            {{ Form::select('int_formacao', selectFormacaoFormatted(1)->pluck('ds_formacao', 'id_formacao'), null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('int_disciplina', 'Qual disciplina leciona?', ['class' => 'control-label']) }}
            <span class="text-danger font-weight-bold">*</span>
            {{ Form::select('int_disciplina', selectDisciplinaFormatted(1)->pluck('ds_disciplina', 'id_disciplina'), null, ['class' => 'form-control']) }}
        @endcomponent
        @component('website.form-components._form_col_group', ['class' => 'col-md-4'])
            {{ Form::label('int_nivel_atuacao', 'Qual o nível de atuação?', ['class' => 'control-label']) }}
            <span class="text-danger font-weight-bold">*</span>
            {{ Form::select('int_nivel_atuacao', selectAtuacaoFormatted(1)->pluck('ds_nivel_atuacao', 'id_nivel_atuacao'), null, ['class' => 'form-control']) }}
        @endcomponent
    </div>
</section>

<section>
    <h3>Descrições</h3>
    <hr class="line">
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
            {{ Form::label('ds_objetivo', 'Objetivo', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::textarea('ds_objetivo', null, ['class' => 'form-control', 'rows' => 3]) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
            {{ Form::label('ds_qualificacao', 'Principais qualificações profissionais', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::textarea('ds_qualificacao', null, ['class' => 'form-control', 'rows' => 3]) }}
        @endcomponent
    </div>
    <div class="row">
        @component('website.form-components._form_col_group', ['class' => 'col-md-12'])
            {{ Form::label('ds_experiencia', 'Experiência Profissional', ['class' => 'control-label']) }}<span
                    class="text-danger font-weight-bold">*</span>
            {{ Form::textarea('ds_experiencia', null, ['class' => 'form-control', 'rows' => 3]) }}
        @endcomponent
    </div>
</section>

<section>
    <h3>Dados de Acesso</h3>
    <hr class="line">

    @if(!\Auth::user())
        <div class="row">
            @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
                {{ Form::label('email', 'Email', ['class' => 'control-label']) }}<span class="text-danger font-weight-bold">*</span>
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            @endcomponent
            @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
                {{ Form::label('email_confirmation', 'Confirme o Email', ['class' => 'control-label']) }}<span
                        class="text-danger font-weight-bold">*</span>
                {{ Form::text('email_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Confirme o Email']) }}
            @endcomponent
        </div>
        <div class="row">
            @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
                {{ Form::label('password', 'Senha', ['class' => 'control-label']) }}<span
                        class="text-danger font-weight-bold">*</span>
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Digite a Senha']) }}
            @endcomponent
            @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
                {{ Form::label('password_confirmation', 'Confirme a Senha', ['class' => 'control-label']) }}<span
                        class="text-danger font-weight-bold">*</span>
                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirme a Senha']) }}
            @endcomponent
        </div>
    @else
        <div class="row">
            @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
                {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                {{ Form::text('email', null, ['class' => 'form-control']) }}
            @endcomponent
            @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
                {{ Form::label('email_confirmation', 'Confirme o Email', ['class' => 'control-label']) }}
                {{ Form::text('email_confirmation', $model->email, ['class' => 'form-control', 'placeholder' => 'Confirme o Email']) }}
            @endcomponent
        </div>
        <div class="row">
            @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
                {{ Form::label('password', 'Senha', ['class' => 'control-label']) }}
                <span class="text-danger font-weight-bold">&nbsp;(caso deseje atualizar a senha)</span>
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Digite a Senha']) }}
            @endcomponent
            @component('website.form-components._form_col_group', ['class' => 'col-md-6'])
                {{ Form::label('password_confirmation', 'Confirme a Senha', ['class' => 'control-label']) }}
                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirme a Senha']) }}
            @endcomponent
        </div>
    @endif
</section>

@if($errors->any())
    <ul class="alert alert-danger alert-dismissible fade show">
        @foreach($errors->all() as $error)
            <li class="list-group">{{$error}}</li>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        @endforeach
    </ul>
@endif
