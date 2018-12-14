@extends('layouts.website')

@section('content')

    {{--listar noticias--}}
    @if(isset($noticias))
        @component('website.noticias._listar-noticias', ['noticias' => $noticias])@endcomponent
    @endif

    {{--noticia--}}
    @if(isset($noticia))
        @component('website.noticias._noticia-page', ['noticia' => $noticia, 'ultimasNoticias' => $ultimasNoticias])@endcomponent
    @endif

@endsection
