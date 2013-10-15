<?= Form::open(['url' => $action, 'method' => $method, 'class' => 'form-horizontal span12']) ?>
	<?= Form::token() ?>
	
	<div class="control-group ">
		<label for="role_ids[]" class="control-label">Roles</label>

		<div class="controls">
			<?= Form::select('role_ids[]', Role::lists('name', 'id'), $user->roles()->select('roles.id AS id')->lists('id'), ['class' => 'chosen', 'multiple']) ?>
		</div>
	</div>

	<div class="control-group ">
		<label for="password" class="control-label">Password</label>

		<div class="controls">
			<?= Form::password('password') ?>
			<?php if ($errors->has('password')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('password') ?></span>
			<?php endif ?>
		</div>
	</div>

	<div class="control-group ">
		<label for="password_confirmation" class="control-label">Confirm Password</label>

		<div class="controls">
			<?= Form::password('password_confirmation') ?>
			<?php if ($errors->has('password_confirmation')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('password_confirmation') ?></span>
			<?php endif ?>
		</div>
	</div>

	<div class="control-group ">
		<label for="email" class="control-label">Email</label>

		<div class="controls">
			<?= Form::text('email', Input::old('email', $user->email)); ?>
			<?php if ($errors->has('email')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('email') ?></span>
			<?php endif ?>
		</div>
	</div>

	<div class="control-group ">
		<label for="first_name" class="control-label">First Name</label>

		<div class="controls">
			<?= Form::text('first_name', Input::old('first_name', $user->first_name)) ?>
			<?php if ($errors->has('first_name')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('first_name') ?></span>
			<?php endif ?>
		</div>
	</div>

	<div class="control-group ">
		<label for="last_name" class="control-label">Last Name</label>

		<div class="controls">
			<?= Form::text('last_name', Input::old('last_name', $user->last_name)) ?>
			<?php if ($errors->has('last_name')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('last_name') ?></span>
			<?php endif ?>
		</div>
	</div>

	<div class="actions">
		<?= Form::submit('Save', ['class' => 'btn btn-primary']) ?>

		or <a href="<?= action('Admin\UsersController@index') ?>">Cancel</a>
	</div>
<?= Form::close(); ?>