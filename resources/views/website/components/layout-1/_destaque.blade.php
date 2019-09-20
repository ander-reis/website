<div class="row">
    <div class="col-lg-5 mb-3">
        @component('website.components.layout-1._slider')@endcomponent
    </div>
    <div class="col-lg-7">
        <div class="row">
            <div class="col-12">
                <span class="mb-0">
                    <i class="fa fa-ellipsis-v red" aria-hidden="true"></i>
                    <span class="manchete_chapeu"> DENÚNCIA
                        @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover1'])
                    </span>
                </span>
                <p class="mb-0 text-dark manchete_titulo text-justify">
                    <a href="{{ route('noticias.show', ['noticia' => 3634]) }}" class="text-link">
                        Encontros de mobilização dias 16 e 23 de fevereiro preparam assembleia com falta abonada
                    </a>
                </p>
                <p class="text-dark manchete_corpo text-justify">
                    Dias 16 e 23 estão previstos encontros de mobilização para organizar a categoria para a
                    assembleia
                    no dia 28 de fevereiro. Confira também o que já está sendo feito para intensificar o nosso
                    movimento. Participe!
                </p>

            </div>
            <div class="col-12 col-md-6">
                <span class="mb-0">
                    <i class="fa fa-ellipsis-v green" aria-hidden="true"></i>
                    <span class="noticia_chapeu1"> FIQUE DE OLHO 1
                            @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover2'])
                    </span>
                </span>
                <p class="text-dark mb-1 noticia_titulo1 text-justify">
                    <a href="{{ route('noticias.show', ['noticia' => 3634]) }}" class="text-link">
                        O que você deve saber para o início do ano letivo
                    </a>
                </p>
                <p class="text-dark text-justify noticia_corpo1">
                    No retorno às aulas, a redução de carga horária só pode ocorrer por comprovada diminuição do
                    número de
                    matrículas suficientemente grande que inviabiliza a formação de uma classe.
                </p>

            </div>
            <div class="col-12 col-md-6">
                <span class="mb-0">
                    <i class="fa fa-ellipsis-v blue" aria-hidden="true"></i>
                    <span class="noticia_chapeu1"> FIQUE DE OLHO 2
                            @include('website.components.layout-1._social_share_home', ['name' => 'icon-popover3'])
                    </span>
                </span>
                <p class="text-dark mb-1 noticia_titulo1 text-justify">
                    <a href="{{ route('noticias.show', ['noticia' => 3634]) }}" class="text-link">
                        O que você deve saber para o início do ano letivo
                    </a>
                </p>
                <p class="text-dark text-justify noticia_corpo1">
                    No retorno às aulas, a redução de carga horária só pode ocorrer por comprovada diminuição do
                    número de
                    matrículas suficientemente grande que inviabiliza a formação de uma classe.
                </p>
                </a>
            </div>
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
