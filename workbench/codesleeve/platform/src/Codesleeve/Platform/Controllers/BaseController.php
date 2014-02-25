<?php namespace Codesleeve\Platform\Controllers;

use Auth, Controller, Route, User, View;
use Codesleeve\Platform\Support\Breadcrumbs;

class BaseController extends Controller
{
	/**
	 * Layout we should use for the main layout
	 * 
	 * @var string
	 */
	protected $layout = 'platform::layouts.application';

	/**
	 * The namespace for views. This is used throughout the
	 * controllers so I can change it in one place if need be.
	 * 
	 * @var string
	 */
	protected $viewpath = "platform";

	/**
	 * The current namespace we are operating under. We do
	 * this so that we don't have to change all our views
	 * if our namespace happens to change at some point
	 * and it is easier to change in one place than many.
	 * 
	 * @var string
	 */
	protected $namespace = "Codesleeve\Platform\Controllers";

	/**
	 * The current logged in user (if one)
	 * 
	 * @var User
	 */
	protected $currentUser;

	/**
	 * Constructor method
	 *
	 * @param
	 */
	function __construct()
	{
		$this->currentUser = Auth::user();
		$this->breadcrumbs = Breadcrumbs::fromUrl();
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		$this->layout = View::make($this->layout);

		View::share('viewpath', $this->viewpath);
		View::share('namespace', $this->namespace);
		View::share('breadcrumbs', $this->breadcrumbs);
		View::share('currentUser', $this->currentUser);
		View::share('currentRoute', $this->currentRoute());
		View::share('currentController', $this->currentController());
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

	/**
	 * Create a currentController name which can be used in views if needed
	 * 
	 * @return string
	 */
	protected function currentController()
	{
		return explode('@', Route::currentRouteAction())[0];
	}

}