<ul class="nav nav-sidebar">

	<?php
	/* 
		configured in app/config/platform.php ... 
		Config::get('platform.navigation')

		This allows other packages to tap into the
		navigation bar via Navigation::add(...)
	*/
	?>
	<?php foreach($navigation as $nav): ?>

		<?php if ($nav->shown): ?>
			<li class="<?= $nav->active ?>">
				<a href="<?= $nav->url ?>">
					<i class="fa <?= $nav->icon ?>"></i>
					<span style="font-size: 9px;"><?= $nav->title ?></span>
				</a>
			</li>
		<?php endif ?>

	<?php endforeach ?>

</ul>
