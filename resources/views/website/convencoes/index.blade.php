@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('convencao.index', $convencao_entidade) }}

    <div class="row">

        @component('website.components._data_exists', ['collection' => $convencoes->isEmpty()])@endcomponent

        @foreach($convencoes as $key => $convencao)
            <div class="col-sm-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $convencao->dt_validade }}</h5>
                        <p class="card-text">
                            <a href="{{ route('convencao.show', ['convencoes_entidade' => $convencao->fl_entidade, 'convencao' => $convencao->id_convencao]) }}" class="text-link">{{ $convencao->ds_titulo }}</a>
                        </p>
                        <a href="{{ $convencao->convencao_web_asset }}" class="btn btn-secondary" target="_blank">Abrir Convenção PDF</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $convencoes->links() }}

@endsection

