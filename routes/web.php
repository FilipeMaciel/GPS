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

Route::get('/', 'IndexController@index');

Route::get('/login','AuthController@login')->name('login')->middleware('guest');
Route::post('/login','AuthController@attempt');
Route::get('/logout','AuthController@logout')->name('logout');

Route::group(['middleware' => 'auth'],function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'usuario', 'as' => 'usuario.'], function(){
        Route::get('/', 'UsuarioController@index')->name('index');
        Route::get('/cadastrar', 'UsuarioController@create')->name('create');
        Route::post('/cadastrar', 'UsuarioController@store')->name('store');
        Route::get('/{id}/alterar', 'UsuarioController@edit')->name('edit');
        Route::post('/{id}/alterar', 'UsuarioController@update')->name('update');
        Route::get('/{id}/excluir', 'UsuarioController@destroy')->name('destroy');
        Route::get('/{id}', 'UsuarioController@show')->name('show');
    });

    Route::group(['prefix' => 'campus', 'as' => 'campus.'], function(){
        Route::get('/', 'CampusController@index')->name('index');
        Route::get('/cadastrar', 'CampusController@create')->name('create');
        Route::post('/cadastrar', 'CampusController@store')->name('store');
        Route::get('/{id}/alterar', 'CampusController@edit')->name('edit');
        Route::post('/{id}/alterar', 'CampusController@update')->name('update');
        Route::get('/{id}/excluir', 'CampusController@destroy')->name('destroy');
        Route::get('/{id}', 'CampusController@show')->name('show');
    });

    Route::group(['prefix' => 'coordenacao', 'as' => 'coordenacao.'], function(){
        Route::get('/', 'CoordenacaoController@index')->name('index');
        Route::get('/cadastrar', 'CoordenacaoController@create')->name('create');
        Route::post('/cadastrar', 'CoordenacaoController@store')->name('store');
        Route::get('/{id}/alterar', 'CoordenacaoController@edit')->name('edit');
        Route::post('/{id}/alterar', 'CoordenacaoController@update')->name('update');
        Route::get('/{id}/excluir', 'CoordenacaoController@destroy')->name('destroy');
        Route::get('/{id}', 'CoordenacaoController@show')->name('show');
    });

    Route::group(['prefix' => 'disciplina', 'as' => 'disciplina.'], function(){
        Route::get('/', 'DisciplinaController@index')->name('index');
        Route::get('/cadastrar', 'DisciplinaController@create')->name('create');
        Route::post('/cadastrar', 'DisciplinaController@store')->name('store');
        Route::get('/{id}/alterar', 'DisciplinaController@edit')->name('edit');
        Route::post('/{id}/alterar', 'DisciplinaController@update')->name('update');
        Route::get('/{id}/excluir', 'DisciplinaController@destroy')->name('destroy');
        Route::get('/{id}', 'DisciplinaController@show')->name('show');
    });

    Route::group(['prefix' => 'projeto', 'as' => 'projeto.'], function(){
        Route::get('/', 'ProjetoController@index')->name('index');
        Route::get('/cadastrar', 'ProjetoController@create')->name('create');
        Route::post('/cadastrar', 'ProjetoController@store')->name('store');
        Route::get('/{id}/alterar', 'ProjetoController@edit')->name('edit');
        Route::post('/{id}/alterar', 'ProjetoController@update')->name('update');
        Route::get('/{id}/excluir', 'ProjetoController@destroy')->name('destroy');
        Route::get('/{id}', 'ProjetoController@show')->name('show');
    });

    Route::group(['prefix' => 'requerimento', 'as' => 'requerimento.'], function(){
        Route::get('/', 'RequerimentoController@index')->name('index');
        Route::get('/cadastrar', 'RequerimentoController@create')->name('create');
        Route::post('/cadastrar', 'RequerimentoController@store')->name('store');
        Route::get('/{id}/alterar', 'RequerimentoController@edit')->name('edit');
        Route::post('/{id}/alterar', 'RequerimentoController@update')->name('update');
        Route::get('/{id}/excluir', 'RequerimentoController@destroy')->name('destroy');
        Route::get('/{id}', 'RequerimentoController@show')->name('show');
    });

});
