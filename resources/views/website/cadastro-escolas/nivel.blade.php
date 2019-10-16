@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Relação de Escolas</h1>
            {{ Breadcrumbs::render('relacao-escolas.nivel', $id_nivel, $nome_breadcrumb) }}
            @include('website.cadastro-escolas._menu_escolas')
            @include('website.cadastro-escolas._menu_regiao')
        </div>
    </div>
@endsection
