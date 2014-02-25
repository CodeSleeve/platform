
<ul class="breadcrumb">

	<li>
		<a href="<?= action("{$namespace}\HomeController@dashboard") ?>">Dashboard</a>
	</li>

	<?php foreach ($breadcrumbs as $breadcrumb): ?>

		<li class="<?= $breadcrumb->active ?>">
			<?php if ($breadcrumb->url): ?>
				<a href="<?= $breadcrumb->url ?>"><?= $breadcrumb->name ?></a>
			<?php else: ?>
				<?= $breadcrumb->name ?>
			<?php endif ?>
		</li>

	<?php endforeach ?>
</ul>