<?php

Route::group(['prefix' => 'admin', 'before' => 'csrf'], function() 
{
	$namespace = "Codesleeve\Platform\Controllers";

	// authentication
	Route::get('login', "{$namespace}\AuthController@create");
	Route::post('login', "{$namespace}\AuthController@store");
	Route::any('logout', "{$namespace}\AuthController@destroy");

	// password resets
	Route::resource('password-reset', "{$namespace}\PasswordResetController");

	// users who are authenticated
	Route::group(['before' => 'platform.auth'], function() use ($namespace)
	{
		// dashboard
		Route::get('/', "{$namespace}\HomeController@dashboard");

		// menus
		Route::resource('menus', "{$namespace}\MenuController");

		// menu links
		Route::resource('menus.menu-links', "{$namespace}\MenuLinkController");

		// pages
		Route::resource('pages', "{$namespace}\PageController");

		// photos
		Route::resource('photos', "{$namespace}\PhotoController");

		// users
		Route::resource('roles', "{$namespace}\RoleController");

		// users
		Route::resource('users', "{$namespace}\UserController");
	});
});