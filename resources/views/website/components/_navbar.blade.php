<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="col-7 col-lg-2 text-center text-lg-left">
            <img src="{{ asset('images/layout-1/navbar/sinprosp_branco.png') }}" alt="SinproSP">
        </div> <!-- logo -->

        <div class="col-2 d-lg-none text-right">
            <button class="btn btn-outline-light my-2 my-sm-0" type="button" id="search-two">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div> <!-- search -->

        <div class="col-lg-9">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            SinproSP
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-white" href="#">Quem Somos</a>
                            <a class="dropdown-item text-white" href="#">Diretoria</a>
                            <a class="dropdown-item text-white" href="#">Estatuto</a>
                            <a class="dropdown-item text-white" href="#">Localização</a>
                        </div>
                    </li>
                    <li class="nav-item {{ active('noticias.*') }}">
                        <a class="nav-link" href="{{ route('noticias.index') }}">Notícias</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            À Definir
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-white" href="#">Ranking de Salários</a>
                            <a class="dropdown-item text-white" href="#">Convenções e Acordos</a>
                            <a class="dropdown-item text-white" href="#">Relação de Escolas</a>
                            <a class="dropdown-item text-white" href="#">Direitos do Professor</a>
                            <a class="dropdown-item text-white" href="#">Cálculos Salarias e Piso</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Fale com o SinproSP
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-white" href="#">Sindicalize-se</a>
                            <a class="dropdown-item text-white" href="#">Fale Conosco</a>
                            <a class="dropdown-item text-white" href="#">Boletim Eletrônico</a>
                            <a class="dropdown-item text-white" href="#">Cadastro</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Serviços
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-white" href="#">Atendimento Jurídico</a>
                            <a class="dropdown-item text-white" href="#">Atendimento Previdenciário</a>
                            <a class="dropdown-item text-white" href="#">Atendimento Médico</a>
                            <a class="dropdown-item text-white" href="#">Atendimento Fonoaudiólogo</a>
                            <a class="dropdown-item text-white" href="#">Colônia de Férias</a>
                            <a class="dropdown-item text-white" href="#">Plano de Saúde</a>
                            <a class="dropdown-item text-white" href="#">Convênios</a>
                            <a class="dropdown-item text-white" href="#">Banco de Currículo</a>
                            <a class="dropdown-item text-white" href="#">Homologação</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Convenções e Acordos
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-white" href="#">Educação Básica</a>
                            <a class="dropdown-item text-white" href="#">Educação Superior</a>
                            <a class="dropdown-item text-white" href="#">Senai</a>
                            <a class="dropdown-item text-white" href="#">Sesi</a>
                            <a class="dropdown-item text-white" href="#">Senai Superior</a>
                            <a class="dropdown-item text-white" href="#">Senac</a>
                            <a class="dropdown-item text-white" href="#">Outros</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Acervo
                        </a>
                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-white" href="#">Boletim Digital</a>
                            <a class="dropdown-item text-white" href="#">Publicações Especiais</a>
                            <a class="dropdown-item text-white" href="#">Áudio</a>
                            <a class="dropdown-item text-white" href="#">Vídeos</a>
                            <a class="dropdown-item text-white" href="#">Matérias Especiais</a>
                            <a class="dropdown-item text-white" href="#">Anteriores à 2011</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div> <!-- menu desktop -->

        <div id="box-search-one" class="col-1 col-lg-1 text-right">
            <button class="btn btn-outline-light my-2 my-sm-0" type="button" id="search-one">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div> <!-- search -->
    </nav>

    <div id="input-search" class="bg-dark" style="display: none">
        <div class="container">
            <div class="col-12">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Faça sua pesquisa" aria-label="Busca" aria-describedby="button-find-search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-light" type="button" id="button-find-search">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
