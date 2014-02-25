<h3>
	<i class="fa fa-plus"></i>
	Creating Menu
</h3>

<?= render("{$viewpath}::menus._form", [
	'menu' => $menu,
	'action' => action("{$namespace}\MenuController@store"),
	'method' => 'POST',
	'cancel' => action("{$namespace}\MenuController@index"),
]) ?>