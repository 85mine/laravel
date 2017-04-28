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
Route::group(['middleware' => 'guest'], function () {
    // Login
    Route::get('/login', 'UserController@getLogin')->name('user.getLogin');
    Route::post('/login', 'UserController@postLogin')->name('user.postLogin');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@dashboard')->name('dashboard');
    Route::get('/logout', 'UserController@getLogout')->name('user.getLogout');

    // Report
    Route::group(['prefix' => 'report'], function () {
        Route::get('/', 'ReportController@index')->name('report.index');
    });

    // Choosing project
    Route::group(['prefix' => 'project-choosing'], function () {
        Route::get('/', 'ProjectController@getChosingProject')->name('project.chosingProject');
        Route::get('/edit/{id}', 'ProjectController@edit')->name('project.edit');
    });

    // List project
    Route::group(['prefix' => 'project-list'], function () {
        Route::get('/', 'ProjectController@projectList')->name('project.projectList');
        Route::get('/view/{id}', 'ProjectController@getProjectView')->name('project.view');
        Route::get('/detail/{id}', 'ProjectController@detailChosing')->name('project.detailChosing');
    });

    // Menu project
    Route::group(['prefix' => 'project-menu'], function () {
        Route::get('/', 'ProjectController@getMenu')->name('project.getMenu');
        Route::get('/create','ProjectController@getCreateProject')->name('project.create');
    });

    // Admin
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'AdminController@admin')->name('admin.home');
        Route::get('/create-account', 'AdminController@createAccount')->name('admin.createAccount');
        Route::get('/edit-account', 'AdminController@editAccount')->name('admin.editAccount');
        Route::get('/create-base', 'AdminController@createBase')->name('admin.createBase');
    });

    // have not page
    Route::get('/delete', 'ProjectController@deleteProject')->name('admin.deleteProject');

    Route::post('/send-mail', 'ProjectController@sendMail')->name('sendMail');
});
