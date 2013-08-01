<h3>Creating Menu</h3>

<?= View::make('menus._form', ['menu' => $menu, 'action' => action('MenusController@store'), 'method' => 'POST']) ?>