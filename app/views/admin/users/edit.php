<ul class="breadcrumb">
	<li>
		<a href="<?= action('Admin\HomeController@dashboard') ?>">Dashboard</a> <span class="divider">/</span>
	</li>
	
	<li class="active">
		<a href="<?= action('Admin\UsersController@index') ?>">Users</a> <span class="divider">/</span>
	</li>
		
	<li class="active">Edit</li>
</ul>

<h3>
	<i class="icon-edit"></i>
	Editing user
</h3><hr>

<?= View::make('admin.users._form', ['user' => $user, 'action' => action('Admin\UsersController@update', [$user->id]), 'method' => 'PUT']) ?>