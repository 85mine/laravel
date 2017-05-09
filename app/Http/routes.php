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
    // Active email
    Route::group(['middleware' => 'user.status:' . ROUTER_ACTIVE_EMAIL], function () {
        Route::get('/active-email', 'UserController@getActiveEmail')->name('user.getActiveEmail');
    });
    // Guest
    Route::group(['middleware' => 'guest'], function () {
        // Login
        Route::get('/login', 'UserController@getLogin')->name('user.getLogin');
        Route::post('/login', 'UserController@postLogin')->name('user.postLogin');
    });

    // Admin
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        // Check user confirm email
        Route::group(['middleware' => 'user.status:' . ROUTER_USER], function () {
            Route::get('/', 'UserController@getDashboard')->name('admin.dashboard');

        });
        // Confirm email
        Route::group(['middleware' => 'user.status:' . ROUTER_CONFIRM_EMAIL], function () {
            Route::get('/confirm-email', 'UserController@getConfirmEmail')->name('user.getConfirmEmail');
            Route::post('/confirm-email', 'UserController@postConfirmEmail')->name('user.postConfirmEmail');
        });
    });
});
