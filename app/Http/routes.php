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
    Route::get('/project/list', 'ProjectController@projectList')->name('project.projectList');
});
