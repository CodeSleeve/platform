<?= Form::open(['url' => $action, 'method' => $method, 'class' => 'form']) ?>

	<div class="form-group">
		<label for="name">Name</label>

		<input type="text" name="name" class="form-control" placeholder="Name" value="<?= $role->name ?>">

		<?= show_message_when('name', $errors) ?>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		or <a href="<?= $cancel ?>">Cancel</a>
	</div>

<?= Form::close(); ?>