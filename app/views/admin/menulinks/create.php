<h3>Creating Menulink</h3>

<?= View::make('admin.menulinks._form', ['menuLink' => $menuLink, 'action' => action('Admin\MenuLinksController@store', [$menu->id]), 'method' => 'POST']) ?>