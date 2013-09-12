<h3>Editing Menu</h3>

<?= View::make('admin.menus._form', ['menu' => $menu, 'action' => action('Admin\MenusController@update', [$menu->id]), 'method' => 'PUT']) ?>