@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('cursos.show') }}

    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-5">{{ $model_curso->cur_cur_ds_tema }}</h3>
            <p>
                <strong>Público Alvo:&nbsp;</strong>{{ $model_curso->cur_cur_ds_publico }}.
            </p>
            <p>
                <strong>Objetivo:&nbsp;</strong>{{ $model_curso->cur_cur_ds_objetivo }}.
            </p>
            <p>
                <strong>Conteúdo:&nbsp;</strong>{{ $model_curso->cur_cur_ds_conteudo }}.
            </p>
            @isset($model_docente)
                @foreach($model_docente as $value)
                    @if($value->cur_doc_fl_sexo)
                        <p>
                            <strong>Professora:&nbsp;</strong>
                            {{ $value->cur_doc_ds_apelido }}<br>
                            {{ $value->cur_doc_ds_qualificacao }}
                        </p>
                    @else
                        <p>
                            <strong>Professor:&nbsp;</strong>
                            {{ $value->cur_doc_ds_apelido }}<br>
                            {{ $value->cur_doc_ds_qualificacao }}
                        </p>
                    @endif
                @endforeach
            @endisset
            <p>
                <strong>Período:&nbsp;</strong>{{ $model_curso->cur_cur_dt_vencimento }}
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
