@extends('layouts.website')

@section('content')

    {{--listar noticias--}}
    @if(isset($noticias))
        @component('website.noticias._listar-noticias-ano', ['noticias' => $noticias, 'notdestaque' => $notdestaque, 'anos' => $anos])@endcomponent
    @endif

    {{--noticia--}}
    @if(isset($noticia))
        @component('website.noticias._noticia-page', ['noticia' => $noticia])@endcomponent
    @endif
@endsection
