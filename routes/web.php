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
    return view('land');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/main', 'mainControl@main')->name('main');

Route::get('/land', 'mainControl@land')->name('land');

Route::get('/profile', 'mainControl@profile')->name('profile');

Route::get('/settings', 'mainControl@settings')->name('settings');

