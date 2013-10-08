<!DOCTYPE html>
<html>
	<head>
		<title><?= isset($title) ? $title : 'Codesleeve Platform' ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" type="text/css" href="<?= asset('vendors/bootstrap/css/bootstrap-cerulean.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= asset('vendors/bootstrap/css/bootstrap-responsive.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= asset('vendors/font-awesome/css/font-awesome.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= asset('css/admin.css') ?>">
	</head>
	
	<body>
		<div class="navbar navbar-static-top navbar-inverse">
			<div class="navbar-inner">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				
				<?php if ($currentUser): ?>
					<div class="btn-group pull-right">
						<a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
							<i class="icon-user"></i>
							<?= $currentUser->email ?>
							<span class="caret"></span>
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="<?= action('Admin\UsersController@edit', [$currentUser->id]) ?>">My Account</a>
							</li>
							
							<li class="divider"></li>
								
							<li>
								<a href="<?= action('Admin\UsersController@logout') ?>">Log Out</a>
							</li>
						</ul>
					</div>
				<?php endif ?>
				
				<div class="nav-collapse">
					<a class="brand" href="<?= action('Admin\HomeController@dashboard') ?>">Code Sleeve - Platform</a>
					
					<ul class="nav">
						<li <?= Route::currentRouteAction() == 'Admin\HomeController@dashboard' ? 'class="active"' : null ?>>
							<a href="<?= action('Admin\HomeController@dashboard') ?>">
								<i class="icon-dashboard"></i>
								Dashboard
							</a>
						</li>
						
						<li>
							<a href="<?= action('HomeController@index') ?>" target="_blank">
								<i class="icon-home"></i>
								View Site
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div><br>
		
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span2">
					<?=  View::make('admin.shared._leftNav') ?>
				</div>
				<div class="span10">
					<?php if (Session::has('error')): ?>
						<div class="container">
							<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<?= Session::get('error') ?>
							</div>
						</div>
					<?php endif ?>

					<?php if (Session::has('success')): ?>
						<div class="container">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<?= Session::get('success') ?>
							</div>
						</div>
					<?php endif ?>
					
					<?= $content ?>
				</div>
			</div><hr>
			
			<div class="row-fluid">
				<div class="footer">
					<p>&copy; Code Sleeve Platform <?= date('Y') ?></p>
				</div>
			</div>
		</div>
		
		<script src="<?= asset('vendors/jquery/jquery-1.9.0.min.js') ?>"></script>
		<script src="<?= asset('vendors/ckeditor/ckeditor.js') ?>"></script>
 		<script src="<?= asset('vendors/jeditable/jeditable.min.js') ?>"></script>
 		<script src="<?= asset('vendors/bootstrap/js/bootstrap.min.js') ?>"></script>
		<script src="<?= asset('vendors/bootbox/bootbox.min.js') ?>"></script>
		<script src="<?= asset('js/app/bindings/data-editable.js') ?>"></script>
		<script src="<?= asset('js/app/bindings/data-removable.js') ?>"></script>
		<script src="<?= asset('js/app.js') ?>"></script>
	</body>
</html>
