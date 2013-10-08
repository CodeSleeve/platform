<ul class="breadcrumb">
	<li>
		<a href="<?= action('Admin\HomeController@dashboard') ?>">Dashboard</a> <span class="divider">/</span>
	</li>
	
	<li class="active">
		<a href="<?= action('Admin\MenuLinksController@index') ?>">Menu Links</a> <span class="divider">/</span>
	</li>
		
	<li class="active">Create</li>
</ul>

<h3>
	<i class="icon-plus"></i>
	Creating Menulink
</h3><hr>

<?= View::make('admin.menulinks._form', ['menuLink' => $menuLink, 'action' => action('Admin\MenuLinksController@store', [$menu->id]), 'method' => 'POST']) ?>