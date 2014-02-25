<?php namespace Codesleeve\Platform\Controllers;

use Codesleeve\Platform\Models\Menu;
use Codesleeve\Platform\Validators\MenuValidator;

use View, Input, Auth, Session, Redirect, Response, App, Validator;

class MenuController extends BaseController
{
	/**
	 * Create a new Menu Controller
	 * 
	 * @param Menu          $menus
	 * @param MenuValidator $validator
	 */
	public function __construct(Menu $menus, MenuValidator $validator)
	{
		parent::__construct();

		$this->menus = $menus;
		$this->validator = $validator;
	}

	/**
	 * View all of the menus.
	 *
	 * @return void
	 */
	public function index()
	{
		$menus = $this->menus->paginate();

		$this->layout->nest('content', "{$this->viewpath}::menus.index", compact('menus'));
	}

	/**
	 * Show the form to create a new menu.
	 *
	 * @return void
	 */
	public function create()
	{
		$menu = $this->menus->fill(Input::old());

		$this->layout->nest('content', "{$this->viewpath}::menus.create", compact('menu'));
	}

	/**
	 * Show the form to edit a specific menu.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function edit($id)
	{
		$menu = $this->menus->findOrFail($id);

		$menu = $menu->fill(Input::old());

		$this->layout->nest('content', "{$this->viewpath}::menus.edit", compact('menu'));
	}

	/**
	 * Create a new menu.
	 *
	 * @return Response
	 */
	public function store()
	{
		$menu = $this->menus;

		$menu->fill(Input::all());

		$this->validator->validate(Input::all(), $menu);

		$menu->save();

		Session::flash('message', 'Added menu #'.$menu->id);

		return Redirect::action("{$this->namespace}\MenuController@index");
	}

	/**
	 * Edit a specific menu.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function update($id)
	{
		$menu = $this->menus->findOrFail($id);

		$menu->fill(Input::all());

		$this->validator->validate(Input::all(), $menu);

		$menu->save();

		Session::flash('message', 'Updated menu #'.$menu->id);

		return Redirect::action("{$this->namespace}\MenuController@index");
	}

	/**
	 * Delete a specific menu.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$menu = $this->menus->findOrFail($id);

		$menu->delete();

		Session::flash('message', 'Deleted menu #' . $menu->id);

		return Redirect::action("{$this->namespace}\MenuController@index");
	}
}