<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

# Website Routes
Auth::routes();
Route::redirect('/home', '/');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/parties', 'PartyController@index')->name('party');


# Admin Authantication Routes
Route::group(['namespace'=> 'Admin', 'prefix'=> 'admin', 'as'=> 'admin.'], function(){
    Route::group(['namespace'=>'Auth'], function() {
        Route::get('/login', 'AdminLoginController@showLoginForm')->name('login');
        Route::post('/login', 'AdminLoginController@login');
    });
    
    Route::group(['middleware'=> 'auth:admin'], function() {
        
        # Dashboard Route
        Route::get('/', 'DashboardController@index')->name('index');

        # Users Routes
        Route::group(['namespace'=>'User', 'prefix'=>'user', 'as'=>'users.'], function() {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('{user}/edit', 'UserController@edit')->name('edit');
            Route::post('{user}/edit', 'UserController@update');
        });

        # Categories Routes
        Route::group(['namespace'=>'Category', 'prefix'=>'category', 'as'=>'categories.'], function() {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('{category}/show', 'CategoryController@show')->name('show');
            Route::get('{category}/edit', 'CategoryController@edit')->name('edit');
            Route::post('{category}/edit', 'CategoryController@update');
            Route::get('{category}/delete', 'CategoryController@destroy')->name('destroy');
            Route::get('create', 'CategoryController@create')->name('create');
            Route::post('create', 'CategoryController@store');
        });

        # Products Routes
        Route::group(['namespace'=>'Product', 'prefix'=>'product', 'as'=>'products.'], function() {
            Route::get('/', 'ProductController@index')->name('index');
            Route::get('{product}/show', 'ProductController@show')->name('show');
            Route::get('{product}/edit', 'ProductController@edit')->name('edit');
            Route::post('{product}/edit', 'ProductController@update');
            Route::get('{product}/delete', 'ProductController@destroy')->name('destroy');
            Route::get('create', 'ProductController@create')->name('create');
            Route::post('create', 'ProductController@store');
        });

        # Orders Routes
        Route::group(['namespace'=>'Order', 'prefix'=>'order', 'as'=>'orders.'], function() {
            Route::get('/', 'OrderController@index')->name('index');
            Route::get('{order}/show', 'OrderController@show')->name('show');
            Route::get('{order}/edit', 'OrderController@edit')->name('edit');
            Route::post('{order}/edit', 'OrderController@update');
        });

         # Parties Routes
         Route::group(['namespace'=>'Party', 'prefix'=>'parties', 'as'=>'parties.'], function() {
            Route::get('/', 'PartyController@index')->name('index');
            Route::get('{party}/show', 'PartyController@show')->name('show');
            Route::get('{party}/edit', 'PartyController@edit')->name('edit');
            Route::post('{party}/edit', 'PartyController@update');
            Route::get('{party}/delete', 'PartyController@destroy')->name('destroy');
            Route::get('create', 'PartyController@create')->name('create');
            Route::post('create', 'PartyController@store');
        });

        # Team Routes
        Route::group(['namespace'=>'Team', 'prefix'=>'team', 'as'=>'team.'], function() {
            Route::get('/', 'TeamController@index')->name('index');
            Route::get('{employee}/show', 'TeamController@show')->name('show');
            Route::get('{employee}/edit', 'TeamController@edit')->name('edit');
            Route::post('{employee}/edit', 'TeamController@update');
            Route::get('create', 'TeamController@create')->name('create');
            Route::post('create', 'TeamController@store');
            Route::get('{employee}/destroy', 'TeamController@destroy')->name('delete');

        });

        # Settings Routes
        Route::group(['namespace'=>'Setting', 'prefix'=>'setting', 'as'=>'setting.'], function() {
            Route::get('/', 'SettingController@index')->name('index');
            Route::get('/{setting}/edit/{type}', 'SettingController@edit')->name('edit');
            Route::post('/{setting}/edit/{type}', 'SettingController@update');
        });

    });

    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('logout');
});