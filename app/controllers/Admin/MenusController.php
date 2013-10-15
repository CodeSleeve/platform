<?php namespace Admin;

use View, Input, Auth, Session, Redirect, Response, App, Validator;

class MenusController extends BaseController {

	/**
	 * View all of the menus.
	 *
	 * @return void
	 */
	public function index()
	{
		$menus = App::make('Menu');
		$menus = $menus->paginate();

		$this->layout->nest('content', 'admin.menus.index', compact('menus'));
	}

	/**
	 * Show the form to create a new menu.
	 *
	 * @return void
	 */
	public function create()
	{
		$menu = App::make('Menu');

		$this->layout->nest('content', 'admin.menus.create', compact('menu'));
	}

	/**
	 * Show the form to edit a specific menu.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function edit($id)
	{
		$menu = App::make('Menu')->findOrFail($id);

		$this->layout->nest('content', 'admin.menus.edit', compact('menu'));
	}

	/**
	 * Create a new menu.
	 *
	 * @return Response
	 */
	public function store()
	{
		$menu = App::make('Menu');
		$menu->fill(Input::all());
		$validation = Validator::make(Input::all(), $menu->rules);

		if ($validation->passes())
		{
			$menu->save();

			Session::flash('message', 'Added menu #'.$menu->id);

			return Redirect::action('Admin\MenusController@edit', [$menu->id]);
		}
		else
		{
			return Redirect::action('Admin\MenusController@new', [])
				->withErrors($validation->errors)
				->withInput();
		}
	}

	/**
	 * Edit a specific menu.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function update($id)
	{
		$menu = App::make('Menu')->findOrFail($id);
		$validation = Validator::make(Input::all(), $menu->rules);
		
		if ($validation->passes())
		{
			$menu->fill(Input::all());
			$menu->save();
			Session::flash('message', 'Updated menu #'.$menu->id);

			return Redirect::action('Admin\MenusController@edit', [$menu->id]);
		}
		else
		{
			return Redirect::action('Admin\MenusController@edit', [$menu->id])
					->withErrors($validation->errors)
					->withInput();
		}
	}

	/**
	 * Delete a specific menu.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$menu = App::make('Menu')->findOrFail($id);
		$menu->delete();
		Session::flash('message', 'Deleted menu #'.$menu->id);

		return Redirect::action('Admin\MenusController@index', []);
	}
}