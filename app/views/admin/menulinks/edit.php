<ul class="breadcrumb">
	<li>
		<a href="<?= action('Admin\PagesController@dashboard') ?>">Dashboard</a> <span class="divider">/</span>
	</li>
	
	<li class="active">
		<a href="<?= action('Admin\MenuLinksController@index') ?>">Menu Links</a> <span class="divider">/</span>
	</li>
		
	<li class="active">Edit</li>
</ul>

<h3>
	<i class="icon-edit"></i>
	Editing Menulink
</h3><hr>

<?= View::make('admin.menulinks._form', ['menuLink' => $menuLink, 'action' => action('Admin\MenuLinksController@update', [$menuLink->id]), 'method' => 'PUT']) ?>