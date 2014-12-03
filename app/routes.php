<?php

Route::get('/', function(){ return View::make('hello');});

Route::get('login', function(){ return View::make('login');});

Route::post('login', array('uses' => 'CustomersController@doLogin'));

Route::group(array('before' => 'auth.customer'), function(){
    Route::get('/login', function(){
        return View::make('admin.dashboard');
    });
});

Route::post('admin', array('uses' => 'HomeController@doLogin'));

Route::group(['prefix' => 'admin', 'before'=>'auth'], function(){

    Route::get('/', array('uses' => 'Admin\DashboardController@getIndex'));

        Route::controller('dashboard', 'Admin\DashboardController');

        Route::get('logout', function(){
            Auth::logout();
        return Redirect::to('admin');
    });
});

Route::filter('auth.admin', function(){ if (!Auth::user()->check()) return View::make('admin.login');});

Route::filter('auth.customer', function(){ if (!Auth::customer()->check()) return View::make('admin.login');});
