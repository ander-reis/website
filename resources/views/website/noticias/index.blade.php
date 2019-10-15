@extends('layouts.website')

@section('content')

    {{--listar noticias--}}
    @if(isset($noticias))
        @component('website.noticias._listar-noticias-coluna', ['noticias' => $noticias, 'notdestaque' => $notdestaque])@endcomponent
    @endif

    {{--noticia--}}
    @if(isset($noticia))
        @component('website.noticias._noticia-page', ['noticia' => $noticia])@endcomponent
    @endif
@endsection
