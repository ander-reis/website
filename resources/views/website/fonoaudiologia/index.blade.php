@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <img alt="" src="{{ asset('images/fonoaudiologia/banner_voz_top.jpg') }}">
        </div>

        <div class="col-12 col-sm-12 col-md-9">

            <div class="row">
                <div class="col-4 mt-4 text-center">
                    <a href="http://www.sinprosp.org.br/voz.asp?mn=2" target="_blank">
                        <img class="img-fluid" alt="" src="{{ asset('images/fonoaudiologia/tratamento.jpg') }}">
                    </a>
                </div>

                <div class="col-4 mt-4 text-center">
                    <a href="http://www.sinprosp.org.br/voz.asp?mn=3" target="_blank">
                        <img class="img-fluid" alt="" src="{{ asset('images/fonoaudiologia/palestra.jpg') }}">
                    </a>
                </div>

                <div class="col-4 mt-4 text-center">
                    <a href="http://www.sinprosp.org.br/voz.asp?mn=4" target="_blank">
                        <img class="img-fluid" alt="" src="{{ asset('images/fonoaudiologia/dicas.jpg') }}">
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 mt-4 text-center">
                    <img class="img-fluid" alt="" src="{{ asset('images/fonoaudiologia/bemestar.jpg') }}">

                    <a href="http://www.sinprosp.org.br/arquivos/voz/bem_estar_vocal2016.pdf" target="_blank">
                        <img src="img/servicos/voz/img_bemestar.jpg" alt=""
                             title="Clique para acessar a versão em português"/>
                    </a>
                    <div>
                        <small>Faça o download do pdf:</small>
                        <p>
                            <small>
                                <a href="http://www.sinprosp.org.br/arquivos/voz/bem_estar_vocal2016.pdf"
                                   target="_blank">
                                    (Versão em Português)
                                    <br/>
                                    Bem-estar vocal: uma nova perspectiva de cuidar da voz
                                </a>
                            </small>
                        </p>
                        <p>
                            <small>
                                <a href="http://www.sinprosp.org.br/arquivos/voz/bem_estar_vocal2016_en.pdf"
                                   target="_blank">
                                    (English version)
                                    <br/>
                                    Vocal wellbeing: a new perspective of vocal care
                                </a>
                            </small>
                        </p>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-6 mt-4 text-center">
                    <a href="http://youtu.be/d9e4oHqtIXY" target="_blank">
                        <img class="img-fluid" alt="" src="{{ asset('images/fonoaudiologia/capafilme.jpg') }}">
                        <p>
                            <small>Clique na imagem para assistir</small>
                        </p>
                    </a>
                </div>
            </div>
        </div>

        @component('website.components._column-right')@endcomponent
    </div>
@endsection
