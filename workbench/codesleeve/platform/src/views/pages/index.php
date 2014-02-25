
<div class="row">
	<div class="col-xs-12">
		<a class="btn btn-primary pull-right" href="<?= action("{$namespace}\PageController@create") ?>">
			<i class="fa fa-plus"></i>
			Create New Page
		</a>
	</div>
</div>


<?php if(count($pages) == 0): ?>
	<p>No pages.</p>
<?php else: ?>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Title</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($pages as $page): ?>
				<tr>
					<td><?= $page->title ?></td>
					<td><?= $page->created_at ?></td>
					<td><?= $page->updated_at ?></td>
					<td>
						<a href="<?= action("{$namespace}\PageController@show", [$page->id]) ?>" class="btn btn-success" target="_blank">
							<i class="fa fa-search"></i>
						</a>
						
						<a href="<?= action("{$namespace}\PageController@edit", [$page->id]) ?>" class="btn btn-warning">
							<i class="fa fa-edit"></i>
						</a>
						
						<a href="<?= action("{$namespace}\PageController@destroy", [$page->id]) ?>" class="btn btn-danger" data-method="delete">
							<i class="fa fa-times"></i>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	
	<?= $pages->links() ?>
<?php endif ?>