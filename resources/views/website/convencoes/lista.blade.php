@extends('layouts.website')

@section('content')
{{ Breadcrumbs::render('convencao-listar') }}

<div class="row">
    @foreach($entidades as $entidade)
    <div class="col-sm-12 mb-3">
        <div class="card">
            <div class="card-header text-center">
                <h5>{{ $entidade->ds_entidade }}</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">
                    <a href="{{ route('convencao.show', ['convencoes_entidade' => $entidade->id, 'convencao' => $convencao[$loop->index][0]->id_convencao]) }}"
                        class="text-link">{{ $convencao[$loop->index][0]->ds_titulo }}</a>
                </p>

                <a href="{{ route('convencao.index', ['convencao' => $entidade->id]) }}" class="btn btn-secondary">Ver todas convenções</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
