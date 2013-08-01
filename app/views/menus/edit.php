<h3>Editing Menu</h3>

<?= View::make('menus._form', ['menu' => $menu, 'action' => action('MenusController@update', [$menu->id]), 'method' => 'PUT']) ?>