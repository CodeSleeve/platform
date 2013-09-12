<h3>Editing Menulink</h3>

<?= View::make('admin.menulinks._form', ['menuLink' => $menuLink, 'action' => action('Admin\MenuLinksController@update', [$menuLink->id]), 'method' => 'PUT']) ?>