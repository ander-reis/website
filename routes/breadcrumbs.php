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

Breadcrumbs::register('convencao.index', function($breadcrumbs, $convencao_entidade){
    $breadcrumbs->parent('home');
    $breadcrumbs->push($convencao_entidade->ds_entidade);
});

Breadcrumbs::register('convencao.show', function($breadcrumbs, $convencao_entidade){
    $breadcrumbs->parent('home');
    $breadcrumbs->push($convencao_entidade->ds_entidade, route('convencao.index', ['convencao' => $convencao_entidade->id]));
    $breadcrumbs->push('Convenção');
});

Breadcrumbs::register('convencao.clausula.show', function($breadcrumbs, $convencoes_entidade, $convencao, $convencao_clausula){
    $breadcrumbs->parent('home');
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


//Breadcrumbs::register('quem-somos', function ($breadcrumbs) {
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Quem somos', route('quem-somos'));
//});
//
//Breadcrumbs::register('ranking-salarios', function ($breadcrumbs) {
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Ranking de Salários', route('ranking-salarios'));
//});
//
//Breadcrumbs::register('direitos-professores', function ($breadcrumbs) {
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Direitos dos Professores', route('direitos-professores'));
//});
//
//Breadcrumbs::register('reajustes-piso-salarial', function ($breadcrumbs) {
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Reajustes e Pisos Salarial', route('reajustes-piso-salarial'));
//});
//
//Breadcrumbs::register('campanha-salarial', function ($breadcrumbs) {
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Campanha Salarial', route('campanha-salarial'));
//});
//
//Breadcrumbs::register('congressos-cursos', function ($breadcrumbs) {
//    $breadcrumbs->parent('home');
//    $breadcrumbs->push('Congressos e Cursos', route('congressos-cursos'));
//});
