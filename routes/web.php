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

Route::get('/', 'mainControl@land');

Auth::routes();

Route::get('/main', 'SchemaController@index')->name('main');

Route::get('/land', 'mainControl@land')->name('land')->middleware('guest');

Route::get('/profile/{id}', 'UserController@show')->name('profile');
Route::get('/settings', 'UserController@edit')->name('settings')->middleware('auth');
Route::put('/settings', 'UserController@update');


Route::get('/schema/{id}', 'SchemaController@show')->name('schema');
Route::get('/cschema', 'SchemaController@create')->name('cschema')->middleware('auth');
Route::post('/cschema', 'SchemaController@store');
Route::get('/mschema/{id}', 'SchemaController@mschema')->name('mschema')->middleware('auth');

Route::get('/search', 'mainControl@search')->name('search');

Route::get('/admin', 'mainControl@admin')->name('admin');

Route::get('/register', 'UserController@create')->name('register')->middleware('guest');
Route::post('/register', 'UserController@store');


Route::get('/login', 'Auth\LoginController@showlogin')->name('login')->middleware('guest');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::resource('users', 'UserController');