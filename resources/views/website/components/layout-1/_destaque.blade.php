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
                        @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover1'])
                    </span>
                </span>
                <p class="mb-0 text-dark manchete_titulo text-justify">
                    <a href="{{$noticias[0]->ds_link}}" class="text-link">
                        {{$noticias[0]->ds_titulo}}
                </p>
                <p class="text-dark manchete_corpo text-justify">
                    {{$noticias[0]->ds_texto_noticia}}
                </p>

            </div>
            @foreach ($noticias->slice(1, 2) as $noticia)
                <div class="col-12 col-md-6">
                    <span class="mb-0">
                        <i class="fa fa-ellipsis-v green" aria-hidden="true"></i>
                        <span class="noticia_chapeu1"> {{$noticia->ds_categoria}}
                            @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover2'])
                        </span>
                    </span>
                    <p class="text-dark mb-1 noticia_titulo1 text-justify">
                        <a href="{{$noticia->ds_link}}" class="text-link">
                            {{$noticia->ds_titulo}}
                        </a>
                    </p>
                    <p class="text-dark text-justify noticia_corpo1">
                        {{$noticia->ds_texto_noticia}}
                    </p>
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
