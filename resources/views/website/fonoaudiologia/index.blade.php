@extends('layouts.website')

@section('content')
<img src="{{ asset('images/fonoaudiologia/banner_voz_top.jpg') }}">

<div class="row">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-3 mt-4 text-center">
                    <img src="{{ asset('images/fonoaudiologia/tratamento.jpg') }}">
                </div>

                <div class="col-md-3 mt-4 text-center">
                    <img src="{{ asset('images/fonoaudiologia/palestra.jpg') }}">
                </div>

                <div class="col-md-3 mt-4 text-center">
                    <img src="{{ asset('images/fonoaudiologia/dicas.jpg') }}">
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 mt-4 text-center">
                    <img src="{{ asset('images/fonoaudiologia/bemestar.jpg') }}">

                    <a href="arquivos/voz/bem_estar_vocal2016.pdf" target="_blank"><img
                            src="img/servicos/voz/img_bemestar.jpg" alt=""
                            title="Clique para acessar a versão em português" style="border:1px #000 solid" /></a>
                    <div style="width:273px" class="texto_12_preto">
                        <p>Faça o download do pdf:</p>
                        <p>&raquo; <a href="arquivos/voz/bem_estar_vocal2016.pdf" target="_blank">(Versão em
                                Português)<br />Bem-estar vocal: uma nova perspectiva de cuidar da voz</a></span></p>
                        <p>&raquo; <a href="arquivos/voz/bem_estar_vocal2016_en.pdf" target="_blank">(English
                                version)<br />Vocal wellbeing: a new perspective of vocal care</a></span></p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 text-center">
                    <img src="{{ asset('images/fonoaudiologia/capafilme.jpg') }}">
                </div>
            </div>
        </div>
    </div>

    @component('website.components._column-right')@endcomponent
</div>
@endsection
