<?php

class UsersController extends BaseController {    

	/**
	 * get_login method
	 *
	 * Display the user login form.
	 *
	 * @return void
	 */
	public function getLogin()
	{
		$this->layout = View::make('layouts.login.layout');
		$this->layout->nest('content', 'users.login');
	}

	/**
	 * post_login method
	 *
	 * Attempt to log a user into the system.
	 *
	 * @return void
	 */
	public function postLogin()
	{
		$credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];
        $remember = Input::get('remember');

        if (Auth::attempt($credentials, (bool)Input::get('remember_me')))
        {
            Session::flash('success', 'Login Successful');
            return Redirect::intended(action('HomeController@index'));
        }

        Session::flash('error', 'Your username or password was incorrect.');
        return Redirect::action('UsersController@getLogin')->withInput();	
	}

}