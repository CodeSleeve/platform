<?php

/*
|--------------------------------------------------------------------------
| Active Macro
|--------------------------------------------------------------------------
|
| If the $link matches one of the active route patterns we search for then
| we return $active string else we return the $inactive string.
|
*/
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

HTML::macro('active', 'active');

/*
|--------------------------------------------------------------------------
| show_message_when
|--------------------------------------------------------------------------
|
| This macro spits out a paragraph tag for this $name (e.g. first_name) and
| if there are errors the paragraph tag has alert and alert-error on it as
| well as the error message for that specific name. Uses laravel MessageBag from
| the Validator.
|
*/
function show_message_when($name, $errors, $attributes = array())
{
    $attributes_string = "";
    $content_string = "";

    $attributes['class'] = isset($attributes['class']) ?: "";
    $attributes['class'] .= " $name";

    if ($errors->has($name))
    {
        $attributes['class'] .= " alert";
        $attributes['class'] .= " alert-danger";
        $content_string = $errors->first($name);
    }

    foreach ($attributes as $key => $value) {
        $attributes_string = " $key = \"" . $value . "\""; 
    }

    return "<div $attributes_string>$content_string</div>";
}

HTML::macro('show_message_when', 'show_message_when');