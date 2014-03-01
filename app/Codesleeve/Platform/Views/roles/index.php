<?php if(count($roles) == 0): ?>
	<p>No Roles.</p>
<?php else: ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th><?= sort_table_by('role_id', 'Role Id') ?></th>
				<th><?= sort_table_by('name', 'Role Name') ?></th>
				<th>
					<a class="btn btn-primary pull-right" href="<?=  action("{$namespace}\RoleController@create") ?>">
						<i class="fa fa-plus"></i>
						New Role
					</a>
				</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($roles as $role): ?>
				<tr>
					<td><?= $role->id ?></td>
					<td><?= $role->name ?></td>
					<td>
						<a href="<?= action("{$namespace}\RoleController@edit", [$role->id]) ?>">
							<i class="fa fa-edit large-icon"></i>
						</a>

						<a href="<?= action("{$namespace}\RoleController@destroy", [$role->id]) ?>" data-method="delete">
							<i class="fa fa-times large-icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<div class="text-center">
		<?= $roles->links() ?>	
	</div>
<?php endif ?>
