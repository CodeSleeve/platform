<?php namespace Codesleeve\Platform\Controllers;

use View, Input, Auth, Session, Redirect;

class AuthController extends BaseController
{
	/**
	 * Display the user login form.
	 *
	 * @return void
	 */
	public function create()
	{
		$this->layout = render("platform::layouts.login");

		$this->layout->nest('content', viewpath("platform::auth.create"));
	}

	/**
	 * Attempt to log a user into the system.
	 *
	 * @return Redirect
	 */
	public function store()
	{
		$credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];
        $remember = Input::get('remember');

        if (Auth::attempt($credentials, (bool)Input::get('remember_me')))
        {
            Session::flash('success', 'Login Successful');
            return Redirect::intended(action($this->namespaced("HomeController@dashboard")));
        }

        Session::flash('error', 'Your username or password was incorrect.');
        return Redirect::action($this->namespaced("AuthController@create"))->withInput();
	}

	/**
	 * Log the user out of the system
	 *
	 * @return Redirect
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::to("/");
	}
}