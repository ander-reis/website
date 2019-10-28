@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('cursos.show') }}

    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-5">{{ $model_curso->cur_cur_ds_tema }}</h1>

            <p>
                <strong>Público Alvo:&nbsp;</strong>{{ $model_curso->cur_cur_ds_publico }}
            </p>
            <p>
                <strong>Objetivo:&nbsp;</strong>{{ $model_curso->cur_cur_ds_objetivo }}
            </p>
            <p>
                <strong>Conteúdo:&nbsp;</strong>{{ $model_curso->cur_cur_ds_conteudo }}
            </p>
            <p>
                @if($model_docente->cur_doc_fl_sexo) <strong>Professora:&nbsp;</strong> @else
                    <strong>Professor:&nbsp;</strong> @endif
                {{ $model_docente->cur_doc_ds_apelido }}<br>
                {{ $model_docente->cur_doc_ds_qualificacao }}
            </p>
            <p>
                <strong>Período:&nbsp;</strong>{{ $model_curso->cur_cur_dt_vencimento }},
                das {{ $model_curso->cur_cur_hr_inicio }}h às {{ $model_curso->cur_cur_hr_final }}h
            </p>
            <p>
                <strong>Carga Horária:&nbsp;</strong>{{ $model_curso->cur_cur_ds_ch }}
            </p>
            <p>
                <strong>Número de Vagas:&nbsp;</strong>{{ $model_curso->cur_cur_nr_vaga }}
            </p>
            <p>
                <strong>Preço:&nbsp;</strong>
                Sindicalizados: R$ {{ $model_curso->cur_cur_vl_sind }}
                |
                Não Sindicalizados: R$ {{ $model_curso->cur_cur_vl_nsind }}
            </p>
        </div>
    </div>
@endsection
