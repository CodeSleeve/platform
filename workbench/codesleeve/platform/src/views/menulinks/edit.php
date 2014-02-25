<h3>
	<i class="fa fa-edit"></i>
	Editing Link
</h3>

<?= render("{$viewpath}::menulinks._form", [
	'menuLink' => $menuLink,
	'action' => action("{$namespace}\MenuLinkController@update", [$menuLink->menu_id, $menuLink->id]),
	'method' => 'PUT',
	'cancel' => action("{$namespace}\MenuLinkController@index", [$menuLink->menu_id]),
]) ?>