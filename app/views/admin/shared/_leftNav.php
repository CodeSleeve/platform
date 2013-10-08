<ul class="nav nav-pills nav-stacked">
	<li class="nav-header">
		Actions
	</li><hr>
		
	<?php if (Authority::can('update', 'Page')): ?>
		<li <?= $currentController == 'Admin\PagesController' ? 'class="active"' : null ?>>
			<a href="<?= action('Admin\PagesController@index') ?>">
				<i class="icon-file"></i>
				Pages
			</a>
		</li>
	<?php endif ?>
	
	<li <?= $currentController == 'Admin\MenusController' ? 'class="active"' : null ?>>
		<a href="<?= action('Admin\MenusController@index') ?>">
			<i class="icon-link"></i>
			Menus
		</a>
	</li>
	
	<?php if (Authority::can('update', 'User')): ?>
		<li <?= $currentController == 'Admin\UsersController' ? 'class="active"' : null ?>>
			<a href="<?= action('Admin\UsersController@index') ?>">
				<i class="icon-group"></i>
				Users
			</a>
		</li>
	<?php endif ?>
</ul>