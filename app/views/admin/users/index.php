<ul class="breadcrumb">
	<li>
		<a href="<?= action('Admin\HomeController@dashboard') ?>">Dashboard</a> <span class="divider">/</span>
	</li>
	
	<li class="active">Users</li>
</ul>

<div>
	<a class="btn btn-primary" href="<?=  action('Admin\UsersController@create') ?>">
		<i class="icon-plus"></i>
		Create New User
	</a>
</div><hr>

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
						<a href="<?= action('Admin\UsersController@edit', [$user->id]) ?>" class="btn">
							<i class="icon-edit"></i>
							Edit
						</a>
						
						<a href="<?= action('Admin\UsersController@destroy', [$user->id]) ?>" class="btn btn-danger" data-method="delete">
							<i class="icon-remove"></i>
							Delete
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>
