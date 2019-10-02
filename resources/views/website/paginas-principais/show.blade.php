@extends('layouts.website')

@section('content')

{{--    {{ Breadcrumbs::render('paginas-principais', $pagina) }}--}}

    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <h2>{!! $pagina->ds_texto !!}</h2>
            <div class="mt-4">{!! $pagina->txt_pagina !!}</div>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
@endsection
