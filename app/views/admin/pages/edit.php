<ul class="breadcrumb">
	<li>
		<a href="<?= action('Admin\HomeController@dashboard') ?>">Dashboard</a> <span class="divider">/</span>
	</li>
	
	<li class="active">
		<a href="<?= action('Admin\PagesController@index') ?>">Pages</a> <span class="divider">/</span>
	</li>
		
	<li class="active">Edit</li>
</ul>

<h3>
	<i class="icon-edit"></i>
	Editing Page
</h3><hr>

<?= View::make('admin.pages._form', ['page' => $page, 'action' => action('Admin\PagesController@update', [$page->id]), 'method' => 'PUT']) ?>