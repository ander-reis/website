@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Relação de Escolas</h1>
            {{ Breadcrumbs::render('relacao-escolas.group') }}
            @include('website.cadastro-escolas._menu_escolas')
        </div>
    </div>
@endsection
