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

Route::get('/', 'HomeController@index');

//Auth::routes();

Route::name('login')->get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
/**
 * logout
 */
Route::name('logout')->post('logout', 'Auth\LoginController@logout');


/**
 * Rota administração usuário
 */
Route::group([
    'namespace' => 'Admin\\',
    'middleware' => 'auth'
], function(){
    /**
     * home admin
     */
    Route::get('/home', 'HomeController@index')->name('home');
});
