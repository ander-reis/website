<section class="mb-2">
    <nav class="navbar navbar-expand-lg navbar-light pl-0">

        <button class="navbar-toggler text-center" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand pl-1 mr-0" href="/">
            <img src="{{asset('images/logo_fonte_preta2.png')}}" alt="SinproSP" class="d-lg-none">
        </a>


        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item dropdown pr-45">
                    <a class="nav-item nav-link" data-toggle="dropdown" href="#">
                        <span class="font-weight-bold menu">O SinproSP </span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'quem-somos'])}}">
                            Quem Somos
                        </a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'estatuto'])}}">
                            Estatuto do SinproSP
                        </a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'diretoria'])}}">
                            Diretoria
                        </a>
                        <a class="dropdown-item"
                           href="{{route('paginas-principais', ['url-pagina' => 'localizacao'])}}">
                            Localização
                        </a>
                    </div>
                </li>

                <li class="nav-item pr-45">
                    <a class="nav-link" href="{{route('noticias.index')}}">
                        <span class="font-weight-bold menu">Notícias</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                </li>

                <li class="nav-item dropdown pr-45">
                    <a href="#" id="menu" data-toggle="dropdown" class="nav-link">
                        <span class="font-weight-bold menu">Direitos </span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item dropdown-submenu">
                            <a href="#" data-toggle="dropdown" style="color: #212529;">Convençoes e Acordos
                                    <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item"
                                   href="{{ route('convencao.index', ['convencao' => 2]) }}">Educação Básica</a>
                                <a class="dropdown-item"
                                   href="{{ route('convencao.index', ['convencao' => 1]) }}">Ensino Superior</a>
                                <a class="dropdown-item"
                                   href="{{ route('convencao.index', ['convencao' => 9]) }}">PUC-SP</a>
                                <a class="dropdown-item"
                                   href="{{ route('convencao.index', ['convencao' => 3]) }}">Sesi</a>
                                <a class="dropdown-item"
                                   href="{{ route('convencao.index', ['convencao' => 4]) }}">Senai</a>
                                <a class="dropdown-item"
                                   href="{{ route('convencao.index', ['convencao' => 5]) }}">Senai Superior</a>
                                <a class="dropdown-item"
                                   href="{{ route('convencao.index', ['convencao' => 6]) }}">Senac</a>
                                <a class="dropdown-item"
                                   href="{{ route('convencao.index', ['convencao' => 8]) }}">Mackenzie</a>
                                <a class="dropdown-item"
                                   href="{{ route('convencao.index', ['convencao' => 7]) }}">Ensino Supletivo</a>
                            </ul>
                        </li>
                        <a class="dropdown-item" href="#">
                            Guia de Consultas
                        </a>
                        <a class="dropdown-item" href="#">
                            Salário do Professor
                        </a>
                    </ul>
                </li>

                <li class="nav-item dropdown pr-45">
                    <a class="nav-item nav-link" data-toggle="dropdown" href="#">
                        <span class="font-weight-bold menu">Serviços</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item"
                           href="{{route('paginas-principais', ['url-pagina' => 'assistencia-juridica'])}}">
                            Atendimento Jurídico
                        </a>
                        <a class="dropdown-item"
                           href="{{route('paginas-principais', ['url-pagina' => 'assistencia-previdenciaria'])}}">
                            Atendimento Previdenciário
                        </a>
                        <a class="dropdown-item"
                           href="{{route('paginas-principais', ['url-pagina' => 'atendimento-medico'])}}">
                            Atendimento Médico
                        </a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'colonia'])}}">
                            Colônia de Férias
                        </a>
                        <a class="dropdown-item" href="{{route('fono.index')}}">
                            Fonoaudiologia
                        </a>
                        <a class="dropdown-item" href="http://planoprofessor.com.br/" target="_blank">
                            Plano de Saúde
                        </a>
                        <a class="dropdown-item" href="http://www.sinprosp.org.br/convenios.asp" target="_blank">
                            Convênios e Parcerias
                        </a>
                        <a class="dropdown-item" href="#">
                            Aplicativo do SinproSP
                        </a>
                        <a class="dropdown-item" href="http://www.sinprosp.org.br/atendimento.asp" target="_blank">
                            Atendimento Eletrônico
                        </a>
                        <a class="dropdown-item" href="http://www.sinprosp.org.br/boletim_eletronico.asp"
                           target="_blank">
                            Receba o Boletim
                        </a>
                        <a class="dropdown-item" href="http://www.sinprosp.org.br" target="_blank">
                            Acervo
                        </a>
                        <a class="dropdown-item"
                           href="{{route('paginas-principais', ['url-pagina' => 'homologacao'])}}">
                            Homologação
                        </a>
                    </div>
                </li>

                <li class="nav-item pr-45">
                    <a class="nav-item nav-link font-weight-bold" href="http://www.sinprosp.org.br/atendimento.asp"
                       target="_blank" style="color:rgb(51, 51, 51)">
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
        </div>
    </nav>
</section>
