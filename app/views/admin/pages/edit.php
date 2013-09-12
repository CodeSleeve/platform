<h3>Editing Page</h3>

<?= View::make('admin.pages._form', ['page' => $page, 'action' => action('Admin\PagesController@update', [$page->id]), 'method' => 'PUT']) ?>