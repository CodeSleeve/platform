<h3>Creating Page</h3>

<?= View::make('admin.pages._form', ['page' => $page, 'action' => action('Admin\PagesController@store'), 'method' => 'POST']) ?>