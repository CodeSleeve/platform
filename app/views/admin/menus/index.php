<div>
	<a class="btn success" href="<?=  action('Admin\MenusController@create') ?>">Create new Menu</a>
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
						<a href="<?= action('Admin\MenusController@edit', [$menu->id]) ?>" class="btn">Edit</a>
						<?= HTML::deleteLink(action('Admin\MenusController@destroy', [$menu->id])) ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif ?>
