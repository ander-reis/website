@extends('layouts.website')

@section('content')

{{--    {{ Breadcrumbs::render('paginas-principais', $pagina) }}--}}

    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <h1>{!! $pagina->txt_titulo !!}</h1>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-3 mb-3 mb-md-5 border-left">
            <b>Últimas Notícias</b>
            <ul class="list-group list-group-flush">
                {{--@foreach($ultimasNoticias as $listNoticia)--}}
                    {{--<li class="list-group-item">--}}
                        {{--<a href="{{ route('noticias.show', ['noticia' => $listNoticia->id]) }}" class="text-link">--}}
                            {{--{{ $listNoticia->ds_resumo_noticia }}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--@endforeach--}}
            </ul>
        </div>
    </div>

@endsection