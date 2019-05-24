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
Route::post('/follow', 'UserController@follow')->name('follow')->middleware('auth');
Route::post('/unfollow', 'UserController@unfollow')->name('unfollow')->middleware('auth');


Route::get('/schema/{id}', 'SchemaController@show')->name('schema');
Route::get('/cschema', 'SchemaController@create')->name('cschema')->middleware('auth');
Route::post('/cschema', 'SchemaController@store');
Route::get('/mschema/{id}', 'SchemaController@edit')->name('mschema')->middleware('auth');
Route::post('/mschema/{id}', 'SchemaController@update');
Route::get('/dschema/{id}', 'SchemaController@destroy')->name('dschema')->middleware('auth');



Route::post('/likeDesign', 'SchemaController@likeDesign')->name('likeDesign')->middleware('auth');
Route::post('/dislikeDesign', 'SchemaController@dislikeDesign')->name('dislikeDesign')->middleware('auth');
Route::post('/reportDesign','SchemaController@reportDesign')->name('reportDesign')->middleware('auth');


Route::post('/comment', 'SchemaController@comment')->name('comment')->middleware('auth');
Route::post('/likeComment', 'SchemaController@likeComment')->name('likeComment')->middleware('auth');
Route::post('/deleteComment', 'SchemaController@deleteComment')->name('deleteComment')->middleware('auth');
Route::post('/getComment', 'SchemaController@getComment')->name('getComment');



Route::post('/search', 'mainControl@search')->name('search');

Route::get('/admin', 'mainControl@admin')->name('admin')->middleware('auth');
Route::post('/getReports', 'mainControl@getReports')->name('getReports')->middleware('auth');

Route::get('/register', 'UserController@create')->name('register')->middleware('guest');
Route::post('/register', 'UserController@store');


Route::get('/login', 'Auth\LoginController@showlogin')->name('login')->middleware('guest');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::resource('users', 'UserController');