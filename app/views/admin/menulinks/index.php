<ul class="breadcrumb">
	<li>
		<a href="<?= action('Admin\PagesController@dashboard') ?>">Dashboard</a> <span class="divider">/</span>
	</li>
	
	<li class="active">Menu Links</li>
</ul>

<div>
	<a class="btn btn-primary" href="<?=  action('Admin\MenuLinksController@create', [$menu->id]) ?>">
		<i class="icon-plus"></i>
		Create New Menulink
	</a>
</div><hr>

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
						<a href="<?= action('Admin\MenuLinksController@edit', [$menuLink->id]) ?>" class="btn">
							<i class="icon-edit"></i>
							Edit
						</a>
						
						<?= HTML::deleteLink(action('MenuLinksController@destroy', [$menuLink->id])) ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>
