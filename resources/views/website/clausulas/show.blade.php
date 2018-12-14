@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('clausula.show', $convencoes_entidade, $convencao, $convencao_clausula) }}

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $convencao_clausula->ds_titulo }}</h1>
            <p>{{ $convencao_clausula->ds_texto }}</p>
        </div>
        <div class="col-md-4">
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-md-12 offset-md-3">
                        <h4>
                            <a href="{{ route('convencao.show', [
                            'convencoes_entidade' => $convencoes_entidade,
                            'convencao' => $convencao]) }}" class="text-link">Voltar à Convenção</a>
                        </h4>
                        <ul class="timeline">
                            @foreach($clausulas as $clausula)
                                <li>
                                    <p>Cláusula {{ $clausula->num_clausula }}</p>
                                    <a href="{{ route('clausulas.show', [
                                        'convencoes_entidade' => $convencoes_entidade,
                                        'convencao' => $convencao,
                                        'convencao_clausula' => $clausula->id]) }}" class="text-link">{{ $clausula->ds_titulo_clausula_formatted }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection