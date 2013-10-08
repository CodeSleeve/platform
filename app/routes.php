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

// default route
Route::get('/', 'HomeController@index');

// pages
Route::get('pages/{id}', 'PagesController@show');

// Non-authentication required routes - Can be accessed by non-authenticated users (guests) only.
Route::group(['before' => 'guest'], function() 
{
    Route::get('login', 'UsersController@getLogin');
    Route::post('login', ['uses' => 'UsersController@postLogin', 'before' => 'csrf']);
});

// Authentication required routes - Can only be accessed by authenticated users.
Route::group(['prefix' => 'admin', 'before' => 'auth'], function() 
{
    // home
    Route::get('/', 'Admin\HomeController@dashboard');

    // menus
    Route::get('menus', 'Admin\MenusController@index');
    Route::get('menus/create', 'Admin\MenusController@create');
    Route::post('menus', 'Admin\MenusController@store');
    Route::get('menus/{id}/edit', 'Admin\MenusController@edit');
    Route::put('menus/{id}', 'Admin\MenusController@update');
    Route::delete('menus/{id}', 'Admin\MenusController@destroy');

    // menu links
    Route::get('menus/{id}/menu-links', 'Admin\MenuLinksController@index');
    Route::get('menus/{id}/menu-links/create', 'Admin\MenuLinksController@create');
    Route::post('menus/{id}/menu-links', 'Admin\MenuLinksController@store');
    Route::get('menu-links/{id}/edit', 'Admin\MenuLinksController@edit');
    Route::put('menu-links/{id}', 'Admin\MenuLinksController@update');
    Route::delete('menu-links/{id}', 'Admin\MenuLinksController@destroy');

    // pages
    Route::get('pages', 'Admin\PagesController@index');
    Route::get('pages/create', 'Admin\PagesController@create');
    Route::post('pages', 'Admin\PagesController@store');
    Route::get('pages/{id}/edit', 'Admin\PagesController@edit');
    Route::put('pages/{id}', 'Admin\PagesController@update');
    Route::delete('pages/{id}', 'Admin\PagesController@destroy');

    // photos
    Route::get('photos', 'Admin\PhotosController@index');
    Route::post('photos', 'Admin\PhotosController@store');

    // users
    Route::get('users', 'Admin\UsersController@index');
    Route::get('users/create', 'Admin\UsersController@create');
    Route::post('users', 'Admin\UsersController@store');
    Route::get('users/{id}/edit', 'Admin\UsersController@edit');
    Route::put('users/{id}', ['uses' => 'Admin\UsersController@update', 'before' => ['csrf', 'auth']]);
    Route::delete('users/{id}', ['uses' => 'Admin\UsersController@destroy', 'before' => ['csrf', 'auth']]);
    Route::get('logout', 'Admin\UsersController@logout');
});