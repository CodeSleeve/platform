<?= Form::open(['url' => $action, 'method' => $method]) ?>
	<?= Form::token() ?>
	
	<div class="control-group">
		<label for="title" class="control-label">Title</label>
		<div class="controls">
			<?= Form::text('title', Input::old('title', $page->title)) ?>
		</div>
	</div>

	<div class="control-group">
		<label for="slug" class="control-label">Slug</label>
		<div class="controls">
			<span>/ pages /</span> <?= Form::text('slug', Input::old('slug', $page->slug)) ?>
		</div>
	</div>
	
	<div class="control-group">
		<label class="checkbox">
			<?php if ($page->home_page): ?>
				<?= Form::checkbox('home_page', '1', true) ?>
			<?php else: ?>
				<?= Form::checkbox('home_page', '1') ?>
			<?php endif ?>
			Set as Homepage
		</label>
	</div>

	<div class="control-group ">
		<label for="content" class="control-label">Content</label>
		<div class="controls">
			<?= Form::textarea('content', Input::old('content', $page->content), ['class' => 'span10 content']); ?>
			<?php if ($errors->has('content')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('content') ?></span>
			<?php endif ?>
		</div>
	</div>
	

	<div class="actions">
		<?= Form::submit('Save', array('class' => 'btn btn-primary')); ?>

		or <a href="<?= action('Admin\PagesController@index', []); ?>">Cancel</a>
	</div>
<?= Form::close(); ?>