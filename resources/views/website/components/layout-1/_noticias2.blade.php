<div class="row">
    <div class="col-sm-6 col-md-3 mt-2">
        <i class="fa fa-ellipsis-v green" aria-hidden="true"></i>
        <span class="manchete_chapeu"> FIQUE DE OLHO
            @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover4'])
        </span>
        <p class="text-dark mb-0 noticia_titulo2 text-justify">
            <a href="{{ route('noticias.show', ['noticia' => 3634]) }}" class="text-link">
                Informações sempre úteis para os professores no reinício das aulas
            </a>
        </p>
    </div>

    <div class="col-sm-6 col-md-3 mt-2">
        <i class="fa fa-ellipsis-v orange" aria-hidden="true"></i>
        <span class="manchete_chapeu"> CAMPANHA SALARIAL
                @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover5'])
        </span>

        <p class="text-dark mb-0 noticia_titulo2 text-justify">
            <a href="{{ route('noticias.show', ['noticia' => 3634]) }}" class="text-link">
                Como ficou o dissídio coletivo da Educação Básica ?
            </a>
        </p>
    </div>

    <div class="col-sm-6 col-md-3 mt-2">
        <i class="fa fa-ellipsis-v lightblue" aria-hidden="true"></i>
        <span class="manchete_chapeu"> ENSINO SUPERIOR
                @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover6'])
        </span>

        <p class="text-dark mb-0 noticia_titulo2 text-justify">
            <a href="{{ route('noticias.show', ['noticia' => 3634]) }}" class="text-link">
                Assembleia aceita proposta das Faculdades Rio Branco
            </a>
        </p>
    </div>

    <div class="col-sm-6 col-md-3 mt-2">
        <i class="fa fa-ellipsis-v purple" aria-hidden="true"></i>
        <span class="manchete_chapeu"> FIQUE DE OLHO
                @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover7'])
        </span>

        <p class="text-dark mb-0 noticia_titulo2 text-justify">
            <a href="{{ route('noticias.show', ['noticia' => 3634]) }}" class="text-link">
                Dicas que podem evitar ou resolver problemas no trabalho
            </a>
        </p>
    </div>
</div>
