
<div class="row">
	<div class="col-xs-12">
		<a class="btn btn-primary pull-right" href="<?=  action("${namespace}\MenuLinkController@create", [$menu->id]) ?>">
			<i class="fa fa-plus"></i>
			Create New Link
		</a>
	</div>
</div>

<?php if (count($menuLinks) == 0): ?>
	<p>This menu has no links.</p>
<?php else: ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Url</th>
				<th>Actions</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($menuLinks as $menuLink): ?>
				<tr>
					<td><?= $menuLink->title ?></td>
					<td><a href="<?= $menuLink->menu_url ?>" target="_blank"><?= $menuLink->menu_url ?></a></td>
					<td>
						<a href="<?= action("${namespace}\MenuLinkController@edit", [$menu->id, $menuLink->id]) ?>" class="btn btn-warning">
							<i class="fa fa-edit"></i>
							Edit
						</a>
						
						<a href="<?= action("${namespace}\MenuLinkController@destroy", [$menu->id, $menuLink->id]) ?>" class="btn btn-danger" data-method="delete">
							<i class="fa fa-remove"></i>
							Delete
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>
