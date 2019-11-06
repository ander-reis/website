@extends('layouts.website')
@section('og')
    <meta property="og:title" content="SinproSP" />
    <meta property="og:url" content="{{url()->full()}}" />
    <meta property="og:description" content="{!! $noticia->ds_resumo !!}" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{( $noticia->ds_social == '' ? 'http://www.sinprosp.org.br/images/layout-1/og/sinpro_300x200s.jpg' : $noticia->ds_social)}}"/>
    {{-- <meta property="og:image:type" content="image/jpeg" /> --}}
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="200" />
    <meta property="og:image:alt" content="SinproSP" />
@endsection

@section('content')

    {{-- {{ Breadcrumbs::render('noticias-show', $noticia) }} --}}

    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <span class="noticia_interna_chapeu1">{{ $noticia->categoria->ds_categoria }}</span>
            <h1 class="noticia_interna_titulo1">{!! $noticia->ds_resumo !!}</h1>
            <div class="row mb-3">
                <div class="col-12 col-md-6">
                    @component('website.components.layout-1._social-share', ['noticia' => $noticia])@endcomponent
                </div>
                <div class="col-12 col-md-6 text-sm-left text-md-right time">
                    Atualizada em {{ dataHoraFormatted($noticia->dt_noticia) }}
                </div>
            </div>
            <span class="noticia_interna_corpo1"> {!! $noticia->ds_texto !!}</span>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
@endsection
