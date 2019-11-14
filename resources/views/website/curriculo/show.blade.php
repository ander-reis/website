@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('curriculos.show') }}

    <div class="row">
        <div class="col-md-12">
            <section>
                <h1>Currículo</h1>
                <div class="alert alert-secondary">
                    <strong>{{ $model->ds_nome }}</strong>
                </div>
                <p><strong>Sexo:&nbsp;</strong>{{ $model->ds_sexo_formatted }}</p>
                <p><strong>Estado Civil:&nbsp;</strong>{{ $model->ds_estado_civil_formatted }}</p>
                <p><strong>Data de Nascimento:&nbsp;</strong>{{ dataFormatted($model->dt_data_nasc) }}</p>
                <p><strong>Cidade:&nbsp;</strong>{{ $model->ds_cidade }}</p>
                <p><strong>Estado:&nbsp;</strong>{{ $model->ds_estado }}</p>
                <p><strong>País:&nbsp;</strong>{{ $model->ds_pais }}</p>
                <p><strong>E-mail:&nbsp;</strong>{{ $model->email }}</p>
                <p><strong>Telefone:&nbsp;</strong>{{ $model->ds_fone }}</p>
                <p><strong>Celular:&nbsp;</strong>{{ $model->ds_celular }}</p>
                <p><strong>Pretensão salarial:&nbsp;</strong>{{ $model->ds_salario }}</p>
                <p><strong>Empregado atualmente:&nbsp;</strong>{{ $model->ds_empregado_formatted }}</p>
            </section>
            <hr class="line">
        </div>
    </div>

@endsection
