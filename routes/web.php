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

Route::view('/privacy', 'static.privacy')->name('privacy-statement');
// Plaatjes
Route::get('/media','MediaController@create')->name('media.create');
Route::post('/media','MediaController@store')->name('media.store');
Route::delete('/media/{id}/verwijderen','MediaController@destroy')->name('media.destroy');

// Dashboard?
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'PagesController@index');

// Paginas
Route::get('/', 'PagesController@index')->name('pages.index');
Route::post('/pagina', 'PagesController@store')->name('pages.store');
Route::get('/pagina/aanmaken', 'PagesController@create')->name('pages.create');
Route::get('/{page}/bewerken', 'PagesController@edit')->name('pages.edit');
Route::delete('/{page}/verwijderen/', 'PagesController@destroy')->name('pages.destroy');
Route::get('/{page}', 'PagesController@show')->name('pages.show');
Route::match(['put', 'patch'], '/{page}', 'PagesController@update')->name('pages.update');

// Pagina Artikeltjes
Route::post('/{page}/artikel', 'PostsController@store')->name('posts.store');
Route::get('/{page}/artikel/aanmaken', 'PostsController@create')->name('posts.create');
Route::get('/{page}/{post}/bewerken', 'PostsController@edit')->name('posts.edit');
// Route::get('/{page}/{post}/bewerken', function($pageslug, $postslug){
//     dd($pageslug, $postslug);
// })->name('posts.edit');
Route::get('/{page}/{post}', 'PostsController@show')->name('posts.show');
Route::match(['put', 'patch'], '/{page}/{post}', 'PostsController@update')->name('posts.update');
Route::delete('/{page}/{post}/verwijderen', 'PostsController@destroy')->name('posts.destroy');
// Route::resource('posts', 'PostsController');

// Artikel Commentaar
Route::post('/{page}/{post}/reacties', 'CommentsController@store')->name('storeComment');

