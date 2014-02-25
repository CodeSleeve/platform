<?php

Route::group(['prefix' => 'admin', 'before' => 'csrf'], function() 
{
	$namespace = "Codesleeve\Platform\Controllers";

	// authentication
	Route::get('login', "{$namespace}\AuthController@create");
	Route::post('login', "{$namespace}\AuthController@store");
	Route::any('logout', "{$namespace}\AuthController@destroy");

	// password resets
	Route::get('password/remind', "{$namespace}\PasswordResetController@create");
	Route::post('password/remind', "{$namespace}\PasswordResetController@store");
	Route::get('password/reset/{token}', "{$namespace}\PasswordResetController@edit");
	Route::post('password/reset/{token}', "{$namespace}\PasswordResetController@update");

	// users who are authenticated
	Route::group(['before' => 'platform.auth'], function() use ($namespace)
	{
		// dashboard
		Route::get('/', "{$namespace}\HomeController@dashboard");

		// menus
		Route::resource('menus', "{$namespace}\MenuController");

		// menu links
		// Route::resource('menu-links', "{$namespace}\MenuLinksController");
		// Route::get('menus/{id}/menu-links', "{$namespace}\MenuLinksController@index");
		// Route::get('menus/{id}/menu-links/create', "{$namespace}\MenuLinksController@create");
		// Route::post('menus/{id}/menu-links', "{$namespace}\MenuLinksController@store");

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