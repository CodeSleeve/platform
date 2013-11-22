<ul class="nav nav-pills nav-stacked">
	<li class="nav-header">
		Actions
	</li><hr>

	<?php if (Authority::can('update', 'Page')): ?>
		<li class="<?= active('Admin\PagesController') ?>">
			<a href="<?= action('Admin\PagesController@index') ?>">
				<i class="icon-file"></i>
				Pages
			</a>
		</li>
	<?php endif ?>

	<?php if (Authority::can('update', 'Menu')): ?>	
		<li class="<?= active('Admin\MenusController') ?>">
			<a href="<?= action('Admin\MenusController@index') ?>">
				<i class="icon-link"></i>
				Menus
			</a>
		</li>
	<?php endif ?>

	<?php if (Authority::can('update', 'User')): ?>
		<li class="<?= active('Admin\UsersController') ?>">
			<a href="<?= action('Admin\UsersController@index') ?>">
				<i class="icon-group"></i>
				Users
			</a>
		</li>
	<?php endif ?>
</ul>