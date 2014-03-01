<ul class="nav nav-sidebar">
	<?php if (can('view', 'Dashboard')): ?>
		<li class="<?= active("{$namespace}\HomeController") ?>">
			<a href="<?= action("{$namespace}\HomeController@dashboard") ?>">
				<i class="fa fa-dashboard"></i>
				<span style="font-size: 9px;">Dashboard</span>
			</a>
		</li>
	<?php endif ?>

	<?php if (can('update', 'Role')): ?>
		<li class="<?= active("{$namespace}\RoleController") ?>">
			<a href="<?= action("{$namespace}\RoleController@index") ?>">
				<i class="fa fa-eye-slash"></i>
				<span style="font-size: 9px;">Roles</span>
			</a>
		</li>
	<?php endif ?>

	<?php if (can('update', 'User')): ?>
		<li class="<?= active("{$namespace}\UserController") ?>">
			<a href="<?= action("{$namespace}\UserController@index") ?>">
				<i class="fa fa-group"></i>
				<span style="font-size: 9px;">Users</span>
			</a>
		</li>
	<?php endif ?>
</ul>
