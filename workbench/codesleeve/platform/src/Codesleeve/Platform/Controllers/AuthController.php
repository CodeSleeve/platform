<?php namespace Codesleeve\Platform\Controllers;

use View, Input, Auth, Session, Redirect;

class AuthController extends BaseController
{    
	/**
	 * get_login method
	 *
	 * Display the user login form.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->layout = View::make("{$this->viewpath}::layouts.login");

		$this->layout->nest('content', "{$this->viewpath}::auth.create");
	}

	/**
	 * post_login method
	 *
	 * Attempt to log a user into the system.
	 *
	 * @return void
	 */
	public function store()
	{
		$credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];
        $remember = Input::get('remember');

        if (Auth::attempt($credentials, (bool)Input::get('remember_me')))
        {
            Session::flash('success', 'Login Successful');
            return Redirect::intended(action("{$this->namespace}\HomeController@dashboard"));
        }

        Session::flash('error', 'Your username or password was incorrect.');
        return Redirect::action("{$this->namespace}\AuthController@create")->withInput();
	}

	public function destroy()
	{
		Auth::logout();
		return Redirect::to("/");
	}
}