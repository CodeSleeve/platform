<h3>
	<i class="fa fa-plus"></i>
	Creating User
</h3><hr>

<?= render("{$viewpath}::users._form", [
	'user' => $user,
	'action' => action("{$namespace}\UserController@store"),
	'method' => 'POST',
	'cancel' => action("{$namespace}\UserController@index")
]) ?>