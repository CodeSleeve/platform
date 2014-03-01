
<div class="row">
	<div class="col-xs-12">
		<a class="btn btn-primary pull-right" href="<?=  action("{$namespace}\RoleController@create") ?>">
			<i class="fa fa-plus"></i>
			Create New Role
		</a>
	</div>
</div>

<hr>

<?php if(count($roles) == 0): ?>
	<p>No Roles.</p>
<?php else: ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Role Id</th>
				<th>Role Name</th>
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
<?php endif ?>
