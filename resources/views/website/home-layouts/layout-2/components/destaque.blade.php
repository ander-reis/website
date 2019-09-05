<div class="row">
    <div class="col-lg-5 mb-3">
        @component('website.components.layout-1._slider')@endcomponent
    </div>

    <div class="col-lg-7">

        @component('website.home-layouts.layout-2.components._compartilhar')@endcomponent

        <div class="row">
            <div class="col-12">
                <a href="{{ route('noticias.show', ['noticia' => 3634]) }}">
                    <p class="text-dark manchete_titulo">
                        O que você deve saber para o início do ano letivo
                    </p>
                    <p class="text-dark text-justify manchete_corpo">
                        No retorno às aulas, a redução de carga horária só pode ocorrer por comprovada diminuição do
                        número de
                        matrículas suficientemente grande que inviabiliza a formação de uma classe.
                    </p>
                </a>
            </div>

            <div class="col-6">

                @component('website.home-layouts.layout-2.components._compartilhar')@endcomponent

                <a href="{{ route('noticias.show', ['noticia' => 3634]) }}">
                    <p class="text-dark mb-1 noticia_titulo1">
                        O que você deve saber para
                    </p>
                    <p class="text-dark text-justify noticia_corpo1">
                        No retorno às aulas, a redução de carga horária só pode ocorrer por comprovada diminuição do
                        número de
                        matrículas suficientemente grande que inviabiliza a formação de uma classe.
                    </p>
                </a>
            </div>

            <div class="col-6">

                @component('website.home-layouts.layout-2.components._compartilhar')@endcomponent

                <a href="{{ route('noticias.show', ['noticia' => 3634]) }}">
                    <p class="text-dark mb-1 noticia_titulo1">
                        O que você deve saber para o início do ano letivo
                    </p>
                    <p class="text-dark text-justify noticia_corpo1">
                        No retorno às aulas, a redução de carga horária só pode ocorrer por comprovada diminuição do
                        número de
                        matrículas suficientemente grande que inviabiliza a formação de uma classe.
                    </p>
                </a>
            </div>
        </div>

    </div>

{{--    <div class="col-lg-6">--}}
{{--        <a href="{{ route('noticias.show', ['noticia' => 3634]) }}">--}}
{{--            <p class="text-dark mb-1 noticia_titulo1">--}}
{{--                O que você deve saber para o início do ano letivo--}}
{{--            </p>--}}
{{--            <p class="text-dark text-justify noticia_corpo1">--}}
{{--                No retorno às aulas, a redução de carga horária só pode ocorrer por comprovada diminuição do--}}
{{--                número de--}}
{{--                matrículas suficientemente grande que inviabiliza a formação de uma classe.--}}
{{--            </p>--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    <div class="col-lg-6">--}}
{{--        <a href="{{ route('noticias.show', ['noticia' => 3634]) }}">--}}
{{--            <p class="mb-0 text-dark manchete_titulo">--}}
{{--                Encontros de mobilização dias 16 e 23 de fevereiro preparam assembleia com falta abonada--}}
{{--            </p>--}}
{{--            <p class="text-dark manchete_corpo">--}}
{{--                Dias 16 e 23 estão previstos encontros de mobilização para organizar a categoria para a--}}
{{--                assembleia--}}
{{--                no dia 28 de fevereiro. Confira também o que já está sendo feito para intensificar o nosso--}}
{{--                movimento. Participe!--}}
{{--            </p>--}}
{{--        </a>--}}
{{--    </div>--}}

</div>
