<h3>Creating user</h3>

<?= View::make('admin.users._form', ['user' => $user, 'action' => action('Admin\UsersController@store'), 'method' => 'POST']) ?>