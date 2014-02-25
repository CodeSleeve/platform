<h3>
	<i class="fa fa-edit"></i> Editing Role
</h3>

<hr>

<?= render("{$viewpath}::roles._form", [
	'role' => $role,
	'action' => action("{$namespace}\RoleController@update", [$role->id]),
	'method' => 'PUT',
	'cancel' => action("{$namespace}\RoleController@index")
]) ?>