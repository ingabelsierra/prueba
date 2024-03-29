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
    return view('login.index');
});

//Route::get('post','DataController@postRequest');
//Route::get('get','DataController@getRequest');

Route::resource('login','LoginController');
//Route::get('logeed','MenuController@logged');
//Route::post('logear','LoginController@logear');
Route::resource('clientes','ClienteController');
Route::resource('menu','MenuController');
Route::resource('productos','ProductoController');
Route::resource('categorias','CategoriaController');
Route::resource('pedidos','PedidoController');
