<h3>Editing user</h3>

<?= View::make('users._form', ['user' => $user, 'action' => action('UsersController@update', [$user->id]), 'method' => 'PUT']) ?>