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

Route::get('/', function () {
    $lista = App\Artigo::listaArtigosSite(10);
    return view('site',compact('lista'));
});

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/artigos/{id}/{titulo}', function(){
    
});

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function(){

    Route::resource('artigos', 'ArtigosController');
    Route::resource('usuarios', 'UsuariosController');
    Route::resource('autores', 'AutoresController');
});
