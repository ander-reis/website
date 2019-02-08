<section id="section1">
    <div class="row">


        <div class="col-lg-4 m-auto">
            @component('website.components._slider', ['sliders' => $sliders])@endcomponent
        </div>

        <div class="col-lg-5 mt-lg-0 mt-md-3 mt-sm-3 mt-3">
            <h6>DESTAQUE</h6>
            <h2 class="text-dark">{!! $destaque->ds_resumo !!}</h2>
            <p class="text-justify">
                <a href="{{ route('noticias.show', ['noticia' => $destaque->id]) }}" class="text-link-home">
                    {!! $destaque->ds_texto_home_destaque_col !!}
                </a>
            </p>
        </div>

        <div class="col-lg-3 mt-lg-0 mt-md-3 mt-sm-3 mt-3">
            <div class="row mb-2">
                <div class="col-lg-12">

                    <strong class="text-dark">{!! $destaque->ds_resumo !!}</strong>
                    <p>
                        <a href="{{ route('noticias.show', ['noticia' => $destaque->id]) }}" class="text-link-home">
                            {!! $destaque->ds_texto_home_destaque_row !!}
                        </a>
                    </p>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <strong class="text-dark">{!! $destaque->ds_resumo !!}</strong>
                    <p>
                        <a href="{{ route('noticias.show', ['noticia' => $destaque->id]) }}" class="text-link-home">
                            {!! $destaque->ds_texto_home_destaque_row !!}
                        </a>
                    </p>

                </div>
            </div>
        </div>

    </div>
</section>
