<div><a class="btn success" href="<?=  action('UsersController@create') ?>">Create new user</a></div>

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
					<td><?= $user->email; ?></td>
					<td><?= $user->first_name; ?></td>
					<td><?= $user->last_name; ?></td>
					<td>
						<a href="<?= action('UsersController@edit', [$user->id]); ?>" class="btn">Edit</a>
						<?= HTML::deleteLink(action('UsersController@destroy', [$user->id])) ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>
