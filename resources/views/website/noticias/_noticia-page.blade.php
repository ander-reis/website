@extends('layouts.website')

@section('content')

{{-- {{ Breadcrumbs::render('noticias-show', $noticia) }} --}}

<div class="row">
    <span class="noticia_interna_chapeu1">{{ $noticia->categoria->ds_categoria }}</span>

</div>
<div class="row">
    <div class="col-md-9 mb-3 mb-md-5">
        <h1 class="noticia_interna_titulo1">{!! $noticia->ds_resumo !!}</h1>

        <div class="row mb-5">
            <div col="col text-left">
                rede social
            </div>
            <div class="col text-right time">
                Atualizada em {!! $noticia->dt_noticia_formatted !!}
            </div>
        </div>
        <span class="noticia_interna_corpo1"> {!! $noticia->ds_texto !!}</span>
    </div>

    @component('website.components._column-right')@endcomponent
</div>
@endsection
