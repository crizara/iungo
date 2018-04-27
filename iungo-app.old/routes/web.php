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
    return view('index');
});
Route::get('/Personas', 'HomeController@listarPersonas');
Auth::routes();

Route::get('/Personas', 'HomeController@listarPersonas');

Route::get('/', function () {
    return view('index');
});


Route::get('/firstpage', function () {
    return view('first_page');
});
