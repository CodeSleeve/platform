<h3>
	<i class="fa fa-edit"></i>
	Editing Menu
</h3>

<?= render("{$viewpath}::menus._form", [
	'menu' => $menu,
	'action' => action("{$namespace}\MenuController@update", [$menu->id]),
	'method' => 'PUT',
	'cancel' => action("{$namespace}\MenuController@index"),
]) ?>