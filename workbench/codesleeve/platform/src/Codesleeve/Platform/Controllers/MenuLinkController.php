<?php namespace Codesleeve\Platform\Controllers;

use View, Input, Auth, Session, Redirect, Response, App, Validator;

class MenuLinksController extends BaseController
{
	/**
	 * Create a new menulink controller
	 * 
	 * @param Menu     $menus
	 * @param Menulink $menuLinks
	 */
	public function __construct(Menu $menus, Menulink $menuLinks)
	{
		$this->menus = $menus;
		$this->menuLinks = $menuLinks;
	}

	/**
	 * index method - View all of the menu links for a give menu
	 *
	 * @param  $menuId - The id of the menu the menu links belong to
	 * @return Laravel\Response
	 */
	public function index($menuId)
	{	
		$menu = $this->menu->findOrFail($menuId);
		$menuLinks = $menu->menuLinks()->paginate();

		$this->layout->nest('content', 'codesleeve.menulinks.index', compact('menu', 'menuLinks'));
	}

	/**
	 * create method - Show the form to create a new menulink.
	 *
	 * @return Laravel\Response
	 */
	public function create($menuId)
	{
		$menu = $this->menus->findOrFail($menuId);
		$menuLink = $this->menuLinks;
		$menuLink->menu_id = $menuId;

		$this->layout->nest('content', 'codesleeve.menulinks.create', compact('menu', 'menuLink'));
	}

	/**
	 * edit method - Show the form to edit a specific menulink.
	 *
	 * @param  int   $id
	 * @return  Laravel\Response
	 */
	public function edit($id)
	{
		$menuLink = $this->menuLinks->findOrFail($id);
		$this->layout->nest('content', 'codesleeve.menulinks.edit', compact('menuLink'));
	}

	/**
	 * store method - Create a new menu link.
	 *
	 * @param  $menuId - The id of the menu the menu link will belong to.
	 * @return Laravel\Response
	 */
	public function store($menuId)
	{
		$menu = $this->menus->findOrFail($menuId);
		$menuLink = $this->menuLinks;
		$menuLink->fill(Input::all());
		
		$validation = Validator::make(Input::all(), $menuLink->rules);

		if ($validation->fails())
		{
			return Redirect::action('Codesleeve\MenuLinksController@new', [$menuId])->withErrors($validation)->withInput();
		}

		if ($menu->menuLinks()->insert($menuLink))
		{
			Session::flash('success', 'Menu link successfully created');
			return Redirect::action('Codesleeve\MenuLinksController@edit', [$menuLink->id]);
		}
		
		return Redirect::action('Codesleeve\MenuLinksController@new', [$menuId])->withInput();
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
			return Redirect::action('Codesleeve\MenuLinksController@edit', [$id])->withErrors($validation)->withInput();
		}

		$menuLink->fill(Input::all());
		if ($menuLink->save()) 
		{
			Session::flash('success', 'Menu link successfully updated');
			return Redirect::action('Codesleeve\MenuLinksController@edit', [$id]);
		}

		Session::flash('success', 'Menu link update unsuccessful, please try again.');
		return Redirect::action('Codesleeve\MenuLinksController@edit', [$id]);
	}

	/**
	 * destroy method - Delete a specific menulink.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}
}