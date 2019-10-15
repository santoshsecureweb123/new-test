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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/post_insert', 'HomeController@post_insert');
Route::get('/posts', 'HomeController@show_post');
Route::get('/edit/{id}', 'HomeController@edit_post');
Route::post('/update_post/{id}', 'HomeController@update_post');


