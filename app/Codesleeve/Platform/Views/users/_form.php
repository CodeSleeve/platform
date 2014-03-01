<?= Form::open(['url' => $action, 'method' => $method, 'class' => 'form']) ?>

	<div class="form-group">
		<label for="first_name">First Name</label>

		<input type="text" name="first_name" class="form-control" placeholder="First name" value="<?= $user->first_name ?>">

		<?= show_message_when('first_name', $errors) ?>
	</div>

	<div class="form-group">
		<label for="last_name">Last Name</label>

		<input type="text" name="last_name" class="form-control" placeholder="Last name" value="<?= $user->last_name ?>">

		<?= show_message_when('last_name', $errors) ?>
	</div>

	<div class="form-group">
		<label for="email">Email</label>

		<input type="text" name="email" class="form-control" placeholder="Email" value="<?= $user->email ?>">

		<?= show_message_when('email', $errors) ?>
	</div>

	<div class="form-group">
		<label for="password">Password</label>

		<input type="password" name="password" class="form-control" placeholder="Password">

		<?= show_message_when('password', $errors) ?>
	</div>

	<div class="form-group">
		<label for="password">Confirm Password</label>

		<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">

		<?= show_message_when('password_confirmation', $errors) ?>
	</div>

	<div class="form-group">
		<label for="role_ids[]">Roles</label>

		<?= Form::select('role_ids[]', $user->available_roles, $user->selected_roles, ['class' => 'chosen form-control', 'multiple']) ?>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		or <a href="<?= $cancel ?>">Cancel</a>
	</div>

<?= Form::close(); ?>