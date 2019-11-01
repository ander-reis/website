@extends('layouts.website')

@section('content')

    {{ Breadcrumbs::render('cursos.index') }}

    <div class="row">
        <div class="col-md-12">
            <section>
                <div class="alert alert-dark" role="alert">
                    <h5>Cursos</h5>
                </div>
                <p class="mt-4 mb-4">
                    O SinproSP promove cursos e atividades para professores durante todo o ano, dos quais diferentes
                    assuntos e áreas do conhecimento, com condições especiais para quem é sindicalizado. Os eventos são
                    realizados no Sindicato.
                </p>
                <p class="mt-4 mb-4">
                    <a href="{{ route('cursos.programacao') }}" class="btn btn-outline-dark">Conheça a agenda dos
                        cursos</a>
                </p>
            </section>
            <section>
                <div class="alert alert-dark" role="alert">
                    <h5>Congressos</h5>
                </div>
                <p class="mt-4 mb-4">
                    Desde 2011, o SinproSP promove o seu Congresso de Pesquisa do Ensino (Conpe) trazendo profissionais
                    de renome e aproximando a pesquisa científica e os sabers construídos nas salas de aulas, nas mais
                    diferenets áreas do conhecimento.
                </p>
                <h5>ANAIS DOS CONGRESSOS DE PESQUISA DO ENSINO</h5>
                <p class="mt-4 mb-4">
                    <a href="http://www1.sinprosp.org.br/congresso_matematica/index.asp"
                       class="link-active" target="_blank"><strong>Conpe 7 (2018)</strong> - 7º Congresso de Pesquisa do Ensino -
                        Inovação e Educação - o tempo do professores.</a>
                </p>
                <p class="mt-4 mb-4">
                    <a href="http://www1.sinprosp.org.br/conpeb/" class="link-active" target="_blank">
                        <strong>Conpe 6 (2017)</strong> - 6º Congresso de Pesquisa do Ensino - Educação e Tecnologia - revisitando a
                        sala de aula.
                    </a>
                </p>
                <p class="mt-4 mb-4">
                    <a href="http://www1.sinprosp.org.br/conpe5/" class="link-active" target="_blank">
                        <strong>Conpe 5 (2016)</strong> - 5º Congresso de Pesquisa do Ensino - Física e Química e no mundo Acadêmico - o desafio interdisciplinar.
                    </a>
                </p>
                <p class="mt-4 mb-4">
                    <a href="http://www1.sinprosp.org.br/conpe4/index.asp" class="link-active" target="_blank">
                        <strong>Conpe 4 (2015)</strong> - 4º Congresso de Pesquisa do Ensino - As Ciências a Educação.
                    </a>
                </p>
                <p class="mt-4 mb-4">
                    <a href="http://www1.sinprosp.org.br/conpe3/index.asp" class="link-active" target="_blank">
                        <strong>Conpe 3 (2014)</strong> - 3º Congresso de Pesquisa do Ensino - O Ensino Infantil e Fundamental I: Reflexões e Desafios.
                    </a>
                </p>
                <p class="mt-4 mb-4">
                    <a href="http://www1.sinprosp.org.br/conpeb/" class="link-active" target="_blank">
                        <strong>Conpe 2 (2013)</strong> - 2º Congresso de Pesquisa do Ensino em Ciências Naturais e Biologia.
                    </a>
                </p>
                <p class="mt-4 mb-4">
                    <a href="http://www1.sinprosp.org.br/congresso_matematica/index.asp" class="link-active" target="_blank">
                        <strong>Conpe 1 (2011)</strong> - 1º Congresso Brasileiro de Matemática.
                    </a>
                </p>
            </section>
        </div>
    </div>
@endsection
