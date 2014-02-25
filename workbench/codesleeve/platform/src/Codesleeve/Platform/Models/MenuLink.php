<?php namespace Codesleeve\Platform\Models;

class MenuLink extends \Eloquent
{
	/**
	 * Menu links table for platform
	 * 
	 * @var string
	 */
	protected $table = "platform_menu_links";

	/**
	 * The fillable array lets laravel know which fields are fillable
	 *
	 * @var array
	 */
	protected $fillable = ['page_id', 'title', 'url'];

	/**
	 * A menu link belongs to a menu.
	 *
	 * @return belongsTo
	 */
	public function menu()
	{
		return $this->belongsTo('Codesleeve\Platform\Models\Menu');
	}

	/**
	 * A menu link belongs to a page.
	 *
	 * @return belongsTo
	 */
	public function page()
	{
		return $this->belongsTo('Codesleeve\Platform\Models\Page');
	}

	/**
	 * Show a url if one is set else we fall back to a page
	 *
	 * @return string
	 */
	public function getMenuUrlAttribute()
	{
		$url = $this->attributes['url'];

		$pageUrl = $this->page ? $this->page->page_url : null;

		return $url ?: $pageUrl;
	}
}