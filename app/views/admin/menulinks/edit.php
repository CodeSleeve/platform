<h3>Editing Menulink</h3>

<?= View::make('admin.menulinks._form', ['menulink' => $menulink, 'action' => action('MenuLinksController@update', [$menulink->id]), 'method' => 'PUT']) ?>