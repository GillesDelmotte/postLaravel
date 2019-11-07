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

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create')->middleware('auth');
Route::delete('/posts/{post}', 'PostController@destroy')->middleware(['auth', 'can:forceDelete,post']);
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/edit', 'PostController@edit')->middleware(['auth', 'can:update,post']);
Route::post('/posts', 'PostController@store')->middleware('auth');
Route::put('/posts/{post}', 'PostController@update')->middleware('auth');
Route::get('/author/{user}/posts', 'AuthorPostController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
