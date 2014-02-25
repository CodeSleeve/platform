<?= Form::open(['url' => action("{$namespace}\AuthController@store"), 'method' => 'POST', 'class' => 'form-signin form']) ?>
	
	<h2 class="form-signin-heading">Please sign in</h2>

	<div class="form-group">
		<?= Form::text('email', Input::old('email'), ['required', 'autofocus', 'placeholder' => 'Email Address', 'class' => 'form-control']) ?>
	</div>

	<div class="form-group">
		<?= Form::password('password', ['required', 'placeholder' => 'Password', 'class' => 'form-control']) ?>
	</div>

	<div class="form-group text-right">
		<?= Form::checkbox('remember', 1, true) ?> Remember me |

		<a data-toggle="modal" href="#recoverPasswordModal">Forgot password</a>
		
		<hr>

		<?= Form::submit('Sign In', ['class' => 'btn btn-large btn-primary']) ?>
	</div>

<?= Form::close() ?>

<?= View::make("{$viewpath}::passwordReset._modal") ?>