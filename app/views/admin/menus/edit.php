<ul class="breadcrumb">
	<li>
		<a href="<?= action('Admin\HomeController@dashboard') ?>">Dashboard</a> <span class="divider">/</span>
	</li>
	
	<li class="active">
		<a href="<?= action('Admin\MenusController@index') ?>">Menus</a> <span class="divider">/</span>
	</li>
		
	<li class="active">Edit</li>
</ul>

<h3>
	<i class="icon-edit"></i>
	Editing Menu
</h3><hr>

<?= View::make('admin.menus._form', ['menu' => $menu, 'action' => action('Admin\MenusController@update', [$menu->id]), 'method' => 'PUT']) ?>