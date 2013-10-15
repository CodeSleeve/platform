<!DOCTYPE html>
<html lang="en" class="<?= explode('@', Route::currentRouteAction())[0] ?> <?= explode('@', Route::currentRouteAction())[1] ?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Login">
		<meta name="author" content="">
		<title><?= isset($title) ? $title : 'Application' ?></title>

		<?= stylesheetLinkTag('login/application') ?>
	</head>

	<body>

		<div class="container">
			
			<div class="row">
				<div class="span12">
					<?php if (Session::has('error')): ?>
			            <?php if (Session::has('reason')): ?>
				            <div class="application alert alert-error">
				                <button type="button" class="close" data-dismiss="alert">×</button>
				                <?= trans(Session::get('reason')) ?>
				            </div>
				        <?php else: ?>
				            <div class="application alert alert-error">
				                <button type="button" class="close" data-dismiss="alert">×</button>
				                <?= Session::get('error') ?>
				            </div>
				        <?php endif ?>
			        <?php endif ?>

			        <?php if (Session::has('success')): ?>
		            	<?php if (Session::get('success') == 1): ?>
			            	<div class="application alert alert-success">
				                <button type="button" class="close" data-dismiss="alert">×</button>
				                An e-mail with password reset information has been sent.
				            </div>
				        <?php else: ?>
				        	<div class="application alert alert-success">
				                <button type="button" class="close" data-dismiss="alert">×</button>
				                <?= Session::get('success') ?>
				            </div>
				        <?php endif ?>
			        <?php endif ?>
			   	</div>
			</div>
	        
			<?= $content ?>
		</div> 

		<?= javascriptIncludeTag('login/application') ?>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<![endif]-->
	</body>
</html>
