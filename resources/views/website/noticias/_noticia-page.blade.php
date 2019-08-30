@extends('layouts.website')

@section('content')

{{-- {{ Breadcrumbs::render('noticias-show', $noticia) }} --}}

<div class="row">
    <div class="col-md-9 mb-3 mb-md-5">
        <span class="noticia_interna_chapeu1">{{ $noticia->categoria->ds_categoria }}</span>
        <h1 class="noticia_interna_titulo1">{!! $noticia->ds_resumo !!}</h1>
        <div class="row mb-3">
            <div class="col-12 col-md-6">
                @component('website.components._social-share', ['noticia' => $noticia])@endcomponent
            </div>
            <div class="col-12 col-md-6 text-sm-left text-md-right time">
                Atualizada em {!! $noticia->dt_noticia_formatted !!}
            </div>
        </div>
        <span class="noticia_interna_corpo1"> {!! $noticia->ds_texto !!}</span>
    </div>
    @component('website.components._column-right')@endcomponent
</div>
@endsection
