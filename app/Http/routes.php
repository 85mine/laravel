<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'ip'], function () {

    Route::get('/', 'UserController@getIndex')->name('user.getIndex');

    // Login
    Route::get('/login', 'UserController@getLogin')->name('user.getLogin');
    Route::post('/login', 'UserController@postLogin')->name('user.postLogin');

    // Admin
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::group(['middleware' => 'user.status'], function () {
            Route::get('/', 'UserController@getDashboard')->name('admin.dashboard');
        });

        // Confirm email
        Route::get('/active-email', 'UserController@getActiveEmail')->name('user.getActiveEmail');
        Route::post('/active-email', 'UserController@postActiveEmail')->name('user.postActiveEmail');
    });
});
