<?php namespace Admin;

use View, Input, Auth, Session, Redirect, Response, App, Validator;

class MenuLinksController extends \BaseController {

	/**
	 * index method - View all of the menu links for a give menu
	 *
	 * @param  $menuId - The id of the menu the menu links belong to
	 * @return Laravel\Response
	 */
	public function index($menuId)
	{	
		$menu = App::make('Menu')->findOrFail($menuId);
		$menuLinks = $menu->menuLinks()->paginate();

		$this->layout->nest('content', 'admin.menulinks.index', compact('menu', 'menuLinks'));
	}

	/**
	 * create method - Show the form to create a new menulink.
	 *
	 * @return Laravel\Response
	 */
	public function create($menuId)
	{
		$menu = App::make('Menu')->findOrFail($menuId);
		$menuLink = App::make('Menulink');
		$menuLink->menu_id = $menuId;

		$this->layout->nest('content', 'admin.menulinks.create', compact('menu', 'menuLink'));
	}

	/**
	 * edit method - Show the form to edit a specific menulink.
	 *
	 * @param  int   $id
	 * @return  Laravel\Response
	 */
	public function edit($id)
	{
		$menuLink = App::make('MenuLink')->findOrFail($id);
		$this->layout->nest('content', 'admin.menulinks.edit', compact('menuLink'));
	}

	/**
	 * store method - Create a new menu link.
	 *
	 * @param  $menuId - The id of the menu the menu link will belong to.
	 * @return Laravel\Response
	 */
	public function store($menuId)
	{
		$menu = App::make('Menu')->findOrFail($menuId);
		$menuLink = App::make('MenuLink');
		$menuLink->fill(Input::all());
		
		$validation = Validator::make(Input::all(), $menuLink->rules);
		if ($validation->fails()) {
			return Redirect::action('MenuLinksController@new', [$menuId], 400)->withErrors($validation)->withInput();
		}

		if ($menu->menuLinks()->insert($menuLink))
		{
			Session::flash('success', 'Menu link successfully created');
			return Redirect::action('MenuLinksController@edit', [$menuLink->id], 201);
		}
		
		return Redirect::action('MenuLinksController@new', [$menuId], 422)->withInput();
	}

	/**
	 * update method - Update a menu link
	 *
	 * @param  $id - The id of the menu link being updated
	 * @return Laravel\Response
	 */
	public function update($id)
	{
		$menuLink = App::make('MenuLink')->findOrFail($id);
		$validation = Validator::make(Input::all(), $menuLink->rules);
		if ($validation->fails()) {
			return Redirect::action('MenuLinksController@edit', [$id], 400)->withErrors($validation)->withInput();
		}

		$menuLink->fill(Input::all());
		if ($menuLink->save()) 
		{
			Session::flash('success', 'Menu link successfully updated');
			return Redirect::action('MenuLinksController@edit', [$id], 200);
		}

		Session::flash('success', 'Menu link update unsuccessful, please try again.');
		return Redirect::action('MenuLinksController@edit', [$id], 422);
	}

	/**
	 * destroy method - Delete a specific menulink.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}
}