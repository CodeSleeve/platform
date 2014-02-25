<?php namespace Codesleeve\Platform\Controllers;

use Codesleeve\Platform\Models\Page;
use Codesleeve\Platform\Validators\PageValidator;
use View, Input, Auth, Session, Redirect, Response, App, Validator;

class PageController extends BaseController
{
	/**
	 * Keeps track of the pages eloquent model for us
	 * 
	 * @var Eloquent\Model
	 */
	private $pages;

	/**
	 * Create a new pages controller
	 * 
	 * @param Page $pages
	 */
	public function __construct(Page $pages, PageValidator $validator)
	{
		parent::__construct();

		$this->pages = $pages;
		$this->validator = $validator;
	}

	/**
	 * View all of the pages.
	 *
	 * @return void
	 */
	public function index()
	{
		$pages = $this->pages->paginate();

		$this->layout->nest('content', "{$this->viewpath}::pages.index", compact('pages'));
	}

	/**
	 * Show the form to create a new page.
	 *
	 * @return void
	 */
	public function create()
	{
		$page = $this->pages->fill(Input::old());

		$this->layout->nest('content', "{$this->viewpath}::pages.create", compact('page'));
	}

	/**
	 * Show the form to edit a specific page.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function edit($id)
	{
		$page = $this->pages->findOrFail($id);

		$page = $page->fill(Input::old());

		$this->layout->nest('content', "{$this->viewpath}::pages.edit", compact('page'));
	}

	/**
	 * Show a specific page.
	 *
	 * @param  string $slug
	 * @return void
	 */
	public function show($slug)
	{
		$page = $this->pages->find($slug);

		if (!$page)
		{
			list($id, $title) = preg_split('/-/', $slug, 2);
  			$page = $this->pages->find($id);
		}

		if (!$page)
		{
  			$page = $this->pages->where('slug', $slug)->first();
		}
	
  		if (!$page) {
			return Response::error('404');
		}

		$this->layout = "{$this->viewpath}::layouts.pages";

		$this->setupLayout();

		$this->layout->nest('content', "{$this->viewpath}::pages.show", compact('page'));
	}

	/**
	 * Create a new page.
	 *
	 * @return Response
	 */
	public function store()
	{
		$page = $this->pages->fill(Input::all());

		$page->home_page = Input::get('home_page', false);

		$this->validator->validate(Input::all(), $page);

		$page->save();

		Session::flash('success', 'Added page #'.$page->id);

		return Redirect::action("{$this->namespace}\PageController@index");
	}

	/**
	 * Edit a specific page.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		$page = $this->pages->findOrFail($id);

		$page->fill(Input::all());

 		$page->home_page = Input::get('home_page', false);

		$this->validator->validate(Input::all(), $page);

		$page->save();

		Session::flash('success', 'Updated page #'.$page->id);

		return Redirect::action("{$this->namespace}\PageController@index");
	}

	/**
	 * Delete a specific page.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$page = App::make('Page')->findOrFail($id);
		
		$page->delete();

		Session::flash('success', 'Deleted page #'.$page->id);

		return Redirect::action("{$this->namespace}\PageController@index");
	}
}