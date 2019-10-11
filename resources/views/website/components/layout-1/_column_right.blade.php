<div class="col-12 col-md-3 d-none d-sm-block border-left border-secondary">
    <div class="row">
        <div class="col">
                <a href="{{ route('paginas-principais', ['url-pagina' => 'sindicalizacao']) }}">
                    <img class="img-fluid rounded"
                        src="{{ asset('images/layout-1/images-coluna/sindicalizese.png') }}" alt="SinproSP">
                </a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <a href="{{route('atendimento-eletronico.index')}}">
                <img class="img-fluid rounded" src="{{ asset('images/layout-1/images-coluna/fale_sinprosp.png') }}" alt="">
            </a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <a href="{{route('boletim.index')}}">
                <img class="img-fluid rounded" src="{{ asset('images/layout-1/images-coluna/boletim.png') }}" alt="">
            </a>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
                <a href="http://www1.sinprosp.org.br/cadastro_login.asp" target="_blank">
                    <img class="mg-fluid rounded"
                        src="{{ asset('images/layout-1/images-coluna/cadastro.png') }}" alt="SinproSP">
                </a>
        </div>
    </div>
</div>
