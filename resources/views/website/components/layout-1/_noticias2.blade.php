@section('og')
    <meta property="og:title" content="SinproSP" />
    <meta property="og:url" content="http://www.sinprosp.org.br" />
    <meta property="og:description" content="SinproSP" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="http://www.sinprosp.org.br/images/layout-1/sinpro_300x200s.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="200" />
    <meta property="og:image:alt" content="SinproSP" />
@endsection

<div class="row">
    @foreach ($noticias->slice(3, 4) as $noticia)
        <div class="col-sm-6 col-md-3 mt-2">
            @if($loop->index == 0)
                <i class="fa fa-ellipsis-v green" aria-hidden="true"></i>

                <span class="manchete_chapeu"> {{ dataUpperCase($noticia->ds_categoria)}}
                    @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover4', 'id' => $loop->index + 3])
                </span>

            @elseif($loop->index == 1)
                <i class="fa fa-ellipsis-v orange" aria-hidden="true"></i>

                <span class="manchete_chapeu"> {{ dataUpperCase($noticia->ds_categoria)}}
                    @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover5', 'id' => $loop->index + 3])
                </span>

            @elseif($loop->index == 2)
                <i class="fa fa-ellipsis-v lightblue" aria-hidden="true"></i>

                <span class="manchete_chapeu"> {{ dataUpperCase($noticia->ds_categoria)}}
                    @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover6', 'id' => $loop->index + 3])
                </span>
            @elseif($loop->index == 3)
                <i class="fa fa-ellipsis-v purple" aria-hidden="true"></i>

                <span class="manchete_chapeu"> {{ dataUpperCase($noticia->ds_categoria)}}
                    @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover7', 'id' => $loop->index + 3])
                </span>
            @endif

            <p class="text-dark mb-0 noticia_titulo2 text-justify">
                <a href="{{$noticia->ds_link}}" class="text-link">
                    {{$noticia->ds_titulo}}
                </a>
            </p>
        </div>
    @endforeach
</div>
