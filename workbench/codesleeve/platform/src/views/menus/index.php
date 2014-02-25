
<div class="row">
	<div class="col-xs-12">
		<a class="btn btn-primary pull-right" href="<?=  action("{$namespace}\MenuController@create") ?>">
			<i class="fa fa-plus"></i>
			Create New Menu
		</a>
	</div>
</div>

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
						<a href="<?= action("{$namespace}\MenuController@edit", [$menu->id]) ?>" class="btn btn-warning">
							<i class="fa fa-edit"></i>
						</a>
						
						<a href="<?= action("{$namespace}\MenuController@destroy", [$menu->id]) ?>" class="btn btn-danger" data-method="delete">
							<i class="fa fa-times"></i>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>
