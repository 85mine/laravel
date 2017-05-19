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

    // Before login
    Route::get('/', function (){
        return redirect(route('user.getLogin'));
    });

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

            //Company Management
            Route::get('/company/index', 'CompanyController@getIndex')->name('company.get.index');
            Route::get('/company/add', 'CompanyController@getAdd')->name('company.get.add');
            Route::post('/company/add', 'CompanyController@postAdd')->name('company.post.add');
            Route::post('/company/delete', 'CompanyController@postDelete')->name('company.post.delete');
            Route::get('/company/edit/{id?}', 'CompanyController@getEdit')->name('company.get.edit');
            Route::post('/company/edit/{id?}', 'CompanyController@postEdit')->name('company.post.edit');
            Route::get('/company/getAjaxData', 'CompanyController@getAjaxData')->name('company.get.ajax.data');
            
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

        // User Management
        Route::get('/user/index', 'UserController@getIndex')->name('user.get.index');
        Route::get('/user/add', 'UserController@getAdd')->name('user.get.add');
        Route::post('/user/add', 'UserController@postAdd')->name('user.post.add');
        Route::post('/user/delete', 'UserController@postDelete')->name('user.post.delete');
        Route::get('/user/edit/{id?}', 'UserController@getEdit')->name('user.get.edit');
        Route::post('/user/edit/{id?}', 'UserController@postEdit')->name('user.post.edit');
        Route::get('/user/getAjaxData', 'UserController@getAjaxData')->name('user.get.ajax.data');

    });

});

//Survey frontend
Route::get('/index', 'SurveyController@getIndex')->name('index');
Route::get('/survey', 'SurveyController@getSurvey')->name('survey');
Route::post('/survey', 'SurveyController@postSurvey')->name('postSurvey');
Route::get('/survey/result', 'SurveyController@getResult')->name('survey.result');
