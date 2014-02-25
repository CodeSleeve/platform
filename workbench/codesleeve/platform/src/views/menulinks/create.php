<h3>
	<i class="fa fa-plus"></i>
	Creating Link
</h3>

<?= render("{$viewpath}::menulinks._form", [
	'menu' => $menu,
	'menuLink' => $menuLink,
	'action' => action("{$namespace}\MenuLinkController@store", [$menu->id]),
	'method' => 'POST',
	'cancel' => action("{$namespace}\MenuLinkController@index", [$menu->id]),
]) ?>