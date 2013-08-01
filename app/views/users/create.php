<h3>Creating user</h3>

<?= View::make('users._form', ['user' => $user, 'action' => action('UsersController@store'), 'method' => 'POST']) ?>