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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::resource('/','BookController');

Route::resource('books','BookController');

Route::resource('autores','AutorController');

Route::post('home/removelido/{id}', 'HomeController@removelido');

Route::post('home/removewish/{id}', 'HomeController@removewish');

Route::get('home/lido/{id}', 'HomeController@lido');

Route::get('home/wish/{id}', 'HomeController@wish');

Route::resource('home', 'HomeController');

Auth::routes();