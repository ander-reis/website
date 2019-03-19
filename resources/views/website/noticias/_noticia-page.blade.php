{{ Breadcrumbs::render('noticias-show', $noticia) }}

<div class="row">
    <div class="col-md-9 mb-3 mb-md-5">
        <h1>{!! $noticia->ds_resumo !!}</h1>

<div class="row mb-5">
    <div class="col-md-12">
        {!! $noticia->dt_noticia_formatted !!} - última atualização
    </div>
</div>
        {!! $noticia->ds_texto !!}
    </div>

    @component('website.components._column-right')@endcomponent
</div>
