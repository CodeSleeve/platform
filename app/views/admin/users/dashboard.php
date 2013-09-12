<div>
	<h1>
		<i class="icon-dashboard"></i>
		Dashboard
	</h1>
	<p class="lead">
		Hi <strong><?= Auth::user()->username ?></strong>, welcome back.
	</p>
	
	<a class="btn btn-large btn-warning" href="<?= action('Admin\UsersController@edit', [Auth::user()->id]) ?>">
		<i class="icon-user"></i>
		View My Account
	</a>
</div>