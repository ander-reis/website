<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);

/**
 * Auth Routes(s)
 */
Route::name('login')->get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::name('logout')->post('logout', 'Auth\LoginController@logout');

/**
 * Register Route(s)
 */
Route::get('curriculo/create', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('curriculo/create', 'Auth\RegisterController@register');

/**
 * Password Reset Route(S)
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

/**
 * rota home
 */
Route::name('home')->get('/', 'Website\HomeController@index');

/**
 * rota noticias
 */
Route::resource('noticias', 'Website\NoticiasController', ['only' => ['index', 'show']]);
Route::name('oculta')->get('/oculta/{id}', 'Website\NoticiasController@oculta');

/**
 * rota fonoaudiologia
 */
Route::resource('fono', 'Website\FonoAudiologiaController', ['only' => ['index']]);

/**
 * busca
 */
Route::view('/busca','website.busca.index');
Route::get('/busca/{Busca}','Website\BuscaController@show')->name('busca.show');
Route::post('/busca', function () {
    return redirect()->route('busca.show', ['termo' => $_POST['Buscar']]);
})->name('busca.executa');


/**
 * sindicalização
 */
Route::get('/nova-sindicalizacao','Website\NovaSindicalizacaoController@index')->name('nova-sindicalizacao.index');
Route::post('/nova-sindicalizacao','Website\NovaSindicalizacaoController@store')->name('nova-sindicalizacao.store');

/**
 * atendimento eletrônico
 */
Route::get('/atendimento-eletronico','Website\AtendimentoEletronicoController@index')->name('atendimento-eletronico.index');
Route::post('/atendimento-eletronico','Website\AtendimentoEletronicoController@store')->name('atendimento-eletronico.store');
Route::get('/atendimento-eletronico/{id}','Website\AtendimentoEletronicoController@show')->name('atendimento-eletronico.show');

/**
 * rota boletim
 */
Route::resource('boletim', 'Website\BoletimController', ['only' => ['index','store','destroy']]);

/**
 * cursos e congressos
 */
Route::name('cursos.index')->get('/cursos', 'Website\CursosController@index');
Route::name('cursos.programacao')->get('/cursos/programacao', 'Website\CursosController@cursos');
Route::name('cursos.show')->get('/cursos/programacao/{id}', 'Website\CursosController@show');
Route::name('cursos.list')->get('/cursos/listar', 'Website\CursosController@initSelect');
Route::name('cursos.list-select')->get('/cursos/selecionar', 'Website\CursosController@changeSelect');

/**
 * curriculo
 */
Route::name('curriculo.index')->get('curriculo', 'Website\CurriculoController@index');
Route::group(['middleware' => ['auth', 'verified'], 'namespace' => 'Website\\'], function(){
    Route::name('curriculo.edit')->get('curriculo/edit', 'CurriculoController@editar');
    Route::name('curriculo.update')->put('curriculo/update/{id}', 'CurriculoController@update');
});
Route::name('curriculo.show')->get('curriculo/{id}', 'Website\CurriculoController@show');
Route::name('curriculo.busca')->post('curriculo/busca', 'Website\CurriculoController@busca');

/**
 * rota calculo salario
 */
Route::name('salario.index')->get('/salario', function () {
    return view('website.salario.index');
 });

/**
 * páginas principais
 *
 * rota que verifica a pagina e em caso de erro configura pagina personalizada de erro
 */
Route::name('paginas-principais')->get('/{url_pagina}', 'Website\PaginasPrincipaisController@show', ['only' => ['show']]);

/**
 * rotas para download do pdf
 */
Route::name('convencao.asset')->get('/pdf/{convencao}', 'Website\ConvencoesController@convencaoWebAsset');
Route::name('aditamento.asset')->get('/pdf-aditamento/{convencao}', 'Website\ConvencoesController@aditamentoWebAsset');
// Route::name('slider.asset')->get('/slider/{id}/{img}', 'Website\HomeController@sliderImgAsset');

/***
 * Convençoes e acordo
 */
Route::group(['prefix' => 'convencoes-e-acordo', 'as' => 'convencao.', 'namespace' => 'Website'], function(){
    Route::name('lista')->get('lista', 'ConvencoesController@lista');
    Route::name('index')->get('{convencoes_entidade}', 'ConvencoesController@index');
    Route::name('show')->get('{convencoes_entidade}/{convencao}', 'ConvencoesController@show');
    Route::name('clausulas.show')->get('{convencoes_entidade}/{convencao}/{convencao_clausula}', 'ClausulasController@show');
});

/**
 * relacao escolas
 */
Route::group(['prefix' => 'relacao-escolas', 'as' => 'relacao-escolas.', 'namespace' => 'Website'], function (){
    Route::name('index')->get('/grupos', 'CadastroEscolasController@index');
    Route::name('nivel')->get('/grupos/nivel/{id_nivel}', 'CadastroEscolasController@nivel')->where('id_nivel', '[0-9]');
    Route::name('regiao')->get('/grupos/nivel/{id_nivel}/regiao/{id_regiao}', 'CadastroEscolasController@regiao')->where(['id_nivel' => '[0-9]', 'id_regiao' => '[0-9]']);
    Route::name('escola')->get('/grupos/nivel/{id_nivel}/regiao/{id_regiao}/escola', 'CadastroEscolasController@escola');
});
