<?php

/*
|--------------------------------------------------------------------------
| render
|--------------------------------------------------------------------------
|
| This macro is just an alias for View::make. Having View::make all over my
| views for partials kind of bothers me. This makes it cleaner in my opinion.
|
*/
if (!function_exists('render'))
{
    function render($view, $data = array())
    {
        return View::make(viewpath($view), $data);
    }
}
