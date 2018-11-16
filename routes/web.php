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


Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::post('/register', 'Auth\RegisterController@create')->name('register');

Route::group(['prefix' => 'users'], function() {
    Route::get('/see', 'UserController@see')->name('users_see');
    Route::get('/index/{users}', 'UserController@index')->name('users_index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::group(['prefix' => 'admin'], function() {
    Route::post('/store', 'AdminController@store')->name('store');
});
