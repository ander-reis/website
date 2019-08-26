@extends('layouts.website')

@section('content')

    @component('website.components.layout-1._navbar')@endcomponent

    {{--listar noticias--}}
    @if(isset($noticias))
        @component('website.noticias._listar-noticias-coluna', ['noticias' => $noticias])@endcomponent
    @endif

    {{--noticia--}}
    @if(isset($noticia))
        @component('website.noticias._noticia-page', ['noticia' => $noticia, 'ultimasNoticias' => $ultimasNoticias])@endcomponent
    @endif

@endsection
