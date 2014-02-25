<?php namespace Codesleeve\Platform\Controllers;

use Codesleeve\Platform\Models\Menu;
use Codesleeve\Platform\Models\MenuLink;
use Codesleeve\Platform\Models\Page;
use Codesleeve\Platform\Validators\MenuLinkValidator;
use Input, Session, Redirect;

class MenuLinkController extends BaseController
{
	/**
	 * Create a new menulink controller
	 * 
	 * @param Menu     $menus
	 * @param Menulink $menuLinks
	 */
	public function __construct(Menu $menus, MenuLink $menuLinks, Page $pages, MenuLinkValidator $validator)
	{
		parent::__construct();

		$this->menus = $menus;
		$this->menuLinks = $menuLinks;
		$this->pages = $pages;
		$this->validator = $validator;
	}

	/**
	 * index method - View all of the menu links for a give menu
	 *
	 * @param  $menuId - The id of the menu the menu links belong to
	 * @return Laravel\Response
	 */
	public function index($menuId)
	{	
		$menu = $this->menus->findOrFail($menuId);
		$menuLinks = $menu->menuLinks()->paginate();

		$this->layout->nest('content', "{$this->viewpath}::menulinks.index", compact('menu', 'menuLinks'));
	}

	/**
	 * create method - Show the form to create a new menulink.
	 *
	 * @return Laravel\Response
	 */
	public function create($menuId)
	{
		$menu = $this->menus->findOrFail($menuId);

		$menuLink = $this->menuLinks->fill(Input::old());

		$menuLink->available_pages = $this->pages->lists('title', 'id');

		$this->layout->nest('content', "{$this->viewpath}::menulinks.create", compact('menu', 'menuLink'));
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

		$menuLink->page_id = Input::get('page_id', 0);

		$menuLink->menu_id = $menu->id;

		$maxOrder = $this->menuLinks->where('menu_id', $menu->id)->max('order');

		$menuLink->order = $maxOrder ?: 0;

		$this->validator->validate(Input::all(), $menuLink);
		
		$menuLink->save();

		Session::flash('success', 'Menu link successfully created');

		return Redirect::action("{$this->namespace}\MenuLinkController@index", [$menuId]);
	}

	/**
	 * edit method - Show the form to edit a specific menulink.
	 *
	 * @return  Laravel\Response
	 */
	public function edit($menuId, $linkId)
	{
		$menuLink = $this->menuLinks->findOrFail($linkId);

		$menuLink = $menuLink->fill(Input::old());

		$menuLink->available_pages = $this->pages->lists('title', 'id');

		$this->layout->nest('content', "{$this->viewpath}::menulinks.edit", compact('menuLink'));
	}

	/**
	 * update method - Update a menu link
	 *
	 * @param  $id - The id of the menu link being updated
	 * @return Laravel\Response
	 */
	public function update($menuId, $linkId)
	{
		$menuLink = $this->menuLinks->findOrFail($linkId);

		$menuLink->fill(Input::all());

		$menuLink->page_id = Input::get('page_id', 0);

		$this->validator->validate(Input::all(), $menuLink);
		
		$menuLink->save();

		Session::flash('success', 'Menu link successfully updated');

		return Redirect::action("{$this->namespace}\MenuLinkController@index", [$menuId]);
	}

	/**
	 * destroy method - Delete a specific menulink.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($menuId, $linkId)
	{
		$menuLink = $this->menuLinks->findOrFail($linkId);

		$menuLink->delete();

		Session::flash('success', "Menu link successfully removed");

		return Redirect::action("{$this->namespace}\MenuLinkController@index", [$menuId]);
	}
}