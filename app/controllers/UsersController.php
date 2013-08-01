<?php

class UsersController extends BaseController {    

	/**
	 * View all of the users.
	 *
	 * @return void
	 */
	public function index()
	{
		$users = App::make('User')->paginate();

		$this->layout->nest('content', 'users.index', compact('users'));
	}

	/**
	 * Show the form to create a new user.
	 *
	 * @return void
	 */
	public function create()
	{
		$user = App::make('User');

		$this->layout->nest('content', 'users.create', compact('user'));
	}

	/**
	 * Create a new user.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = App::make('User');
		$user->fill(Input::all());
		
		$validation = Validator::make(Input::all(), $user::$rules);
		if ($validation->passes())
		{
			$user->save();
			Session::flash('success', 'Added user #'.$user->id);

			return Redirect::action('UsersController@index');
		}

		return Redirect::action('UsersController@create', [])->withErrors($validation)->withInput();
	}

	/**
	 * Show the form to edit a specific user.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function edit($id)
	{
		$user = App::make('User')->findOrFail($id);

		$this->layout->nest('content', 'users.edit', compact('user'));
	}

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

	/**
	 * get_logout method
	 *
	 * Log a user out of the system.
	 *
	 * @return void
	 */
	public function Logout()
	{
		Auth::logout();
        
        return Redirect::action('HomeController@index');
	}

	/**
	 * get_dashboard method
	 *
	 * Display the user dashboard page.
	 * 
	 * @return Laravel\View
	 */
	public function dashboard()
	{
		$this->layout->nest('content', 'users.dashboard');
	}

}