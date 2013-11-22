<!DOCTYPE html>
<html lang="en" class="<?= $currentRoute ?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Login">
		<meta name="author" content="">
		<title><?= isset($title) ? $title : 'Application' ?></title>

		<?= stylesheetLinkTag('login/application') ?>

		<!--[if lt IE 9]>
			<script src="../assets/js/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="container">
			
			<div class="row">
				<div class="span12">
					<?= View::make('layouts._messages') ?>
			   	</div>
			</div>
	        
			<?= $content ?>
		</div> 

		<?= javascriptIncludeTag('login/application') ?>
	</body>
</html>