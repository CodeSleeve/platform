<?php namespace Admin;

use Auth, View;

class BaseController extends \Controller {

	protected $layout = 'layouts.admin';

	/**
	 * Cached instance of the currently logged in user.
	 *
	 * @var currentUser
	 */
	protected $currentUser = null;

	/**
	 * Constructor method
	 *
	 * @param
	 */
	function __construct()
	{
		if (Auth::check()) {
			$this->currentUser = Auth::user();
		}
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout)) {
			$this->layout = View::make($this->layout);
		}

		View::share('currentUser', $this->currentUser);
	}

}