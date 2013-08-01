<h3>Creating Page</h3>

<?= View::make('pages._form', ['page' => $page, 'action' => action('PagesController@store'), 'method' => 'POST']) ?>