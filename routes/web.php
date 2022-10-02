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

// Route::get('/', 'WorkController@user');


// Route::get('/works', 'WorkController@index');

// Route::get('/works/create', 'WorkController@create');

// Route::get('/works/{work}', 'WorkController@show');

// Route::post('/works', 'WorkController@store');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'WorkController@user');
    Route::get('/works', 'WorkController@index');
    Route::get('/works/create', 'WorkController@create');
    
    Route::get('/works/{work}/edit', 'WorkController@edit');
    Route::get('/works/{work}/chat', 'WorkController@chat');
    Route::put('/works/{work}', 'WorkController@update');
    
    Route::get('/works/{work}', 'WorkController@show');
    Route::post('/works', 'WorkController@store');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/bookmark_register', 'WorkController@bookmark_register');
    Route::post('/bookmark_delete', 'WorkController@bookmark_delete');
    Route::post('/works/{work}/upload', 'WorkController@upload');
    Route::post('/works/{work}/chat', 'WorkController@chat_save');
    
    
    
});
