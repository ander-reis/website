@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('convencao.show', $convencao_entidade) }}

    <p>
    <h1>{{ $convencao->ds_titulo }}</h1>

    @if($convencao->url_arquivo)
        <a href="{{ $convencao->convencao_web_asset }}" class="btn btn-secondary m-3" target="_blank">Abrir Convenção
            PDF</a>
    @endif

    @if($convencao->url_aditamento)
        <p>
            <a href="{{ $convencao->aditamento_web_asset }}" class="btn btn-warning m-3" target="_blank">Abrir
                Aditamento PDF</a>
        </p>
    @endif

    @isset($clausulas->first()->id_clausula)
        <table class="table">
            <thead>
            <tr>
                <th class="border-0 text-uppercase small font-weight-bold">Cláusula</th>
                <th class="border-0 text-uppercase small font-weight-bold">Título</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clausulas as $key => $clausula)
                <tr>
                    <td class="text-center">{{ $clausula->num_clausula }}</td>
                    <td>
                        <a href="{{ route('convencao.clausulas.show', [
                            'convencoes_entidade' => $convencao->fl_entidade,
                            'convencao' => $convencao->id_convencao,
                            'convencao_clausula' => $clausula->id_clausula]) }}" class="text-link">{{ $clausula->ds_titulo }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endisset
@endsection
