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

// Authenticastion required routes - Can only be accessed by authenticated users.
Route::group(['before' => 'auth'], function() 
{
    // menus
    Route::get('admin/menus', 'MenusController@index');
    Route::get('admin/menus/create', 'MenusController@create');
    Route::post('admin/menus', 'MenusController@store');
    Route::get('admin/menus/{id}/edit', 'MenusController@edit');
    Route::put('admin/menus/{id}', 'MenusController@update');
    Route::delete('admin/menus/{id}', 'MenusController@destroy');

    // menu_links
    Route::get('admin/menus/{id}/menu-links', 'MenusController@index');
    Route::get('admin/menus/{id}/menu-links/create', 'MenusController@create');
    Route::post('admin/menus/{id}/menu-links', 'MenusController@store');
    Route::get('admin/menu-links/{id}/edit', 'MenusController@edit');
    Route::put('admin/menu-links/{id}', 'MenusController@update');
    Route::delete('admin/menu-links/{id}', 'MenusController@destroy');

    // pages
    Route::get('admin/pages', 'PagesController@index');
    Route::get('admin/pages/create', 'PagesController@create');
    Route::post('admin/pages', 'PagesController@store');
    Route::get('admin/pages/{id}/edit', 'PagesController@edit');
    Route::put('admin/pages/{id}', 'PagesController@update');
    Route::delete('admin/pages/{id}', 'PagesController@destroy');

    // photos
    Route::get('admin/photos', 'PhotosController@index');
    Route::post('admin/photos', 'PhotosController@store');

    // users
    Route::get('admin/users', 'UsersController@index');
    Route::get('users/create', 'UsersController@create');
    Route::post('admin/users', 'UsersController@store');
    Route::get('users/{id}/edit', 'UsersController@edit');
    Route::put('users/{id}', ['uses' => 'UsersController@update', 'before' => ['csrf', 'auth']]);
    Route::delete('users/{id}', ['uses' => 'UsersController@destroy', 'before' => ['csrf', 'auth']]);
    Route::get('logout', 'UsersController@logout');
    Route::get('admin', 'UsersController@dashboard');
});