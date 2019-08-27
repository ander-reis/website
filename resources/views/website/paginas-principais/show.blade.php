@extends('layouts.website')

@section('content')

{{--    {{ Breadcrumbs::render('paginas-principais', $pagina) }}--}}

    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <h2>{!! $pagina->txt_titulo !!}</h2>
            <span>{!! $pagina->txt_pagina !!}</span>
        </div>
    </div>
@endsection
