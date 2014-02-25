<!DOCTYPE html>
<html lang="en" class="<?= $currentRoute ?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Login">
		<meta name="author" content="">
		<title><?= isset($title) ? $title : 'Login' ?></title>

		<?= stylesheet_link_tag('platform/pages') ?>
		<?= javascript_include_tag('platform/pages') ?>

		<!--[if lt IE 9]>
			<script src="/assets/platform/vendors/html5shiv.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<?= View::make("{$viewpath}::layouts._messages") ?>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<?= $content ?>
			   	</div>
			</div>
		</div> 
	</body>
</html>