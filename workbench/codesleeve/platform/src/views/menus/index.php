<ul class="breadcrumb">
	<li>
		<a href="<?= action('Admin\HomeController@dashboard') ?>">Dashboard</a> <span class="divider">/</span>
	</li>
	
	<li class="active">Menus</li>
</ul>

<div>
	<a class="btn btn-primary" href="<?=  action('Admin\MenusController@create') ?>">
		<i class="icon-plus"></i>
		Create New Menu
	</a>
</div><hr>

<?php if(count($menus) == 0): ?>
	<p>No menus.</p>
<?php else: ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($menus as $menu): ?>
				<tr>
					<td><?= $menu->title; ?></td>
					<td>
						<a href="<?= action('Admin\MenusController@edit', [$menu->id]) ?>" class="btn">
							<i class="icon-edit"></i>
							Edit
						</a>
						
						<a href="<?= action('Admin\MenusController@destroy', [$menu->id]) ?>" class="btn btn-danger" data-method="delete">
							<i class="icon-remove"></i>
							Delete
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>
