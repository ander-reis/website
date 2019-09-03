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

/**
 * rota home
 */
Route::name('home')->get('/', 'Website\HomeController@index');

/**
 * Corrige erro: se estiver logado e acessar rota '/login' estava redirecionando para '/home'
 */
Route::get('/home', function(){
    return redirect('/admin/dados-pessoal');
});

/**
 * rotas auth: login, logout, register, remember password
 */
//Auth::routes();
Route::name('login')->get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login');

/**
 * logout
 */
Route::name('logout')->post('/logout', 'Auth\LoginController@logout');

/**
 * rota noticias
 */
Route::resource('noticias', 'Website\NoticiasController', ['only' => ['index', 'show']]);

/**
 * rota fonoaudiologia
 */
Route::resource('fono', 'Website\FonoAudiologiaController', ['only' => ['index']]);

/**
 * atendimento eletrônico
 */
Route::resource('atendimento-eletronico', 'Website\AtendimentoEletronicoController');

/**
 * páginas principais
 */
Route::name('paginas-principais')->get('/{url_pagina}', 'Website\PaginasPrincipaisController@show', ['only' => ['show']]);

/**
 * rotas para download do pdf
 */
Route::name('convencao.asset')->get('/pdf/{convencao}', 'Website\ConvencoesController@convencaoWebAsset');
Route::name('aditamento.asset')->get('/pdf-aditamento/{convencao}', 'Website\ConvencoesController@aditamentoWebAsset');
/***
 * Convençoes e acordo
 */
Route::group(['prefix' => 'convencoes-e-acordo', 'as' => 'convencao.', 'namespace' => 'Website'], function(){
    Route::name('index')->get('{convencoes_entidade}', 'ConvencoesController@index');
    Route::name('show')->get('{convencoes_entidade}/{convencao}', 'ConvencoesController@show');
    Route::name('clausulas.show')->get('{convencoes_entidade}/{convencao}/{convencao_clausula}', 'ClausulasController@show');
});

/**
 * Rota administração usuário
 */
Route::group([
    'namespace' => 'Admin\\',
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth'
], function(){
    /**
     * dados pessoal
     */
    Route::resource('dados-pessoal', 'DadosPessoalController', ['only' => ['index', 'update']]);

    /**
     * escolas
     */
    Route::resource('escolas', 'EscolasController', ['except' => ['show']]);

    /**
     * historico
     */
    Route::resource('historico', 'HistoricoController');

    /**
     * buscar cep
     */
    Route::name('buscar-cep')->get('/cep', 'DadosPessoalController@buscarCep');
});
