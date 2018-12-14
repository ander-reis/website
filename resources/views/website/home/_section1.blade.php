<section id="section1">
    <div class="row">
        <div class="col-lg-6 m-auto">
            @component('website.components._slider', ['sliders' => $sliders])@endcomponent
        </div>
        <div class="col-lg-6 mt-lg-0 mt-md-3 mt-sm-3 mt-3 text-justify">
            <h6>DESTAQUE</h6>
            <h2>{!! $destaque->ds_resumo !!}</h2>
            <a href="{{ route('noticias.show', ['noticia' => $destaque->id]) }}" class="text-link-home">
                {!! $destaque->ds_texto_home_destaque_col !!}
            </a>
            {{--<a href="{{ route('noticias.show', ['noticia' => $destaque->id]) }}" class="text-link-home">Leia</a>--}}
        </div>

        {{--<div class="col-lg-4 mt-lg-0 mt-md-3 mt-sm-3 mt-3 text-justify">--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<h6>DESTAQUE</h6>--}}
                    {{--<h4>{!! $destaque->ds_resumo !!}</h4>--}}
                    {{--<a href="{{ route('noticias.show', ['noticia' => $destaque->id]) }}" class="text-link-home">--}}
                        {{--{!! $destaque->ds_texto_home_destaque_row !!}--}}
                    {{--</a>--}}
                    {{--<a href="{{ route('noticias.show', ['noticia' => $destaque->id]) }}" class="text-link-home">Leia</a>--}}
                {{--</div>--}}
                {{--<div class="col-lg-12 mt-lg-0 mt-md-3 mt-sm-3 mt-3">--}}
                    {{--<h6>DESTAQUE</h6>--}}
                    {{--<h4>{!! $destaque->ds_resumo !!}</h4>--}}
                    {{--<a href="{{ route('noticias.show', ['noticia' => $destaque->id]) }}" class="text-link-home">--}}
                        {{--{!! $destaque->ds_texto_home_destaque_row !!}--}}
                    {{--</a>--}}
                    {{--<a href="{{ route('noticias.show', ['noticia' => $destaque->id]) }}" class="text-link-home">Leia</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>

    {{--<div class="row my-3 my-md-5">--}}
        {{--@foreach($noticias1 as $noticia)--}}
            {{--<div class="col-lg-6 col-12">--}}
                {{--<h6>NOTÍCIAS</h6>--}}
                {{--<h5>{{ $noticia->ds_resumo }}</h5>--}}
                {{--<p>--}}
                    {{--<a href="{{ route('noticias.show', ['noticia' => $noticia->id]) }}" class="text-link-home">--}}
                        {{--{!! $noticia->ds_texto_formatted !!}--}}
                    {{--</a>--}}
                {{--</p>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
</section>