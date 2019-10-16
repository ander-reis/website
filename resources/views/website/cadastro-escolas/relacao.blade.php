@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Relação de Escolas</h1>
            {{ Breadcrumbs::render('relacao-escolas.nivel', $id_nivel, $nome_breadcrumb) }}
            @include('website.cadastro-escolas._menu_escolas')
            @include('website.cadastro-escolas._menu_regiao')
            <ul class="list-group list-group-flush mt-5">
                <li class="list-group-item active" id="escola">Escolas</li>
                @foreach($model as $item)
                    <li class="list-group-item">
                        <a href="{{ route('relacao-escolas.escola', ['id_nivel' => $id_nivel, 'id_regiao' => $id_regiao, 'cgc' => $item->CGC_Escola]) }}"
                           class="text-link">{{ $item->Nome_Fantasia }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
