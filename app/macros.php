<?php

// View helper to determine if links are active or not
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

HTML::macro('active', function($controllerAction, $active = 'active', $inactive = null)
{
    return active($controllerAction, $active, $inactive);
});
