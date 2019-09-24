<div class="row">
        @foreach ($noticias->slice(3, 4) as $noticia)
            <div class="col-sm-6 col-md-3 mt-2">
                <i class="fa fa-ellipsis-v green" aria-hidden="true"></i>
                <span class="manchete_chapeu"> {{ dataUpperCase($noticia->ds_categoria)}}
                    @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover4'])
                </span>
                <p class="text-dark mb-0 noticia_titulo2 text-justify">
                    <a href="{{$noticia->ds_link}}" class="text-link">
                            {{$noticia->ds_titulo}}
                    </a>
                </p>
            </div>
        @endforeach
</div>
