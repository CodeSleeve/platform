<h3>Editing Page</h3>

<?= View::make('pages._form', ['page' => $page, 'action' => action('PagesController@update', [$page->id]), 'method' => 'PUT']) ?>