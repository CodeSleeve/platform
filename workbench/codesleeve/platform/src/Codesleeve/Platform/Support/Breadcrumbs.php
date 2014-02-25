<?php namespace Codesleeve\Platform\Support;

use Route;

class Breadcrumbs
{
	/**
	 * [$url description]
	 * @var [type]
	 */
	public $url;

	/**
	 * [$name description]
	 * @var [type]
	 */
	public $name;

	/**
	 * [$active description]
	 * @var [type]
	 */
	public $active;

	/**
	 * Facade helper for breadcrumbs
	 */
	static function fromUrl()
	{
		$instance = new Breadcrumbs;
		return $instance->generateFromUrl();
	}

	/**
	 * Create an array of breadcrumbs to use if needed on a page
	 * 
	 * @return array
	 */
	public function generateFromUrl()
	{
		$breadcrumbs = array();

		$paths = explode('/', trim(Route::getCurrentRoute()->getPath(), '/'));

		$url = "";
		
        foreach ($paths as $path)
        {
            if (strpos($path, '{') === false && strpos($path, '}') === false)
            {
                $url .= "/{$path}";
                $name = $path;
            }
            else
            {
            	$name = substr($path, 1, -1);
            	$param = Route::getCurrentRoute()->getParameter($name);
            	$name = $this->singular($name);
            	$url .= "/" . $param;
            }

            $breadcrumbs[] = $this->newInstance($name, $url);
		}

	    return $breadcrumbs;		
	}

	/**
	 * Create a new instance of a breadcrumb
	 * 
	 * @param  [type] $name
	 * @param  [type] $url
	 * @return [type]
	 */
	public function newInstance($name, $url, $active = "")
	{
		$breadCrumb = new Breadcrumbs;

		$breadCrumb->name = ucfirst(str_replace('-', ' ', $name));
		$breadCrumb->url = $url;
		$breadCrumb->active = $active;

		return $breadCrumb;
	}

	/**
	 * [singular description]
	 * @param  [type] $name
	 * @return [type]
	 */
	protected function singular($name)
	{
		if ($name == "menus")
		{
			return "menu";
		}

		return str_singular($name);
	}
}