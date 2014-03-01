<?php

/*
|--------------------------------------------------------------------------
| viewpath
|--------------------------------------------------------------------------
|
| This macro allows us to have namespaced views but override the view globally
| in the app/views/platform directory.
|
| Say we are looking for render('platform::auth.create') then let's see if
| the file exists at
|
|		app/views/platform/auth/create.php
|
| If so, then we will want to serve that as the view else we fall back to
| to the file
|
|		app/Codesleeve/Platform/Views/auth/create.php
|
*/
if (!function_exists('viewpath'))
{
    function viewpath($view, $base = '')
    {
    	if (strpos($view, 'platform::') === false)
    	{
    		return $view;
    	}

		$path = app_path() . '/views/' . str_replace('::', '/', str_replace('.', '/', $view));

    	if (file_exists("$path.blade.php") || file_exists("$path.php"))
    	{
    		return str_replace('::', '.', $view);
    	}

		return $view;
    }
}
