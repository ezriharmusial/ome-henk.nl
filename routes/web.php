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
// Gebruikerspaginas
Auth::routes();

// Dashboard?
Route::get('/home', 'HomeController@index');

// Paginas
Route::get('/', 'PagesController@show')->name('home');
Route::post('/pagina', 'PagesController@store')->name('storePage');
Route::get('/pagina/aanmaken', 'PagesController@create')->name('createPage');
Route::get('/{page}/bewerken', 'PagesController@update')->name('updatePage');
Route::get('/{page}', 'PagesController@show');

// Pagina Artikeltjes
Route::post('/{page}/artikel', 'PostsController@store')->name('storePost');
Route::get('/{page}/artikel/aanmaken', 'PostsController@create')->name('createPost');
Route::get('/{page}/{post}/', 'PostsController@show');

// Artikel Commentaar
Route::post('/{page}/{post}/reacties', 'CommentsController@store')->name('storeComment');


