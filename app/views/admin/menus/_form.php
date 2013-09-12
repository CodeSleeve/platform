<?= Form::open(['url' => $action, 'method' => $method, 'class' => 'form-horizontal span12']) ?>
	<?= Form::token() ?>

	<div class="control-group ">
		<?= Form::label('title', 'Title', ['class' => 'control-label']) ?>

		<div class="controls">
			<?= Form::text('title', Input::old('title', $menu->title)) ?>
			<?php if ($errors->has('title')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('title') ?></span>
			<?php endif ?>
		</div>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn primary']) ?>

		or <a href="<?= action('Admin\MenusController@index') ?>">Cancel</a>
	</div>
<?= Form::close() ?>