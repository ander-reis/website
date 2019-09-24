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
 * rota noticias
 */
Route::resource('noticias', 'Website\NoticiasController', ['only' => ['index', 'show']]);

/**
 * rota fonoaudiologia
 */
Route::resource('fono', 'Website\FonoAudiologiaController', ['only' => ['index']]);

// /**
//  * páginas principais
//  */
// Route::resource('fono', 'Website\FonoAudiologiaController', ['only' => ['index']]);

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
 * páginas principais
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
    Route::name('index')->get('{convencoes_entidade}', 'ConvencoesController@index');
    Route::name('show')->get('{convencoes_entidade}/{convencao}', 'ConvencoesController@show');
    Route::name('clausulas.show')->get('{convencoes_entidade}/{convencao}/{convencao_clausula}', 'ClausulasController@show');
});
