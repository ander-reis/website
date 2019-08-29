@extends('layouts.website')

@section('content')

{{ Breadcrumbs::render('convencao.clausula.show', $convencoes_entidade, $convencao, $convencao_clausula) }}

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $convencao_clausula->ds_titulo }}</h1>
            <p> {!! $convencao_clausula->ds_texto !!}</p>

            <div class="text-center mt-3 mb-3">
                @isset($previous)
                    <a href="{{ route('convencao.clausulas.show', [
                                        'convencoes_entidade' => $convencoes_entidade,
                                        'convencao' => $convencao,
                                        'convencao_clausula' => $previous->id_clausula]) }}"
                       class="btn btn-outline-secondary">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        &nbsp;Cláusula {{ $previous->num_clausula }}</a>
                @endisset
                @isset($next)
                    <a href="{{ route('convencao.clausulas.show', [
                                        'convencoes_entidade' => $convencoes_entidade,
                                        'convencao' => $convencao,
                                        'convencao_clausula' => $next->id_clausula]) }}"
                       class="btn btn-outline-secondary">
                        Cláusula {{ $next->num_clausula }}&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                @endisset
            </div>
        </div>

        <div class="col-md-4">
            <div class="col-md-12">
                <h4>
                    <a href="{{ route('convencao.show', [
                            'convencoes_entidade' => $convencoes_entidade,
                            'convencao' => $convencao]) }}" class="text-link">Voltar à Convenção</a>
                </h4>
                <ul class="timeline">
                    @foreach($clausulas as $clausula)
                        <li>
                            <p>Cláusula {{ $clausula->num_clausula }}</p>
                            <a href="{{ route('convencao.clausulas.show', [
                                        'convencoes_entidade' => $convencoes_entidade,
                                        'convencao' => $convencao,
                                        'convencao_clausula' => $clausula->id_clausula]) }}"
                               class="text-link">{{ $clausula->ds_titulo_clausula_formatted }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
