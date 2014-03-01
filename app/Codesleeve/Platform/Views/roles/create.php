<h3>
	<i class="icon-plus"></i>
	Creating Role
</h3><hr>

<?= render("platform::roles._form", [
	'role' => $role,
	'action' => action("{$namespace}\RoleController@store"),
	'method' => 'POST',
	'cancel' => action("{$namespace}\RoleController@index")
]) ?>