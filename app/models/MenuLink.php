<?php

class MenuLink extends Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'menu_links';

	/**
	 * The fillable array lets laravel know which fields are fillable
	 *
	 * @var array
	 */
	protected $fillable = ['menu_id','page_id','title','url'];

	/**
	 * Validation rules for the model attributes.
	 *
	 * @var bool
	 */
	public $rules = ['title' => 'required'];

	/**
	 * A menu link belongs to a menu.
	 *
	 * @return belongsTo
	 */
	public function menu()
	{
		return $this->belongsTo('Menu');
	}
}