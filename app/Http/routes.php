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

        // Logout
        Route::get('/logout', 'UserController@getLogout')->name('user.getLogout');

        Route::pattern('id', '[0-9]+');
        // Check user confirm email
        Route::group(['middleware' => 'user.status:' . ROUTER_USER], function () {

            Route::get('/', 'UserController@getDashboard')->name('admin.dashboard');

            // IP Management
            Route::get('/ip/index', 'IpController@getIndex')->name('ip.get.index');
            Route::get('/ip/add', 'IpController@getAdd')->name('ip.get.add');
            Route::post('/ip/add', 'IpController@postAdd')->name('ip.post.add');
            Route::post('/ip/delete', 'IpController@postDelete')->name('ip.post.delete');
            Route::get('/ip/edit/{id?}', 'IpController@getEdit')->name('ip.get.edit');
            Route::post('/ip/edit/{id?}', 'IpController@postEdit')->name('ip.post.edit');
            Route::get('/ip/getAjaxData', 'IpController@getAjaxData')->name('ip.get.ajax.data');

            // QR code
            Route::get('/qr', 'QrController@getList')->name('admin.qr.getList');
            Route::get('/qr/create', 'QrController@getCreate')->name('admin.qr.getCreate');
            Route::post('/qr/create', 'QrController@postCreate')->name('admin.qr.postCreate');
            Route::get('/qr/edit/{id?}', 'QrController@getEdit')->name('admin.qr.getEdit');

            // Company
            Route::get('/companies', 'CompanyController@index')->name('company.index');
            Route::get('/companies/ajaxData', 'CompanyController@getAjaxData')->name('company.ajaxData');
            Route::get('/company/add', 'CompanyController@getAdd')->name('company.getAdd');
            Route::post('/company/add', 'CompanyController@postAdd')->name('company.postAdd');
            Route::get('/company/edit/{id?}', 'CompanyController@getEdit')->name('company.getEdit');
            Route::post('/company/edit', 'CompanyController@postEdit')->name('company.postEdit');
            Route::post('/company/delete', 'CompanyController@delete')->name('company.delete');
            
            //Question Management
            Route::get('/question/index', 'QuestionController@getIndex')->name('question.get.index');
            Route::get('/question/add', 'QuestionController@getAdd')->name('question.get.add');
            Route::post('/question/add', 'QuestionController@postAdd')->name('question.post.add');
            Route::post('/question/delete', 'QuestionController@postDelete')->name('question.post.delete');
            Route::get('/question/edit/{id?}', 'QuestionController@getEdit')->name('question.get.edit');
            Route::post('/question/edit/{id?}', 'QuestionController@postEdit')->name('question.post.edit');
            Route::get('/question/getAjaxData', 'QuestionController@getAjaxData')->name('question.get.ajax.data');

            //Customer Management
            Route::get('/customer/index', 'CustomerController@getIndex')->name('customer.get.index');
            Route::get('/customer/add', 'CustomerController@getAdd')->name('customer.get.add');
            Route::post('/customer/add', 'CustomerController@postAdd')->name('customer.post.add');
            Route::post('/customer/delete', 'CustomerController@postDelete')->name('customer.post.delete');
            Route::get('/customer/edit/{id?}', 'CustomerController@getEdit')->name('customer.get.edit');
            Route::post('/customer/edit/{id?}', 'CustomerController@postEdit')->name('customer.post.edit');
            Route::get('/customer/getAjaxData', 'CustomerController@getAjaxData')->name('customer.get.ajax.data');

        });
        // Confirm email
        Route::get('/confirm-email', 'UserController@getConfirmEmail')->name('user.getConfirmEmail');
        Route::post('/confirm-email', 'UserController@postConfirmEmail')->name('user.postConfirmEmail');
        // Active email
        Route::get('/active-email', 'UserController@getActiveEmail')->name('user.getActiveEmail');

        Route::group(['middleware' => 'user.status:' . ROUTER_CONFIRM_EMAIL], function () {
            Route::get('/confirm-email', 'UserController@getConfirmEmail')->name('user.getConfirmEmail');
            Route::post('/confirm-email', 'UserController@postConfirmEmail')->name('user.postConfirmEmail');
        });

        // Survey management
        Route::get('/surveys/', 'SurveyController@index')->name('survey.index');
        Route::get('/surveys/ajaxList', 'SurveyController@getAjaxList')->name('survey.ajaxList');

        // Account
        Route::group(['prefix' => 'user'], function () {
            // List account
            Route::get('/list', 'UserController@listUser')->name('user.list');
            // Create account
            Route::get('/create', 'UserController@createUser')->name('user.create');
            Route::post('/add', 'UserController@addUser')->name('user.add');
            Route::post('/delete', 'UserController@deleteUser')->name('user.postDelete');
            Route::post('/postEdit', 'UserController@postEditUser')->name('user.postEdit');
            Route::get('/ajaxList', 'UserController@getAjaxList')->name('user.ajaxList');
            Route::get('/edit/{id?}', 'UserController@getEdit')->name('user.getEdit');
        });

    });
});
