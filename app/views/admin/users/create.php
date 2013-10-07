<ul class="breadcrumb">
	<li>
		<a href="<?= action('Admin\PagesController@dashboard') ?>">Dashboard</a> <span class="divider">/</span>
	</li>
	
	<li class="active">
		<a href="<?= action('Admin\UsersController@index') ?>">Users</a> <span class="divider">/</span>
	</li>
		
	<li class="active">Create</li>
</ul>

<h3>
	<i class="icon-plus"></i>
	Creating User
</h3><hr>

<?= View::make('admin.users._form', ['user' => $user, 'action' => action('Admin\UsersController@store'), 'method' => 'POST']) ?>