<div><a class="btn success" href="<?=  action('Admin\MenuLinksController@create', [$menu->id]) ?>">Create New Menulink</a></div>

<?php if (count($menuLinks) == 0): ?>
	<p>This menu has no links.</p>
<?php else: ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Page Id</th>
				<th>Title</th>
				<th>Url</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($menuLinks as $menuLink): ?>
				<tr>
					<td><?= $menuLink->page_id ?></td>
					<td><?= $menuLink->page_id ?></td>
					<td><?= $menuLink->title ?></td>
					<td><?= $menuLink->url ?></td>
					<td>
						<a href="<?= action('Admin\MenuLinksController@show', [$menuLink->id]) ?>" class="btn">View</a>
						<a href="<?= action('Admin\MenuLinksController@edit', [$menuLink->id]) ?>" class="btn">Edit</a>
						<?= HTML::deleteLink(action('MenuLinksController@destroy', [$menuLink->id])) ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>
