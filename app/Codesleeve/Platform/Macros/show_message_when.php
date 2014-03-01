<?php

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
