<?php namespace Admin;

use View, Input, Auth, Session, Redirect, Response, App, Validator;

class HomeController extends BaseController {
	
	/**
	 * Display the admin dashboard page.
	 * 
	 * @return Laravel\View
	 */
	public function dashboard()
	{
		$this->layout->nest('content', 'admin.pages.dashboard');
	}
	
}