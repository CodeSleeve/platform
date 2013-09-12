<h3>Editing user</h3>

<?= View::make('admin.users._form', ['user' => $user, 'action' => action('Admin\UsersController@update', [$user->id]), 'method' => 'PUT']) ?>