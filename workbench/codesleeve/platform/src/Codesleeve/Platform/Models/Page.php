<?php namespace Codesleeve\Platform\Models;

class Page extends \Eloquent
{
	/**
	 * Pages table for platform
	 * 
	 * @var string
	 */
	protected $table = "platform_pages";

	/**
	 * The fillable array lets laravel know which fields are fillable
	 *
	 * @var array
	 */
	protected $fillable = ['content', 'title', 'home_page', 'slug'];

}