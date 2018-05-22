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

/*VISTA FIRSTPAGE*/
Route::get('/user/perfil', 'PersonaController@show')->name('user.perfil');

/**/

Route::get('/persona/personajson', 'PersonaController@persona_json')->name('persona.persona_json');

Route::get('/edit/perfil', 'PersonaController@showperfil')->name('edit.perfil');
Route::post('/perfil/update/{id}', 'PersonaController@updateperfil')->name('perfil.update');

/*ME GUSTA*/
Route::get('/persona/setmg', 'PersonaController@setMg')->name('persona.setMg');
Route::get('/persona/setvista', 'PersonaController@setVista')->name('persona.setVista');

/*CHATS*/
Route::get('/chat', 'MensajesController@mostrarColumnaChats');
Route::get('/mostrarChat', 'MensajesController@mostrarColumnaChats');
Route::get('/chatUser/{id}', 'MensajesController@mostrarChatCorrespondiente')->name('user.chat');
Route::get('/sendChat', 'MensajesController@sendChat')->name('send.chat');

/*EDITAR IMAGEN PERFIL-PORTADA*/
Route::post('/update/img-perfil/{idPersona}', 'PersonaController@update_img')->name('update.image.perfil');
Route::post('/update/img-portada/{idPersona}', 'PersonaController@update_portada')->name('update.image.portada');
/*VER INFO*/
Route::get('/user/info/{idPersona}', 'PersonaController@info')->name('user.info');
/*VER GALERIA*/
Route::get('/user/galeria/{idPersona}', 'MensajesController@userGaleria')->name('user.galeria');
/*InsertGaleria*/
Route::post('/insert/galeria/{idPersona}', 'MensajesController@insertGaleria')->name('insert.galeria');

/*BORRAR FOTO GALERIA*/
Route::get('/delete/galeria/{idGaleria}/{idPersona}', 'MensajesController@deleteGaleria')->name('delete.galeria');
/* Iungos*/
Route::get('/iungos', 'PersonaController@iungos');


//WEB SERVICE PERSONES

Route::get('persona/persones', 'PersonaController@getpersones')->name('persona.persones');
Route::get('persona/persona/{id}', 'PersonaController@getpersona')->name('persona.persona');

Route::post('persona/persona', 'PersonaController@setpersona')->name('persona.setpersona');

Route::put('persona/persona/{id}', 'PersonaController@updatepersona')->name('persona.updatepersona');

Route::delete('persona/persona/{id}', 'PersonaController@deletepersona')->name('persona.deletepersona');