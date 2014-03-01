<!DOCTYPE html>
<html lang="en" class="<?= $currentRoute ?>">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Login">
		<meta name="author" content="">
		<meta name="csrf-token" content="<?= csrf_token() ?>">
		<title><?= isset($title) ? $title : 'Login' ?></title>

		<?= stylesheet_link_tag('platform/login') ?>
		<?= javascript_include_tag('platform/backend') ?>

		<!--[if lt IE 9]>
			<script src="/assets/platform/vendors/html5shiv.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="container">

			<div class="row">
				<div class="col-sm-12">
					<?= render("platform::layouts.partials.messages") ?>
			   	</div>
			</div>

			<?= $content ?>

		</div>

		<?= render("platform::layouts.partials.footer") ?>

	</body>
</html>