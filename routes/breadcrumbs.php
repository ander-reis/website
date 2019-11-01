<?php

Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('paginas-principais', function ($breadcrumbs, $pagina) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push($pagina->txt_titulo);
});

Breadcrumbs::register('noticias-listar', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Notícias', route('noticias.index'));
});

Breadcrumbs::register('noticias-show', function ($breadcrumbs, $noticia) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Notícias', route('noticias.index'));
    $breadcrumbs->push($noticia->categoria->ds_categoria, route('noticias.show', $noticia));
});

Breadcrumbs::register('convencao-listar', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Níveis', route('convencao.lista'));
});

Breadcrumbs::register('convencao.index', function($breadcrumbs, $convencao_entidade){
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Níveis',route('convencao.lista'));
    $breadcrumbs->push($convencao_entidade->ds_entidade);
});

Breadcrumbs::register('convencao.show', function($breadcrumbs, $convencao_entidade){
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Níveis',route('convencao.lista'));
    $breadcrumbs->push($convencao_entidade->ds_entidade, route('convencao.index', ['convencao' => $convencao_entidade->id]));
    $breadcrumbs->push('Convenção');
});

Breadcrumbs::register('convencao.clausula.show', function($breadcrumbs, $convencoes_entidade, $convencao, $convencao_clausula){
    $breadcrumbs->parent('home');
    $breadcrumbs->push('lista',route('convencao.lista'));
    $breadcrumbs->push($convencoes_entidade->ds_entidade, route('convencao.index', ['convencao' => $convencoes_entidade->id]));
    $breadcrumbs->push('Convenção', route('convencao.show', [
        'convencao_entidade' => $convencoes_entidade->id,
        'convencao' => $convencao->id_convencao
    ]));
    $breadcrumbs->push('Cláusula ' . $convencao_clausula->num_clausula);
});

Breadcrumbs::register('cadastro', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
    $breadcrumbs->push('Cadastro');
});

Breadcrumbs::register('relacao-escolas.group', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Relação de Escolas');
});

Breadcrumbs::register('relacao-escolas.nivel', function ($breadcrumbs, $id_nivel, $nome_breadcrumb) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Relação de Escolas', route('relacao-escolas.index'));
    $breadcrumbs->push($nome_breadcrumb, route('relacao-escolas.nivel', ['id_nivel' => $id_nivel]));
});

Breadcrumbs::register('relacao-escolas.escola', function ($breadcrumbs, $id_nivel, $nome_breadcrumb) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Relação de Escolas', route('relacao-escolas.index'));
    $breadcrumbs->push($nome_breadcrumb, route('relacao-escolas.nivel', ['id_nivel' => $id_nivel]));
    $breadcrumbs->push('Dados da Escola');
});

Breadcrumbs::register('cursos.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cursos e Congressos');
});

Breadcrumbs::register('cursos.programacao', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cursos e Congressos', route('cursos.index'));
    $breadcrumbs->push('Cursos');
});

Breadcrumbs::register('cursos.show', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Cursos', route('cursos.programacao'));
    $breadcrumbs->push('Curso');
});

// exemplo
//Breadcrumbs::register('ranking-salarios', function ($breadcrumbs) {
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Ranking de Salários', route('ranking-salarios'));
//});
