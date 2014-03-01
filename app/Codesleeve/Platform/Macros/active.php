<?php

/*
|--------------------------------------------------------------------------
| active
|--------------------------------------------------------------------------
|
| If the $link matches one of the active route patterns we search for then
| we return $active string else we return the $inactive string.
|
*/
if (!function_exists('active'))
{
    function active($link, $active = 'active', $inactive = null)
    {
        $link = strtolower($link);
        $routeAction = strtolower(Route::currentRouteAction());

        $controller = explode('@', $routeAction)[0];
        $shortController = str_replace('controller', '', $controller);
        $action = explode('@', $routeAction)[1];

        $matches = array($routeAction, $controller, $shortController, $action, "$controller $action", "$shortController $action");
        return in_array($link, $matches) ? $active : $inactive;
    }
}
