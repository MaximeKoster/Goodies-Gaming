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
    Route::post('/deleted', 'AdminController@delete_id')->name('delete_id');
    Route::post('/storecat', 'AdminController@store_category')->name('storecat');
    Route::post('/updated', 'AdminController@update_id')->name('update_id');

});

Route::get('/cart/{user_id}', 'CartController@display_cart')->name('display_cart');

Route::post('/catalogue', 'CartController@create_cart')->name('create_cart');

Route::get('/catalogue', 'CatalogueController@display')->name('catalogue');

Route::get('/produit/{id}', 'ProduitController@display')->name('produit');

Route::get('/home', 'CatalogueController@display')->name('home');

Route::get('/', 'CatalogueController@display')->name('home');

