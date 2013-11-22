<?php

class PagesController extends BaseController {

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
	
}