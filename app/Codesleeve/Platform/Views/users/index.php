<?php if(count($users) == 0): ?>
	<p>No users.</p>
<?php else: ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th><?= sort_table_by('email', 'Email') ?></th>
				<th><?= sort_table_by('first_name', 'First Name') ?></th>
				<th><?= sort_table_by('last_name', 'Last Name') ?></th>
				<th>
					<a class="pull-right btn btn-primary" href="<?=  action("{$namespace}\UserController@create") ?>">
						<i class="fa fa-plus"></i>
						New User
					</a>
				</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach($users as $user): ?>
				<tr>
					<td><?= $user->email ?></td>
					<td><?= $user->first_name ?></td>
					<td><?= $user->last_name ?></td>
					<td>
						<a href="<?= action("{$namespace}\UserController@edit", [$user->id]) ?>">
							<i class="fa fa-edit large-icon"></i>
						</a>

						<a href="<?= action("{$namespace}\UserController@destroy", [$user->id]) ?>" data-method="delete">
							<i class="fa fa-times large-icon"></i>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<div class="text-center">
		<?= $users->links() ?>
	</div>
<?php endif ?>
