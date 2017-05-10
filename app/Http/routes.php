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
        Route::pattern('id', '[0-9]+');
        // Check user confirm email
        Route::group(['middleware' => 'user.status:' . ROUTER_USER], function () {
            Route::get('/', 'UserController@getDashboard')->name('admin.dashboard');
            // IPs
            Route::get('/ips', 'IpController@index')->name('ips.index');

            // QR code
            Route::get('/qr', 'QrController@getList')->name('admin.qr.getList');
            Route::get('/qr/create', 'QrController@getCreate')->name('admin.qr.getCreate');
            Route::post('/qr/create', 'QrController@postCreate')->name('admin.qr.postCreate');
            Route::get('/qr/edit/{id?}', 'QrController@getEdit')->name('admin.qr.getEdit');
            Route::get('/qr/edit/{id?}', 'QrController@getEdit')->name('admin.qr.postEdit');

            // Question management
            Route::get('/question', 'QuestionController@index')->name('question.index');
            Route::get('/question/add', 'QuestionController@add')->name('question.add');
            Route::post('/question/add', 'QuestionController@add')->name('question.add');
        });
        // Confirm email
        Route::get('/confirm-email', 'UserController@getConfirmEmail')->name('user.getConfirmEmail');
        Route::post('/confirm-email', 'UserController@postConfirmEmail')->name('user.postConfirmEmail');
        // Active email
        Route::get('/active-email', 'UserController@getActiveEmail')->name('user.getActiveEmail');

        // Company management
        Route::get('/companies', 'CompanyController@getAllCompanies')->name('company.getAllCompanies');
        Route::get('/company/new', 'CompanyController@getAddNewCompany')->name('company.addNew');
        Route::post('/company/new', 'CompanyController@postAddNewCompany')->name('company.postNew');
        Route::get('/company/{id}/detail', 'CompanyController@getCompany')->name('company.detail');
        Route::get('/company/{id}/edit', 'CompanyController@editCompany')->name('company.edit');
        Route::post('/company/delete', 'CompanyController@deleteCompany')->name('company.delete');

        Route::group(['middleware' => 'user.status:' . ROUTER_CONFIRM_EMAIL], function () {
            Route::get('/confirm-email', 'UserController@getConfirmEmail')->name('user.getConfirmEmail');
            Route::post('/confirm-email', 'UserController@postConfirmEmail')->name('user.postConfirmEmail');
        });
    });
});
