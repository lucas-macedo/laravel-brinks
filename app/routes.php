<?php

Route::get('/', function(){ return View::make('hello');});

Route::get('login', 'CustomersController@showLogin');
Route::post('login', 'CustomersController@doLogin');
Route::get('logout', 'CustomersController@doLogout');

Route::group(array('before' => 'auth.customer'), function(){

    Route::get('/login', function(){
        return View::make('admin.dashboard');
    });
});




Route::post('admin', array('uses' => 'HomeController@doLogin'));

Route::get('password/reset', array(
  'uses' => 'HomeController@remember_token'
));

Route::get('password/reset/{token}', array(
  'uses' => 'HomeController@reset',
));

Route::group(['prefix' => 'admin', 'before'=>'auth.admin'], function(){

        Route::get('/', array('uses' => 'Admin\DashboardController@getIndex'));

        Route::controller('dashboard', 'Admin\DashboardController');

        Route::get('logout', function(){
            Auth::user()->logout();
            //dd(Auth::user()->check());
            return Redirect::to('admin');
        });
});

Route::filter('auth.admin', function(){ if (!Auth::user()->check()) return View::make('admin.login');});

Route::filter('auth.customer', function(){ if (!Auth::customer()->check()) return View::make('admin.login');});
