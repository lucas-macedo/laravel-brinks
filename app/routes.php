<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
    return View::make('hello');
});

Route::get('login', function(){
    return View::make('login');
});

Route::post('login', array('uses' => 'CustomersController@doLogin'));

Route::group(array('before' => 'auth.customer'), function(){
    Route::get('/login', function(){
       
        return View::make('admin.dashboard');
    });
});

Route::post('admin', array('uses' => 'HomeController@doLogin'));


Route::group(array('before' => 'auth.admin'), function(){
        // main page for the admin section (app/views/admin/dashboard.blade.php)

        Route::get('/admin', function(){
            return View::make('admin.dashboard');
        });
        Route::get('admin/logout', function(){
            Auth::logout();
            return Redirect::to('admin');
        });

});

Route::filter('auth.admin', function(){
    if (!Auth::user()->check()) return View::make('admin.login');
});

Route::filter('auth.customer', function(){
    if (!Auth::customer()->check()) return View::make('admin.login');
});

/*Route::post('admin/login', function(){
    $userdata = array('username' => Input::get('username'),
                      'password' => Input::get('password'));

    if (Auth::attempt($userdata)){
        return Redirect::to('admin');
    }
    else{
        return Redirect::to('admin/login')->with('login_errors',true);
    }
});*/

/*




Route::controller('admin.dashboard');

Route::get('admin', array('before' => 'auth', function() {
    return Redirect::to_action('admin@dashboard');
}));

*/