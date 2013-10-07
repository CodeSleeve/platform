<!DOCTYPE html>
<html>
	<head>
		<title><?= isset($title) ? $title : 'Codesleeve Platform' ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" type="text/css" href="<?= asset('vendors/bootstrap/css/bootstrap-cerulean.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= asset('vendors/bootstrap/css/bootstrap-responsive.min.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?= asset('vendors/font-awesome/css/font-awesome.min.css') ?>">
	</head>
	
	<body>
		<div class="navbar navbar-static-top navbar-inverse">
			<div class="navbar-inner">
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				
				<?php if (Auth::user()): ?>
					<div class="btn-group pull-right">
						<a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
							<i class="icon-user"></i>
							<?= Auth::user()->email ?>
							<span class="caret"></span>
						</a>
						
						<ul class="dropdown-menu">
							<li>
								<a href="<?= action('Admin\UsersController@edit', array(Auth::user()->id)) ?>">My Account</a>
							</li>
							
							<li class="divider"></li>
								
							<li>
								<a href="<?= action('Admin\UsersController@logout') ?>">Log Out</a>
							</li>
						</ul>
					</div>
				<?php endif ?>
				
				<div class="nav-collapse">
					<a class="brand" href="<?= action('Admin\UsersController@dashboard') ?>">Code Sleeve</a>
					
					<ul class="nav">
						<li>
							<a href="<?= action('Admin\UsersController@dashboard') ?>">
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
					<ul class="nav nav-stacked">
						<?php if (Authority::can('update', 'Page')): ?>
							<li>
								<a href="<?= action('Admin\PagesController@index') ?>">
									<i class="icon-file"></i>
									Pages
								</a>
							</li>
						<?php endif ?>
						
						<li>
							<a href="<?= action('Admin\MenusController@index') ?>">
								<i class="icon-link"></i>
								Menus
							</a>
						</li>
						
						<?php if (Authority::can('update', 'User')): ?>
							<li>
								<a href="<?= action('Admin\UsersController@index') ?>">
									<i class="icon-group"></i>
									Users
								</a>
							</li>
						<?php endif ?>
					</ul>
				</div>
				<div class="span10">
					<?php if (Session::has('error')): ?>
						<div class="container">
							<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<?= Session::get('error'); ?>
							</div>
						</div>
					<?php endif ?>

					<?php if (Session::has('success')): ?>
						<div class="container">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<?= Session::get('success'); ?>
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
