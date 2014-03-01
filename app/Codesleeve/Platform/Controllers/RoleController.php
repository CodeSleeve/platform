<?php namespace Codesleeve\Platform\Controllers;

use Codesleeve\Platform\Models\Role;
use Codesleeve\Platform\Validators\RoleValidator;

use View, Input, Auth, Session, Redirect, Response, App, Validator;

class RoleController extends BaseController
{
	/**
	 * Create a new RoleController
	 *
	 */
	public function __construct(Role $roles)
	{
		parent::__construct();

		$this->roles = $roles;
		$this->validator = new RoleValidator($this->namespaced("RoleController"));
	}

	/**
	 * View all of the roles.
	 *
	 * @return void
	 */
	public function index()
	{
		$roles = $this->roles->paginate();

		$this->layout->nest('content', viewpath('platform::roles.index'), compact('roles'));
	}

	/**
	 * Show the form to create a new role.
	 *
	 * @return void
	 */
	public function create()
	{
		$role = $this->roles->fill(Input::old());

		$this->layout->nest('content', viewpath("platform::roles.create"), compact('role'));
	}

	/**
	 * Create a new role.
	 *
	 * @return Redirect
	 */
	public function store()
	{
		$role = $this->roles->fill(Input::all());

		$this->validator->validate(Input::all(), $role);

		$role->save();

		Session::flash('success', 'Created role succesfully');

		return Redirect::action($this->namespaced("RoleController@index"));
	}

	/**
	 * Show the form to edit a specific role.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function edit($id)
	{
		$role = $this->roles->findOrFail($id);

		$this->layout->nest('content', viewpath("platform::roles.edit"), compact('role'));
	}

	/**
	 * Edit a specific role.
	 *
	 * @param  int $id
	 * @return Redirect
	 */
	public function update($id)
	{
		$role = $this->roles->findOrFail($id);

		$role->fill(Input::all());

		$this->validator->validate(Input::all(), $role);

		$role->save();

		Session::flash('success', 'Updated role successfully');

		return Redirect::action($this->namespaced("RoleController@index"));
	}

	/**
	 * Delete a specific role record.
	 *
	 * @param  int $id
	 * @return Redirect
	 */
	public function destroy($id)
	{
		$role = $this->roles->findOrFail($id);

		$role->delete();

		Session::flash('success', 'Record deletion successful!');

		return Redirect::action($this->namespaced("RoleController@index"));
	}
}