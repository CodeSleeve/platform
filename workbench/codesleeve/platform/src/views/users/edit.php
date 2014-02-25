<h3>
	<i class="fa fa-edit"></i> Editing user
</h3>

<hr>

<?= render("{$viewpath}::users._form", [
	'user' => $user,
	'action' => action("{$namespace}\UserController@update", [$user->id]),
	'method' => 'PUT',
	'cancel' => action("{$namespace}\UserController@index")
]) ?>