<?= Form::open(['url' => $action, 'method' => $method, 'class' => 'form-horizontal span12']) ?>
	
	<div class="control-group ">
		<label for="title" class="control-label">Title</label>
		
		<div class="controls">
			<?= Form::text('title', Input::old('title', $menuLink->title)) ?>
			<?php if ($errors->has('title')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('title') ?></span>
			<?php endif ?>
		</div>
	</div>
	
	<div class="control-group ">
		<label for="page_id" class="control-label">Page</label>

		<div class="controls">
			<?= Form::select('page_id', Page::lists('title', 'id'), Input::old('page_id', $menuLink->page_id)) ?>
			<?php if ($errors->has('page_id')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('page_id') ?></span>
			<?php endif ?>
		</div>
	</div>

	<div class="control-group ">
		<label for="url" class="control-label">URL</label>

		<div class="controls">
			<?= Form::text('url', Input::old('url', $menuLink->url)) ?>
			<?php if ($errors->has('url')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('url') ?></span>
			<?php endif ?>
		</div>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		or <a href="<?= action('Admin\MenuLinksController@index', [$menuLink->menu_id]) ?>">Cancel</a>
	</div>
<?= Form::close() ?>