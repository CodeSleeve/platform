<ul class="nav nav-sidebar">
	<?php if (can('update', 'Role')): ?>
		<li class="<?= active("{$namespace}\RoleController") ?>">
			<a href="<?= action("{$namespace}\RoleController@index") ?>">
				<i class="fa fa-eye-slash"></i>
				Roles
			</a>
		</li>
	<?php endif ?>

	<?php if (can('update', 'User')): ?>
		<li class="<?= active("{$namespace}\UserController") ?>">
			<a href="<?= action("{$namespace}\UserController@index") ?>">
				<i class="fa fa-group"></i>
				Users
			</a>
		</li>
	<?php endif ?>
</ul>
