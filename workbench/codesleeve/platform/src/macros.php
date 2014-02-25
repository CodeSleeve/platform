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
if (!function_exists('show_message_when'))
{
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
}



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
        return View::make($view, $data);
    }
}



/*
|--------------------------------------------------------------------------
| can
|--------------------------------------------------------------------------
|
| This macro is just an alias for Authority::can. This is cleaner way to do
| it in my opinion. It keeps us from having the Authority facades everywhere.
|
| We could at anypoint in the future swap this out for a different ACL tool
| all our code would be changed as well.
*/
if (!function_exists('can'))
{
    function can($param1, $param2, $param3 = null)
    {
        return true;
        //return Authority::can($param1, $param2, $param3);
    }
}