<?= Form::open(['url' => action('UsersController@postLogin'), 'method' => 'POST', 'class' => 'form-signin']) ?>
	<?= Form::token() ?>
	
	<h2 class="form-signin-heading">Please sign in</h2>
	<div class="control-group">
		<div class="controls">
			<?= Form::text('email', Input::old('email'), ['required', 'autofocus', 'placeholder' => 'Email Address']) ?>
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
			
			<div class="forgot">
				<span>Forgot your password?</span>
				<a data-toggle="modal" href="#recoverPasswordModal">Recover your password</a>
			</div><hr>

			<?= Form::submit('Sign In', ['class' => 'btn btn-large btn-primary']) ?>
		</div>
	</div>
<?= Form::close() ?>

<div id="recoverPasswordModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Recover Password</h4>
            </div>
            
            <div class="modal-body">
                <p>Hey, it happens. Let us know your email address and we will get this fixed.</p>
                <form method="post" action="<?= action('UsersController@passwordReminder') ?>">
                    <?= Form::token() ?>
                    
                    <div class="form-group">
                        <input type="text" name="email" placeholder="your@email.com" class="form-control">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Recover</button>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Nevermind</button>
            </div>
        </div>
    </div>
</div>