<div><a class="btn success" href="<?=  action('menulinks@new', [$menu->id]) ?>">Create New Menulink</a></div>

<?php if (count($menulinks) == 0): ?>
	<p>No menulinks.</p>
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
			<?php foreach($menulinks as $menulink): ?>
				<tr>
					<td><?= $menulink->page_id ?></td>
					<td><?= $menulink->page_id ?></td>
					<td><?= $menulink->title ?></td>
					<td><?= $menulink->url ?></td>
					<td>
						<a href="<?= action('menulinks@show', [$menulink->id]) ?>" class="btn">View</a>
						<a href="<?= action('menulinks@edit', [$menulink->id]) ?>" class="btn">Edit</a>
						<?= HTML::deleteLink(action('menulinks@destroy', [$menulink->id])) ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>
