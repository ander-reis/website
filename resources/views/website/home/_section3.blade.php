<section id="section3">

    {{--<div class="row my-3 my-md-5">--}}
        {{--@foreach($noticias2 as $noticia)--}}
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

    <div class="row my-3 my-md-5">

        <div class="col-lg-6 mb-2">
            <img class="img-fluid" src="images/revistagiz_home.jpg" alt="Revista GIZ">
        </div>

        <div class="col-lg-4">
            <div class="row">
                @foreach($noticias as $noticia)
                    <div class="col-lg-12 col-md-12 col-sm-12 height">
                        <div class="row">
                            <div class="col-lg-6 col-6 mt-3 text-center">
                                <img class="img-fluid" src="images/interna_3146_5.jpg" alt="Imagem" style="width: 150px; height: 90px">
                            </div>
                            <div class="col-lg-6 col-6 mt-3">
                                <h6>NOTÍCIAS</h6>
                                <a href="{{ route('noticias.show', ['noticia' => $noticia->id]) }}" class="text-link-home">
                                    <b>{{ $noticia->ds_resumo }}</b>
                                </a>

                                {{--<b>{{ $noticia->ds_resumo }}</b>--}}
                                {{--<p>--}}
                                    {{--<a href="{{ route('noticias.show', ['noticia' => $noticia->id]) }}" class="text-link-home">--}}
{{--                                        {!! $noticia->ds_texto_formatted !!}--}}
                                    {{--</a>--}}
                                {{--</p>--}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-2 mt-lg-0 mt-md-3 mt-sm-3 mt-3 text-center">
            <img class="img-fluid" src="{{ asset('images/site/home/sindicalize-se.png') }}" alt="Sindicalizar">
        </div>
    </div>
</section>