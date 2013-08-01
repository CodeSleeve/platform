<?php

class MenuLinksController extends BaseController {

	/**
	 * index method - View all of the menulinks for a give menu
	 *
	 * @param  $menuId - The id of the menu the menu links belong to
	 * @return Laravel\Response
	 */
	public function index($menuId)
	{	
		$menu = App::make('Menu')->findOrFail($menuId);
		$menulinks = $menu->menuLinks()->paginate();

		$this->layout->nest('content', 'menulinks.index', compact('menulinks', 'menuId', '_id'));
	}

	/**
	 * create method - Show the form to create a new menulink.
	 *
	 * @return Laravel\Response
	 */
	public function create($menuId)
	{
		$menu = App::make('Menu')->findOrFail($menuId);
		$menulink = App::make('Menulink');

		$this->layout->nest('content', 'menulinks.new', compact('menu', 'menulink'));
	}

	/**
	 * edit method - Show the form to edit a specific menulink.
	 *
	 * @param  int   $id
	 * @return  Laravel\Response
	 */
	public function edit($id)
	{
		$menulink = App::make('MenuLink')->findOrFail($id);
		$this->layout->nest('content', 'menulinks.edit', compact('menulink'));
	}

	/**
	 * store method - Create a new menulink.
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