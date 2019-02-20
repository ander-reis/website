{{ Breadcrumbs::render('noticias-listar') }}

{{--<div class="row">--}}
    {{--@foreach($noticias as $noticia)--}}
        {{--@if($noticias->currentPage() == 1)--}}
            {{--@if($loop->index <= 1)--}}
                {{--<div class="col-sm-6 mb-3 border-bottom">--}}
                    {{--<div class="card border-light">--}}
                        {{--<div class="card-body">--}}
                            {{--<p class="text-right">{{ $noticia->dt_noticia_formatted }}</p>--}}
                            {{--<h6 class="card-title">{!! $noticia->ds_resumo !!}</h6>--}}
                            {{--<a href="{{ route('noticias.show', ['noticia' => $noticia->id_noticia]) }}" class="text-link">--}}
                                {{--<p class="text-justify">{!! $noticia->ds_texto_formatted !!}</p>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--@endif--}}
        {{--@if($loop->index > 1)--}}
            {{--<div class="col mb-3 border-bottom">--}}
                {{--<div class="card border-light" style="min-width: 16em">--}}
                    {{--<div class="card-body">--}}
                        {{--<h6 class="text-right">{!! $noticia->dt_noticia_formatted !!}</h6>--}}
                        {{--<h6 class="card-text"><b>{!! $noticia->ds_resumo !!}</b></h6>--}}
                        {{--<a href="{{ route('noticias.show', ['noticia' => $noticia->id_noticia]) }}" class="text-link">--}}
                            {{--<p class="text-justify">{!! $noticia->ds_texto_formatted !!}</p>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}
    {{--@endforeach--}}
{{--</div>--}}

<div class="row">
    <div class="col-12 col-md-9">
        @foreach($noticias as $noticia)
            @if($noticias->currentPage() == 1)
                @if($loop->index <= 1)
                    <div class="col mb-3 border-bottom">
                        <div class="card border-light">
                            <div class="card-body">
                                <p class="text-right">{{ $noticia->dt_noticia_formatted }}</p>
                                <h6 class="card-title">{!! $noticia->ds_resumo !!}</h6>
                                <a href="{{ route('noticias.show', ['noticia' => $noticia->id_noticia]) }}"
                                   class="text-link">
                                    <p class="text-justify">{!! $noticia->ds_texto_formatted !!}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if($loop->index > 1)
                <div class="col mb-3 border-bottom">
                    <div class="card border-light" style="min-width: 16em">
                        <div class="card-body">
                            <h6 class="text-right">{!! $noticia->dt_noticia_formatted !!}</h6>
                            <h6 class="card-text"><b>{!! $noticia->ds_resumo !!}</b></h6>
                            <a href="{{ route('noticias.show', ['noticia' => $noticia->id_noticia]) }}"
                               class="text-link">
                                <p class="text-justify">{!! $noticia->ds_texto_formatted !!}</p>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @component('website.components._column-right')@endcomponent

</div>


{{--paginacao--}}
{!! $noticias->links() !!}
