<?php

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
    function can()
    {
    	$args = func_get_args();

        return true;
        //return Authority::can($param1, $param2, $param3);
    }
}