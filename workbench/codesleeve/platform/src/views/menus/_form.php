<?= Form::open(['url' => $action, 'method' => $method, 'class' => 'form-horizontal form']) ?>

	<div class="control-group ">
		<?= Form::label('title', 'Title', ['class' => 'control-label']) ?>
		<?= Form::text('title', Input::old('title', $menu->title)) ?>
		<?= show_message_when('title', $errors) ?>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		or <a href="<?= $cancel ?>">Cancel</a>
	</div>

<?= Form::close() ?>