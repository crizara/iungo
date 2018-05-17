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


Route::get('/', 'indexController@index');




Route::get('/formularioconfig', 'ConfigController@index');
Route::get('/Personas', 'HomeController@listarPersonas');
Route::get('/userList', 'PersonaController@listarUserPersonas');
Auth::routes();
Route::get('/Personas', 'HomeController@listarPersonas');

Route::get('/home', function () {
    return view('first_page');
});
Route::get('/firstpage', function () {
    return view('first_page');
});

Route::get('/config', function () {
    return view('config_page');
});
Route::get('formularioconfig', 'ConfigController@index');
Route::post('storage', 'ConfigController@save');
Route::get('/eliminarUser/{id}', ['as' => 'delete', 'uses' => 'PersonaController@eliminarUser']);
Route::get('/user/edit/{id}', 'PersonaController@edit')->name('users.edit');
Route::post('/user/update/{id}', 'PersonaController@update')->name('users.update');
Route::get('/persona/fotoperfil', 'PersonaController@getFotoPerfil')->name('persona.fotoperfil');
Route::get('/persona/getids', 'PersonaController@getIds')->name('persona.getids');

Route::get('/user/perfil', 'PersonaController@show')->name('user.perfil');
Route::get('/persona/personesjson', 'PersonaController@persones_json')->name('persona.persones_json');

Route::get('/edit/perfil', 'PersonaController@showperfil')->name('edit.perfil');
Route::post('/perfil/update/{id}', 'PersonaController@updateperfil')->name('perfil.update');

/*ME GUSTA*/
Route::get('/persona/setmg', 'PersonaController@setMg')->name('persona.setMg');

/*CHATS*/
Route::get('/chat', 'MensajesController@mostrarColumnaChats');
Route::get('/mostrarChat', 'MensajesController@mostrarColumnaChats');
Route::get('/chatUser/{id}', 'MensajesController@mostrarChatCorrespondiente')->name('user.chat');
Route::get('/sendChat', 'MensajesController@sendChat')->name('send.chat');