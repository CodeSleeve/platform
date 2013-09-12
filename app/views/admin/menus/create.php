<h3>Creating Menu</h3>

<?= View::make('admin.menus._form', ['menu' => $menu, 'action' => action('Admin\MenusController@store'), 'method' => 'POST']) ?>