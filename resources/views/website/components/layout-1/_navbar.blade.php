<section>
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown pr-45">
                    <a class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="font-weight-bold menu">O SinproSP </span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'quem-somos'])}}">Quem Somos</a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'estatuto'])}}">Estatuto do SinproSP</a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'diretoria'])}}">Diretoria</a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'localizacao'])}}">Localização</a>
                    </div>
                </li>
                <li class="nav-item pr-45">
                    <a class="nav-link" href="{{route('noticias.index')}}">
                        <span class="font-weight-bold menu">Notícias</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pr-45">
                    <a class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="font-weight-bold menu">Direitos</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Convenções e Acordos</a>
                        <a class="dropdown-item" href="http://www.sinprosp.org.br/guia_consultas.asp">Guia de Consultas</a>
                        <a class="dropdown-item" href="http://www.sinprosp.org.br/guia_consultas.asp#salario">Salário do Professor</a>
                    </div>
                </li>
                <li class="nav-item dropdown pr-45">
                    <a class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="font-weight-bold menu">Serviços</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'assistencia-juridica'])}}">Atendimento Jurídico</a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'assistencia-previdenciaria'])}}">Atendimento Previdenciário</a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'atendimento-medico'])}}">Atendimento Médico</a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'colonia'])}}">Colônia de Férias</a>
                        <a class="dropdown-item" href="{{route('fono.index')}}"">Fonoaudiologia</a>
                        <a class="dropdown-item" href="http://planoprofessor.com.br/" target="_blank">Plano de Saúde</a>
                        <a class="dropdown-item" href="http://www.sinprosp.org.br/convenios.asp" target="_blank">Convênios e Parcerias</a>
                        <a class="dropdown-item" href="#">Aplicativo do SinproSP</a>
                        <a class="dropdown-item" href="http://www.sinprosp.org.br/atendimento.asp" target="_blank">Atendimento Eletrônico</a>
                        <a class="dropdown-item" href="http://www.sinprosp.org.br/boletim_eletronico.asp" target="_blank">Receba o Boletim</a>
                        <a class="dropdown-item" href="#">Acervo</a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'homologacao'])}}">Homologação</a>
                    </div>
                </li>
                <li class="nav-item pr-45">
                    <a class="nav-item nav-link font-weight-bold" href="http://www.sinprosp.org.br/atendimento.asp"  target="_blank" style="color:rgb(51, 51, 51)">
                        <span class="font-weight-bold menu">Fale Conosco</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item pr-45">
                    <a class="nav-link" href="#">
                        <span class="font-weight-bold menu">Busca</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>

            <a class="navbar-brand" href="#">
                <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
            </a>
        </div>
    </nav>
</section>
