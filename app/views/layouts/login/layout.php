<!DOCTYPE html>
<html lang="en" class="<?= explode('@', Route::currentRouteAction())[0] ?> <?= explode('@', Route::currentRouteAction())[1] ?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Login">
		<meta name="author" content="">
		<title><?= isset($title) ? $title : 'Application' ?></title>

  		<link href="<?= asset('vendors/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
		<link href="<?= asset('vendors/bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
		<link href="<?= asset('vendors/fancybox/jquery.fancybox.css') ?>" rel="stylesheet">
		<link href="<?= asset('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">    
		<link href="<?= asset('vendors/jquery-ui/css/smoothness/jquery-ui-1.10.0.custom.min.css') ?>" rel="stylesheet">
		<link href="<?= asset('css/layouts/login.css') ?>" rel="stylesheet">

		<script src="<?= asset('vendors/jquery/jquery-1.9.0.min.js') ?>" rel="stylesheet"></script>
		<script src="<?= asset('vendors/jquery-ui/js/jquery-ui-1.10.0.custom.min.js') ?>"></script>
		<script src="<?= asset('vendors/bootstrap/js/bootstrap.min.js') ?>"></script>
		<script src="<?= asset('vendors/fancybox/jquery.fancybox.js') ?>"></script>
		<script src="<?= asset('vendors/jeditable/jeditable.min.js') ?>"></script>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="container">
			
			<div class="row">
				<div class="span12">
					<?php if (Session::has('error')): ?>
			            <div class="application alert alert-error">
			                <button type="button" class="close" data-dismiss="alert">×</button>
			                <?= Session::get('error') ?>
			            </div>
			        <?php endif ?>

			        <?php if (Session::has('success')): ?>
			            <div class="application alert alert-success">
			                <button type="button" class="close" data-dismiss="alert">×</button>
			                <?= Session::get('success') ?>
			            </div>
			        <?php endif ?>
			   	</div>
			</div>
	        
			<?= $content ?>
		</div> 

	</body>
</html>
