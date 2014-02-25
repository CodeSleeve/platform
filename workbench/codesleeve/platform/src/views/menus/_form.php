<?= Form::open(['url' => $action, 'method' => $method, 'class' => 'form-horizontal form']) ?>

	<div class="form-group">
		<?= Form::label('title', 'Title') ?>
		<?= Form::text('title', $menu->title, ['class' => 'form-control']) ?>
		<?= show_message_when('title', $errors) ?>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		or <a href="<?= $cancel ?>">Cancel</a>
	</div>

<?= Form::close() ?>