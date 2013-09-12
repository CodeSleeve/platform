<?= Form::open(['url' => $action, 'method' => $method, 'class' => 'form-horizontal span12']) ?>
	<?= Form::token() ?>

	<div class="control-group ">
		<label for="title" class="control-label">Title</label>
		
		<div class="controls">
			<?= Form::text('title', Input::old('title', $menulink->title)) ?>
			<?php if ($errors->has('title')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('title') ?></span>
			<?php endif ?>
		</div>
	</div>
	
	<div class="control-group ">
		<label for="page_id" class="control-label">Page</label>

		<div class="controls">
			<?= Form::select('page_id', Page::lists('title', 'id'), Input::old('page_id', $menulink->page_id)) ?>
			<?php if ($errors->has('page_id')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('page_id') ?></span>
			<?php endif ?>
		</div>
	</div>

	<div class="control-group ">
		<label for="url" class="control-label">URL</label>

		<div class="controls">
			<?= Form::text('url', Input::old('url', $menulink->url)) ?>
			<?php if ($errors->has('url')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('url') ?></span>
			<?php endif ?>
		</div>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		or <a href="<?= action('menulinks@index', [$menulink->menu_id,$menulink->_id,]) ?>">Cancel</a>
	</div>
<?= Form::close() ?>