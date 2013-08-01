<?= Form::open(['url' => $action, 'method' => $method, 'class' => 'form-horizontal span12']) ?>
	<?= Form::token() ?>

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
		<label for="confirm_password" class="control-label">Confirm Password</label>

		<div class="controls">
			<?= Form::password('confirm_password') ?>
			<?php if ($errors->has('confirm_password')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('confirm_password') ?></span>
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
		<label for="confirm_email" class="control-label">Confirm Email</label>

		<div class="controls">
			<?= Form::text('confirm_email', Input::old('confirm_email', $user->confirm_email)); ?>
			<?php if ($errors->has('confirm_email')): ?>
				<span class='help-inline alert alert-error'><?= $errors->first('confirm_email') ?></span>
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
		<?= Form::submit('Save', array('class' => 'btn primary')); ?>

		or <a href="<?= action('UsersController@dashboard') ?>">Cancel</a>
	</div>
<?= Form::close(); ?>