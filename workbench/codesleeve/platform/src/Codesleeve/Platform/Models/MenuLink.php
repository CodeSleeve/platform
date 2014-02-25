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
	protected $fillable = ['menu_id', 'page_id', 'title', 'url'];

	/**
	 * A menu link belongs to a menu.
	 *
	 * @return belongsTo
	 */
	public function menu()
	{
		return $this->belongsTo('Codesleeve\Platform\Models\Menu');
	}
}