<?php namespace Codesleeve\Platform\Controllers;

class HomeController extends BaseController
{
	/**
	 * Display the admin dashboard page.
	 * 
	 * @return Laravel\View
	 */
	public function dashboard()
	{
		$this->layout->nest('content', "{$this->viewpath}::home.dashboard");
	}
	
}