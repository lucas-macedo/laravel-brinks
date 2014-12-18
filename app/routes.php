<?php

Route::get('/', 'HomeController@showWelcome');
Route::controller('product', 'ProductsController');

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


// =============================================
// API ROUTES ==================================
// =============================================
Route::group(array('prefix' => 'api'), function() {

    // since we will be using this just for CRUD, we won't need create and edit
    // Angular will handle both of those forms
    // this ensures that a user can't access api/create or api/edit when there's nothing there
    Route::resource('comments', 'CommentController', 
        array('only' => array('index', 'store', 'destroy')));
});

// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
    return View::make('index');
});


Route::filter('auth.admin', function(){ if (!Auth::user()->check()) return View::make('admin.login');});

Route::filter('auth.customer', function(){ if (!Auth::customer()->check()) return View::make('admin.login');});
