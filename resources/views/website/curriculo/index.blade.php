@extends('layouts.website')

@section('content')

{{--    {{ Breadcrumbs::render('noticias') }}--}}
    <div class="row">
        <div class="col-md-12">
            <h1>curriculo listar / buscar</h1>

            <a href="{{ route('register') }}" class="btn btn-primary">Cadastrar Curriculo</a>
            <a href="{{ route('login') }}" class="btn btn-info">Alterar Curriculo</a>
        </div>
    </div>

@endsection
