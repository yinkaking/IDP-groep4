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
});


Route::group(array("middleware"=>["web","guest"]), function(){
	// Authentication Routes...
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');

	// Registration Routes...
	// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	// Route::post('register', 'Auth\RegisterController@register');

	// Password Reset Routes...
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

//Public routes
Route::get("/status", "PublicController@index")->name("public.index");
Route::post("/status/update", "PublicController@store")->name("public.store");
