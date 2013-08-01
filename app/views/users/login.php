<?= Form::open(['url' => action('UsersController@postLogin'), 'method' => 'POST', 'class' => 'form-signin']) ?>
	<?= Form::token() ?>
	
	<h2 class="form-signin-heading">Please sign in</h2>
	<div class="control-group">
		<div class="controls">
			<?= Form::text('email', Input::old('email'), ['required', 'autofocus', 'placeholder' => 'Username']) ?>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<?= Form::password('password', ['required', 'placeholder' => 'Password']) ?>
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			<label class="checkbox">
				<?= Form::checkbox('remember', 1, true) ?>
				Remember me
			</label>

			<?= Form::submit('Sign In', ['class' => 'btn btn-large btn-primary']) ?>
		</div>
	</div>
<?= Form::close() ?>