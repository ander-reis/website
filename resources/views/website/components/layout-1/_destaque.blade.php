@section('og')
    <meta property="og:title" content="SinproSP" />
    <meta property="og:url" content="http://www.sinprosp.org.br" />
    <meta property="og:description" content="SinproSP" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="http://www.sinprosp.org.br/images/layout-1/og/sinpro_300x200s.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="200" />
    <meta property="og:image:alt" content="SinproSP" />
@endsection


<div class="row">
    <div class="col-lg-5 mb-3">
        @component('website.components.layout-1._slider',['sliders' => $sliders])@endcomponent
    </div>
    <div class="col-lg-7">
        <div class="row">
            <div class="col-12">
                <span class="mb-0">
                    <i class="fa fa-ellipsis-v red" aria-hidden="true"></i>
                    <span class="manchete_chapeu">{{$noticias[0]->ds_categoria}}
                        @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover1', 'id' => '0'])
                    </span>
                </span>

                <p class="mb-0 text-dark manchete_titulo text-justify">
                    <a href="{{$noticias[0]->ds_link}}" class="text-link">
                        {{$noticias[0]->ds_titulo}}
                    </a>
                </p>
                <a href="{{$noticias[0]->ds_link}}" class="text-link">
                    <p class="text-dark manchete_corpo text-justify">
                        {{$noticias[0]->ds_texto_noticia}}
                    </p>
                </a>

            </div>
            @foreach ($noticias->slice(1, 2) as $noticia)
                <div class="col-12 col-md-6">
                    <span class="mb-0">
                        @if($loop->index == 0)
                            <i class="fa fa-ellipsis-v green" aria-hidden="true"></i>
                            <span class="noticia_chapeu1"> {{$noticia->ds_categoria}}
                                    @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover2', 'id' => '1'])
                                </span>
                        @elseif($loop->index == 1)
                            <i class="fa fa-ellipsis-v blue" aria-hidden="true"></i>
                            <span class="noticia_chapeu1"> {{$noticia->ds_categoria}}
                                    @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover3', 'id' => '2'])
                                </span>
                        @endif

                    </span>
                    <p class="text-dark mb-1 noticia_titulo1 text-justify">
                        <a href="{{$noticia->ds_link}}" class="text-link">
                            {{$noticia->ds_titulo}}
                        </a>
                    </p>
                    <a href="{{$noticia->ds_link}}" class="text-link">
                        <p class="text-dark text-justify noticia_corpo1">
                            {{$noticia->ds_texto_noticia}}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row d-lg-none">
            <div class="col-12">
                <a href="{{ route('noticias.index') }}">
                    <i class="fa fa-ellipsis-v orange" aria-hidden="true"></i>
                    Outras Noticias
                </a>
            </div>
        </div>
    </div>
</div>
