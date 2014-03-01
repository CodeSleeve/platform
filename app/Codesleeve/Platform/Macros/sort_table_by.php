<?php

/*
|--------------------------------------------------------------------------
| sort_table_by
|--------------------------------------------------------------------------
|
| This macro spits out a sorting html and link to sort a table by a specific
| column that is clicked on.
|
| To use this do something like
|
|       <td><?= sort_table_by('first_name', 'First Name') ?></td>
|
*/
if (!function_exists('sort_table_by'))
{
    function sort_table_by($sortBy, $text, $url = null)
    {
        $currentDirection = Request::get('sort_direction');

        $currentSortBy = Request::get('sort_by');

        $iconDirection = "fa-sort";

        $sortDirection = $currentDirection == 'asc' ? 'desc' : 'asc';

        // changes the little icon for us
        if ($currentSortBy == $sortBy)
        {
            $iconDirection = $currentDirection == 'asc' ? "fa-sort-up" : "fa-sort-down";
        }

        $url = $url ?: Request::url() . "?sort_direction={$sortDirection}&sort_by={$sortBy}";

        // we want to keep additional query parameters on the string
        // so we loop through and build query below
        foreach (Request::query() as $queryName => $queryValue)
        {
            if (!in_array($queryName, array('sort_by', 'sort_direction')))
            {
                if (is_array($queryValue))
                {
                    foreach ($queryValue as $value)
                    {
                        $url .= "&{$queryName}[]={$value}";
                    }
                }
                else
                {
                    $url .= "&{$queryName}={$queryValue}";
                }
            }
        }

        return "
            <a class=\"table-sorter-link {$sortBy}\" href=\"{$url}\">
                {$text}
                <i class=\"fa {$iconDirection} pull-right\"></i>
            </a>";
    }
}