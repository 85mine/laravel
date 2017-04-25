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

// Login
Route::get('/login', 'UserController@getLogin')->name('user.getLogin');
Route::post('/login', 'UserController@postLogin')->name('user.postLogin');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@dashboard')->name('dashboard');
    Route::get('/logout', 'UserController@getLogout')->name('user.getLogout');

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'ProjectController@admin')->name('admin.home');
        Route::get('/create-account', 'ProjectController@createAccount')->name('admin.createAccount');
        Route::get('/edit-account', 'ProjectController@editAccount')->name('admin.editAccount');
        Route::get('/create-base', 'ProjectController@createBase')->name('admin.createBase');
    });

    Route::group(['prefix' => 'project'], function () {
        Route::get('/list', 'ProjectController@projectList')->name('project.projectList');
        Route::get('/delete', 'ProjectController@deleteProject')->name('admin.deleteProject');
        Route::get('/menu', 'ProjectController@getMenu')->name('project.getMenu');
        Route::get('/chosing-project', 'ProjectController@getChosingProject')->name('project.chosingProject');
    });
});
