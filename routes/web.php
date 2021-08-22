<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();


//home de la app
Route::get('/', 'InicioController@index')->name('inicio.index');


/* rutas recetas */
Route::get('/recetas', 'RecetaController@index')->name('recetas.index');
Route::get('/recetas/create', 'RecetaController@create')->name('recetas.create');
Route::post('/recetas', 'RecetaController@store')->name('recetas.store');
Route::get('/recetas/{receta}', 'RecetaController@show')->name('recetas.show');
Route::get('/recetas/{receta}/edit', 'RecetaController@edit')->name('recetas.edit');
Route::put('/recetas/{receta}', 'RecetaController@update')->name('recetas.update');
Route::delete('/recetas/{receta}', 'RecetaController@destroy')->name('recetas.destroy');



/* rutas de perfiles de usuarios */
Route::get('/perfiles/{perfil}', 'PerfilController@show')->name('perfiles.show');
Route::get('/perfiles/{perfil}/edit', 'PerfilController@edit')->name('perfiles.edit');
Route::put('/perfiles/{perfil}', 'PerfilController@update')->name('perfiles.update');



/* almacernar los likes de las recetas */
Route::post('/recetas/{receta}', 'LikesController@update')->name('likes.update');



/* obtiene categoria */
Route::get('/categotia/{categoriaReceta}', 'CategoriasController@show')->name('categorias.show');



//buscador de recetas
Route::get('/buscar', 'RecetaController@search')->name('buscar.show');


//generando pdf
Route::get('/recetas-pdf/{receta}', 'PdfController@index')->name('pdfs.index');


/* comentarios de recetas */
Route::post('/comment', 'CommentController@store')->name('comment.store');
Route::get('/comment/{user}', 'CommentController@getPerfil')->name('comment.getPerfil');
Route::delete('/comment/{comment}', 'CommentController@destroy')->name('comment.destroy');


//obtener usuario
Route::get('/user-comentario/{user}', 'CommentController@show')->name('comentario.show');
