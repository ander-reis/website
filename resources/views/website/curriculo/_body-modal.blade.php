@isset($model)
    <div class="alert alert-primary" role="alert">
        {{ $model->ds_nome }}
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <p><strong>Estado Civil:&nbsp;</strong>{{ $model->ds_estado_civil_formatted }}</p>
            <p><strong>Cidade:&nbsp;</strong>{{ $model->ds_cidade }}</p>
            <p><strong>E-mail:&nbsp;</strong>{{ $model->email }}</p>
            <p><strong>Telefone:&nbsp;</strong>{{ $model->ds_fone }}</p>
            <p><strong>Pretensão salarial:&nbsp;</strong>{{ $model->ds_salario }}</p>
        </div>
        <div class="col-sm-12 col-md-6">
            <p><strong>Sexo:&nbsp;</strong>{{ $model->ds_sexo_formatted }}</p>
            <p><strong>Nascimento:&nbsp;</strong>{{ dataFormatted($model->dt_data_nasc) }}</p>
            <p><strong>Estado:&nbsp;</strong>{{ $model->ds_estado }}</p>
            <p><strong>País:&nbsp;</strong>{{ $model->ds_pais }}</p>
            <p><strong>Celular:&nbsp;</strong>{{ $model->ds_celular }}</p>
            <p><strong>Empregado atualmente:&nbsp;</strong>{{ $model->ds_empregado_formatted }}</p>
        </div>
    </div>
    <hr>
    <p><strong>Disponibilidade de horário?&nbsp;</strong>{{ $model->ds_disp_horario_formatted }}</p>
    <p><strong>Disponibilidade para mudamça de sua Cidade?&nbsp;</strong>{{ $model->ds_disp_cidade_formatted }}</p>
    <p><strong>Qual a sua formação?&nbsp;</strong>{{ $model->ds_formacao_formatted }}</p>
    <p><strong>Outra formação?&nbsp;</strong>{{ $model->ds_outra_formacao }}</p>
    <p><strong>Qual disciplina leciona?&nbsp;</strong>{{ $model->ds_disciplina_formatted }}</p>
    <p><strong>Nível de atuação?&nbsp;</strong>{{ $model->ds_atuacao_formatted }}</p>
    <hr>
    <p class="text-justify"><strong>Objetivo:&nbsp;</strong>{{ $model->ds_objetivo }}</p>
    <p class="text-justify"><strong>Principais qualificações profissionais:&nbsp;</strong>{{ $model->ds_qualificacao }}</p>
    <p class="text-justify"><strong>Experiência profissional:&nbsp;</strong>{{ $model->ds_experiencia }}</p>
@endisset
