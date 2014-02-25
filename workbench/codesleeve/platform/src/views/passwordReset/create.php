<h3 class="inline-centered">
	<i class="icon-unlock"></i>
	Change Your Password
</h3>

<?= Form::open(['url' => action('UsersController@postPasswordReset', [$token]), 'method' => 'POST', 'id' => 'resetPasswordForm', 'class' => 'form-signin']) ?>
	<?= Form::hidden('token', $token) ?>

	<div class="control-group">
		<label class="control-label" for="email">Email</label>
		<div class="controls">
			<?= Form::text('email', null, ['required', 'placeholder' => 'Email']) ?>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="password">Password</label>
		<div class="controls">
			<?= Form::password('password', ['required', 'placeholder' => 'Password']) ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="password_confirmation">Confirm Password</label>
		<div class="controls">
			<?= Form::password('password_confirmation', ['required', 'placeholder' => 'Confirm Password']) ?>
		</div>
	</div>

	<div class="row">
		<div class="span1">
			<a href="<?= action('HomeController@index') ?>" class="btn">Nevermind</a>
		</div>
		
		<div class="span2">
			<?= Form::submit('Change Password', ['class' => 'btn btn-primary']) ?>
		</div>
	</div>
<?= Form::close() ?>