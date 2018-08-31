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


Route::get('admin/posts' , 'Admin\PostController@index');
Route::post('admin/posts' , 'Admin\PostController@store');
Route::get('admin/posts/create' , 'Admin\PostController@create');
Route::get('admin/posts/{id}/edit' , 'Admin\PostController@edit');
Route::put('admin/posts/{id}/update' , 'Admin\PostController@update');
Route::get('admin/posts/{id}/delete' , 'Admin\PostController@delete');






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



