<section class="mb-2">
    <nav class="navbar navbar-expand-lg navbar-light pl-0">
        <button class="navbar-toggler  text-center" type="button" data-toggle="collapse" data-target="#navbarSite"
            aria-controls="navbarSite" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand pl-1 mr-0" href="/">
            <img src="{{asset('images/logo_fonte_preta2.png')}}" alt="SinproSP" class="d-lg-none">
        </a>
        <div class="collapse navbar-collapse" id="navbarSite">
            <ul class="navbar-nav">
                <li class="nav-item dropdown pr-45">
                    <a class="nav-link" tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                        <span class="font-weight-bold menu">O SinproSP</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu">
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
                    <a class="nav-link" tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                        <span class="font-weight-bold menu">Direitos </span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown dropright dropdown-submenu">
                            <button class="dropdown-item dropdown-toggle" type="button"
                                data-toggle="dropdown">Convenções e Acordos</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="{{ route('convencao.index', ['convencao' => 2]) }}">Educação Básica</a>
                                <a class="dropdown-item"
                                    href="{{ route('convencao.index', ['convencao' => 1]) }}">Ensino Superior</a>
                                <a class="dropdown-item"
                                    href="{{ route('convencao.index', ['convencao' => 4]) }}">Senai</a>
                                <a class="dropdown-item" href="{{ route('convencao.index', ['convencao' => 5]) }}">Senai
                                    Superior</a>
                                <a class="dropdown-item"
                                    href="{{ route('convencao.index', ['convencao' => 6]) }}">Senac</a>
                                <a class="dropdown-item"
                                    href="{{ route('convencao.index', ['convencao' => 10]) }}">Senac - Ensino Médio</a>
                                <a class="dropdown-item"
                                    href="{{ route('convencao.index', ['convencao' => 7]) }}">Ensino Supletivo</a>
                                <a class="dropdown-item"
                                    href="{{ route('convencao.index', ['convencao' => 9]) }}">PUC-SP</a>
                                <a class="dropdown-item"
                                    href="{{ route('convencao.index', ['convencao' => 8]) }}">Mackenzie</a>
                                <a class="dropdown-item"
                                    href="{{ route('convencao.index', ['convencao' => 3]) }}">Sesi</a>
                            </div>
                        </div>
                        <a class="dropdown-item" href="http://www1.sinprosp.org.br/guia_consultas.asp" target="_blank">
                            Guia de Consultas
                        </a>
                        {{-- <a class="dropdown-item"
                                    href="{{ route('salario.index')}}">Como calcular o seu salário</a> --}}
                        <div class="dropdown dropright dropdown-submenu">
                            <button class="dropdown-item dropdown-toggle" type="button" data-toggle="dropdown">Salários
                                e reajustes</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item"
                                    href="{{route('paginas-principais', ['url-pagina' => 'seriehistorica'])}}">Reajuste
                                    - série histórica</a>
                                <a class="dropdown-item"
                                    href="{{route('paginas-principais', ['url-pagina' => 'pisoeb'])}}">Piso salarial
                                    (educ. básica)</a>
                                <a class="dropdown-item" href="{{ route('salario.index')}}">Como calcular o seu
                                    salário</a>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown pr-45">
                    <a class="nav-link" tabindex="0" data-toggle="dropdown" data-submenu="" aria-expanded="false">
                        <span class="font-weight-bold menu">Serviços</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="https://www.youtube.com/user/SINPROSP" target="_blank">
                            Acervo
                        </a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'app'])}}">
                            Aplicativo do SinproSP
                        </a>
                        <a class="dropdown-item" href="{{route('atendimento-eletronico.index')}}">
                            Atendimento Eletrônico
                        </a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'presencial'])}}">
                            Atendimento Presencial
                        </a>
                        <a class="dropdown-item" href="{{ route('curriculo.index') }}">
                            Banco de currículos
                        </a>
                        <a class="dropdown-item" href="{{route('boletim.index')}}">
                            Boletim do SinproSP
                        </a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'colonia'])}}">
                            Colônia de Férias
                        </a>
                        <a class="dropdown-item" href="http://www1.sinprosp.org.br/convenios.asp" target="_blank">
                            Convênios e Parcerias
                        </a>
                        <a class="dropdown-item" href="{{ route('cursos.index') }}">
                            Cursos
                        </a>
                        <a class="dropdown-item"
                            href="{{route('paginas-principais', ['url-pagina' => 'assistencia-juridica'])}}">
                            Departamento Jurídico
                        </a>
                        <a class="dropdown-item"
                            href="{{route('paginas-principais', ['url-pagina' => 'assistencia-previdenciaria'])}}">
                            Departamento Previdenciário
                        </a>
                        <a class="dropdown-item" href="{{route('fono.index')}}">
                            Fonoaudiologia
                        </a>
                        <a class="dropdown-item"
                            href="{{route('paginas-principais', ['url-pagina' => 'homologacao'])}}">
                            Homologação
                        </a>
                        <a class="dropdown-item"
                            href="{{route('paginas-principais', ['url-pagina' => 'plano-saude'])}}">
                            Plano de Saúde
                        </a>
                        <a class="dropdown-item" href="https://ranking.sinprosp.org.br" target="_blank">
                            Ranking de Salários
                        </a>
                        <a class="dropdown-item" href="{{route('relacao-escolas.index')}}">
                            Relação de Escolas
                        </a>
                        <a class="dropdown-item" href="{{route('paginas-principais', ['url-pagina' => 'whatsapp'])}}">
                            Whatsapp
                        </a>
                    </div>
                </li>
                <li class="nav-item pr-45">
                    <a class="nav-item nav-link font-weight-bold" href="{{route('atendimento-eletronico.index')}}"
                        style="color:rgb(51, 51, 51)">
                        <span class="font-weight-bold menu">Fale Conosco</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item pr-45">
                    <a class="nav-item nav-link font-weight-bold" href="{{route('busca.executa')}}"
                        style="color:rgb(51, 51, 51)">
                        <span class="font-weight-bold menu">Busca</span>
                        <i class="fa fa-angle-double-right font-weight-bold drop_icon" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</section>
