<?php

class Page extends Eloquent {

	/**
	 * The fillable array lets laravel know which fields are fillable
	 *
	 * @var array
	 */
	protected $fillable = ['content', 'title', 'home_page', 'slug'];

	/**
	 * The rules array lets us know how to to validate this model
	 *
	 * @var array
	 */
	public $rules = [
		'content' => 'required',
	];


}