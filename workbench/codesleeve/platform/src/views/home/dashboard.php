<div>
	<h1>
		<i class="fa fa-dashboard"></i>
		Dashboard
	</h1>

	<p class="lead">
		Hi <strong><?= $currentUser->email ?></strong>, welcome back.
	</p>
	
	<a class="btn btn-large btn-warning" href="<?= action("{$namespace}\UserController@edit", [$currentUser->id]) ?>">
		<i class="fa fa-user"></i>
		View My Account
	</a>
</div>