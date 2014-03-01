<?php

/*
|--------------------------------------------------------------------------
| Default routes for Platform
|--------------------------------------------------------------------------
|
| Out of the box platform handles user authentication, password recovery and
| role management. These are typical in most applications. so they are part
| of the base setup. They are meant to be tweaked to your liking as most
| applications have different attributes for users.
|
*/
Route::group(['prefix' => 'admin', 'before' => 'csrf'], function()
{
	// open routes
	Route::get('login', "Platform\AuthController@create");
	Route::post('login', "Platform\AuthController@store");
	Route::any('logout', "Platform\AuthController@destroy");
	Route::resource('password-reset', "Platform\PasswordResetController");

	// needs authentication
	Route::group(['before' => 'platform.auth'], function()
	{
		Route::get('/', "Platform\HomeController@dashboard");
		Route::resource('roles', "Platform\RoleController");
		Route::resource('users', "Platform\UserController");
	});
});