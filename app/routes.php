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

Route::get('/', function()
{
	return View::make('hello');
});


/*
|--------------------------------------------------------------------------
| Validation Exceptions
|--------------------------------------------------------------------------
| 
| If we encounter one of these, let's redirect to the correct place
|
*/
App::error(function(\Codesleeve\Platform\Exceptions\ValidatorException $exception)
{
    return Redirect::to($exception->getAction())->withErrors($exception->getValidator())->withInput($exception->getInput());
});
