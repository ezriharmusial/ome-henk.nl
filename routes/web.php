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
Route::post('/pagina', 'PagesController@store')->name('pages.store');
Route::get('/pagina/aanmaken', 'PagesController@create')->name('pages.create');
Route::get('/', 'PagesController@show')->name('home');
Route::get('/{page}', 'PagesController@show')->name('pages.show');
Route::get('/{page}/bewerken', 'PagesController@edit')->name('pages.edit');
Route::match(['put', 'patch'], '/{page}', 'PagesController@update')->name('pages.update');
Route::post('/{page}/verwijderen', 'PagesController@destroy')->name('pages.destroy');

// Pagina Artikeltjes
Route::post('/{page}/artikel', 'PostsController@store')->name('posts.store');
Route::get('/{page}/artikel/aanmaken', 'PostsController@create')->name('posts.create');
Route::get('/{page}/{post}', 'PostsController@show')->name('posts.show');
Route::get('/{page}/{post}/bewerken', 'PostsController@edit')->name('posts.edit');
Route::match(['put', 'patch'], '/{page}/{post}', 'PostsController@update')->name('posts.update');
Route::post('/{page}/{post}/verwijderen', 'PostsController@destroy')->name('posts.destroy');
// Route::resource('posts', 'PostsController');

// Artikel Commentaar
Route::post('/{page}/{post}/reacties', 'CommentsController@store')->name('storeComment');
