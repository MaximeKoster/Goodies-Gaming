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

Route::post('/register', 'Auth\RegisterController@create')->name('register');

Route::group(['prefix' => 'users'], function() {
    Route::get('/see', 'UserController@see')->name('users_see');
    Route::get('/index/{users}', 'UserController@index')->name('users_index');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::group(['prefix' => 'admin'], function() {
    Route::post('/store', 'AdminController@store')->name('store');
    Route::post('/deleted', 'AdminController@delete_id')->name('delete_id');
    Route::post('/storecat', 'AdminController@store_category')->name('storecat');
    Route::post('/updated', 'AdminController@update_id')->name('update_id');
    Route::post('/refreshedusers', 'AdminController@show_users')->name('show_users');
    Route::POST('/bigcommand', 'AdminController@big_command')->name('big_command');
    Route::post('/commands', 'AdminController@commands')->name('commands');

});


Route::get('/cart', 'CartController@display_cart')->name('cart');

Route::group(['prefix' => 'cart'], function() {
    Route::post('/updated', 'CartController@update_quantity')->name('update_quantity');
    Route::post('/deleted', 'CartController@delete_cart')->name('delete_cart');
    Route::get('/sent', function () {
        return new \App\Mail\ShopOrder();
    })->name('sendmail');
    Route::get('/sent', 'CatalogueController@display_mail')->name('cartsent');
    Route::get('/testsend', 'CartController@send_mail')->name('testsend');

});

Route::get('/profile', 'MyProfileController@index')->name('myprofile');
Route::post('/cart', 'CartController@create_cart')->name('create_cart');


Route::get('/catalogue', 'CatalogueController@display')->name('catalogue');


Route::get('/produit/{id}', 'ProduitController@display')->name('produit');

Route::get('/home', 'CatalogueController@display')->name('home');

Route::get('/', 'CatalogueController@display')->name('home');
Route::get('/cart', 'CatalogueController@display_cart')->name('cart');



