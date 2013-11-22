<?php

// pages
Route::get('pages/{id}', 'PagesController@show');

// Non-authentication required routes - Can be accessed by non-authenticated users (guests) only.
Route::group(['before' => 'guest|crsf'], function() 
{
    Route::get('login', 'UsersController@getLogin');
    Route::post('login', 'UsersController@postLogin');
    Route::post('password/remind', 'UsersController@passwordReminder');
    Route::get('password/reset/{token}', 'UsersController@getPasswordReset');
    Route::post('password/reset/{token}', 'UsersController@postPasswordReset');
});

// Authentication required routes - Can only be accessed by authenticated users.
Route::group(['prefix' => 'admin', 'before' => 'auth|csrf'], function() 
{
    // home
    Route::get('/', 'Admin\HomeController@dashboard');

    // menus
    Route::resource('menus', 'Admin\MenusController');

    // menu links
    Route::resource('menu-links', 'Admin\MenuLinksController');
    Route::get('menus/{id}/menu-links', 'Admin\MenuLinksController@index');
    Route::get('menus/{id}/menu-links/create', 'Admin\MenuLinksController@create');
    Route::post('menus/{id}/menu-links', 'Admin\MenuLinksController@store');

    // pages
    Route::resource('pages', 'Admin\PagesController');

    // photos
    Route::resource('photos', 'Admin\PhotosController');

    // users
    Route::resource('users', 'Admin\UsersController');
    Route::get('logout', 'Admin\UsersController@logout');
});