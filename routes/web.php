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
Route::name('home')->get('/', 'HomeController@index');

/**
 * rotas auth: login, logout, register, remember password
 */
//Auth::routes();
Route::name('login')->get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');

/**
 * logout
 */
Route::name('logout')->post('logout', 'Auth\LoginController@logout');

/**
 * rota noticias
 */
Route::resource('noticias', 'NoticiasController', ['only' => ['index', 'show']]);

/**
 * rotas para download do pdf
 */
Route::name('convencao.asset')->get('/pdf/{convencao}', 'ConvencoesController@convencaoWebAsset');
Route::name('aditamento.asset')->get('/pdf-aditamento/{convencao}', 'ConvencoesController@aditamentoWebAsset');
/***
 * Convençoes e acordo
 */
Route::name('convencao.index')->get('/convencao-e-acordo/{convencoes_entidade}', 'ConvencoesController@index');
Route::name('convencao.show')->get('/convencao-e-acordo/{convencoes_entidade}/convencao/{convencao}', 'ConvencoesController@show');
Route::name('clausulas.show')->get('/convencao-e-acordo/{convencoes_entidade}/convencao/{convencao}/clausula/{convencao_clausula}', 'ClausulasController@show');

/**
 * páginas principais
 */
Route::name('paginas-principais')->get('/{url_pagina}', 'PaginasPrincipaisController@show', ['only' => ['show']]);

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
