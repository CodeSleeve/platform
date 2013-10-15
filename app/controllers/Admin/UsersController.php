<?php namespace Admin;

use View, Input, Auth, Session, Redirect, Response, App, Validator;

class UsersController extends BaseController {    

	/**
	 * View all of the users.
	 *
	 * @return void
	 */
	public function index()
	{
		$users = App::make('User')->paginate();

		$this->layout->nest('content', 'admin.users.index', compact('users'));
	}

	/**
	 * Show the form to create a new user.
	 *
	 * @return void
	 */
	public function create()
	{
		$user = App::make('User');

		$this->layout->nest('content', 'admin.users.create', compact('user'));
	}

	/**
	 * Create a new user.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = App::make('User');
		
		$validation = Validator::make(Input::all(), $user->getCreationRules());
		if ($validation->passes())
		{
			$user->fill(Input::all());
			$user->password = Input::get('password');
			$user->save();
			$user->roles()->attach(Input::get('role_ids'));

			Session::flash('success', 'Added user #'.$user->id);

			return Redirect::action('Admin\UsersController@index');
		}

		return Redirect::action('Admin\UsersController@create', [])->withErrors($validation)->withInput();
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

		$this->layout->nest('content', 'admin.users.edit', compact('user'));
	}

	/**
	 * Edit a specific user.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = App::make('User')->findOrFail($id);
		$validation = Validator::make(Input::all(), $user->getUpdateRules());

		if ($validation->passes())
		{
			$user->fill(Input::all());

			if (Input::get('password')) {
				$user->password = Input::get('password');
			}

			$user->save();
			$user->roles()->attach(Input::get('role_ids'));
			Session::flash('success', 'Updated user #'.$user->id);

			return Redirect::action('Admin\UsersController@index');
		}
		
		return Redirect::action('Admin\UsersController@edit', [$user->id])->withErrors($validation)->withInput();
	}

	/**
	 * Delete a specific user record.
	 * 
	 * @param  int $id 
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = App::make('User')->findOrFail($id);
		$user->delete();
		Session::flash('success', 'Record deletion successful!');

		return Redirect::action('Admin\UsersController@index');
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

}