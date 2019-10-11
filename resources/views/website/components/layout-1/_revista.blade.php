<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-3 col-md-6 mt-3">
                <a href="{{ route('paginas-principais', ['url-pagina' => 'sindicalizacao']) }}">
                    <img class="rounded mx-auto d-block w-100"
                        src="{{ asset('images/layout-1/home/sindicalizese.jpg') }}" alt="SinproSP">
                </a>
            </div>

            <div class="col-lg-3 col-md-6 mt-3">
                <a href="http://www1.sinprosp.org.br/cadastro_login.asp" target="_blank">
                    <img class="rounded mx-auto d-block w-100" src="{{ asset('images/layout-1/home/cadevoce.jpg') }}"
                        alt="SinproSP">
                </a>
            </div>

            <div class="col-lg-6 col-md-12 mt-3">
                <div class="p-3 giz_background">
                    <div class="row">
                        <div class="col-12 col-sm-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="http://revistagiz.sinprosp.org.br" target="_blank" class="text-link">
                                        <img src="{{ asset('images/layout-1/home/logo_revistagiz.png') }}"
                                            alt="SinproSP">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mt-2">
                                    <a href="{{ $noticias[7]->ds_link }}" target="_blank" class="text-link">
                                        <img src="{{ asset('/storage/revista_giz/' . $noticias[7]->id . '/' . $noticias[7]->ds_imagem) }}"
                                            alt="SinproSP" class="giz-img">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-7">
                            <div class="row text-justify">
                                <div class="col-12">
                                    <span class="text-dark font-weight-bold giz_titulo">
                                        <a href="{{ $noticias[7]->ds_link }}" target="_blank"
                                            class="text-link">{{ $noticias[7]->ds_titulo }}
                                        </a>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <p class="text-dark giz_corpo text-justify mb-0">
                                        <a href="{{ $noticias[7]->ds_link }}" target="_blank" class="text-link">
                                            {{ $noticias[7]->ds_texto_noticia }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
