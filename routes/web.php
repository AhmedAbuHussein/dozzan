<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::redirect('/home', '/');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/parties', 'PartyController@index')->name('party');


Route::group(['namespace'=> 'Admin', 'prefix'=> 'admin', 'as'=> 'admin.'], function(){
    Route::group(['namespace'=>'Auth'], function() {
        Route::get('/login', 'AdminLoginController@showLoginForm')->name('login');
        Route::post('/login', 'AdminLoginController@login');
    });
    
    Route::group(['middleware'=> 'auth:admin'], function() {
        Route::get('/', 'DashboardController@index')->name('index');

        Route::group(['namespace'=>'User', 'prefix'=>'user', 'as'=>'users.'], function() {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('{user}/edit', 'UserController@edit')->name('edit');
            Route::post('{user}/edit', 'UserController@update');

        });

        Route::group(['namespace'=>'Product', 'prefix'=>'product', 'as'=>'products.'], function() {
            Route::get('/', 'ProductController@index')->name('index');
            Route::get('{product}/show', 'ProductController@show')->name('show');
            Route::get('{product}/edit', 'ProductController@edit')->name('edit');
            Route::post('{product}/edit', 'ProductController@update');

            Route::get('{product}/delete', 'ProductController@destroy')->name('destroy');
            Route::get('create', 'ProductController@create')->name('create');
        });


        Route::group(['namespace'=>'Category', 'prefix'=>'category', 'as'=>'categories.'], function() {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('{category}/show', 'CategoryController@show')->name('show');
            Route::get('{category}/edit', 'CategoryController@edit')->name('edit');
            Route::post('{category}/edit', 'CategoryController@update');

            Route::get('{category}/delete', 'CategoryController@destroy')->name('destroy');
            Route::get('create', 'CategoryController@create')->name('create');
        });

        Route::group(['namespace'=>'Order', 'prefix'=>'order', 'as'=>'orders.'], function() {
            Route::get('/', 'OrderController@index')->name('index');
        });

    });

    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('logout');
});