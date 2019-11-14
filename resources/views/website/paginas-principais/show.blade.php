@extends('layouts.website')

@section('content')

{{--    {{ Breadcrumbs::render('paginas-principais', $pagina) }}--}}

    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <h4>{!! $pagina->txt_titulo !!}</h4>
            <div class="mt-4">{!! $pagina->ds_texto !!}</div>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
@endsection
