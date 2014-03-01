
<div class="row">
	<div class="col-xs-12">
		<a class="pull-right btn btn-primary" href="<?=  action("{$namespace}\UserController@create") ?>">
			<i class="fa fa-plus"></i>
			Create New User
		</a>
	</div>
</div>

<hr>

<?php if(count($users) == 0): ?>
	<p>No users.</p>
<?php else: ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Actions</th>
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
<?php endif ?>
