<?php

class Menu extends Eloquent {

	/**
	 * The fillable array lets laravel know which fields are fillable
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'url'];

	/**
	 * The rules array lets us know how to to validate this model
	 *
	 * @var array
	 */
	public $rules = [
		'title' => 'required',
	];

	/**
     * A menu has many menu links.
     * 
     * @return hasMany
     */
    public function menuLinks()
    {
        return $this->hasMany('MenuLink', 'menu_id');
    }
}