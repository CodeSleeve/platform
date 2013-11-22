<?php

class BaseController extends Controller {

	protected $layout = 'layouts.application';

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
		$this->layout = View::make($this->layout);

		View::share('currentUser', $this->currentUser);
		View::share('currentRoute', $this->currentRoute());
	}

	/**
	 * Create a route based on controller name and controller action 
	 * which we can use to style conditionally with
	 * 
	 * @return string
	 */
	protected function currentRoute()
	{
		$controller = explode('@', Route::currentRouteAction())[0];
		$controller = strtolower(str_replace('Controller', '', $controller));
		$action = strtolower(explode('@', Route::currentRouteAction())[1]);

		return "$controller $action";
	}

}