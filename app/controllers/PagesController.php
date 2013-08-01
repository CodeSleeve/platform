<?php

class PagesController extends BaseController {

	/**
	 * View all of the pages.
	 *
	 * @return void
	 */
	public function index()
	{
		$page = App::make('Page');
		$pages = $page->paginate();

		$this->layout->nest('content', 'pages.index', compact('pages'));
	}

	/**
	 * Show the form to create a new page.
	 *
	 * @return void
	 */
	public function create()
	{
		$page = App::make('Page');

		$this->layout->nest('content', 'pages.create', compact('page'));
	}

	/**
	 * Show a specific page.
	 *
	 * @param  string $slug
	 * @return void
	 */
	public function show($slug)
	{
		if (is_numeric($slug)) {
			$page = App::make('Page')->find($slug);
		}
		else {
			list($id, $title) = preg_split('/-/', $slug, 2);
  			$page = App::make('Page')->find($id);
		}
	
  		if (!$page) {
			return Response::error('404');
		}

		$this->layout->nest('content', 'pages.show', compact('page'));
	}

	/**
	 * Show the form to edit a specific page.
	 *
	 * @param  int $id
	 * @return void
	 */
	public function edit($id)
	{
		$page = App::make('Page')->findOrFail($id);

		$this->layout->nest('content', 'pages.edit', compact('page'));
	}

	/**
	 * Create a new page.
	 *
	 * @return Response
	 */
	public function store()
	{
		$page = App::make('Page');
		$page->fill(Input::all());
		$validation = Validator::make(Input::all(), $page->rules);

		if ($validation->passes())
		{
			$page->save();
			Session::flash('success', 'Added page #'.$page->id);

			return Redirect::action('PagesController@index');
		}

		return Redirect::action('PagesController@new')->withErrors($validation)->withInput();
	}

	/**
	 * Edit a specific page.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function update($id)
	{
		$page = App::make('Page')->findOrFail($id);
		$validation = Validator::make(Input::all(), $page->rules);

		if ($validation->passes())
		{
			$page->fill(Input::all());
			$page->save();

			Session::flash('success', 'Updated page #'.$page->id);

			return Redirect::action('PagesController@index');
		}
		
		return Redirect::action('PagesController@edit', [$page->id])->withErrors($validation)->withInput();
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
		
		if ($page->delete())
		{
			Session::flash('success', 'Deleted page #'.$page->id);

			return Redirect::action('PagesController@index', []);
		}
		
		Session::flash('failure', 'Unable to delele page #' . $page->id . ', please try again.');
		return Redirect::action('PagesController@edit', [$page->id]);
	}
}