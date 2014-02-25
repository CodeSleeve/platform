<?php namespace Codesleeve\Platform\Models;

class Menu extends \Eloquent
{
	/**
	 * Menus for platform
	 * 
	 * @var string
	 */
	protected $table = "platform_menus";

	/**
	 * The fillable array lets laravel know which fields are fillable
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'url'];

	/**
     * A menu has many menu links.
     * 
     * @return hasMany
     */
    public function menuLinks()
    {
        return $this->hasMany('Codesleeve\Platform\Models\MenuLink', 'menu_id');
    }
}