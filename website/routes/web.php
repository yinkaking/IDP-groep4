<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes na login
Route::group(array('middleware' => ['web','auth']), function () {
	Route::get('/', 'admin\HomeController@index')->name('home');

	Route::get("/index/user", "admin\RegisterController@index")->name("user.index");
	Route::get("/create/user", "admin\RegisterController@create")->name("user.create");
	Route::post("/store/user", "admin\RegisterController@store")->name("user.store");
	Route::get("/destroy/user/{id}", "admin\RegisterController@destroy")->name("user.destroy");

	Route::get("/index/waterdata", "admin\WaterdataController@index")->name("waterdata.index");

	Route::get("/control-panel", "admin\ControleController@index")->name("control.index");
	Route::post("/control-panel/update", "admin\ControleController@updateWaterkering")->name("control.waterkering.ajax");
	Route::post("/control-panel/status-doors", "admin\ControleController@getStatusDoors")->name("control.waterkering.getstatus");
	Route::post("/control-panel/onderhoud", "admin\ControleController@onderhoud")->name("control.waterkering.onderhoud");
});


Route::group(array("middleware"=>["web","guest"], "namespace"=>"Auth"), function(){
	// Authentication Routes...
	Route::get('login', 'LoginController@showLoginForm')->name('login');
	Route::post('login', 'LoginController@login');

	Route::post('logout',function(){echo("dingen");})->name('logout');

	// Registration Routes...
	// Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
	// Route::post('register', 'RegisterController@register');

	// Password Reset Routes...
	Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'ResetPasswordController@reset');
});

//Public routes
Route::get("/home", "PublicController@index")->name("public.index");
Route::post("/status/update", "PublicController@store")->name("public.store");
Route::post("/toPython", "PublicController@sendToPython")->name("public.send");
