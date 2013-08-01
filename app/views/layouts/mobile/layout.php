<!DOCTYPE html>
<html lang="en" class="<?= Request::$route->controller ?> <?= Request::$route->controller_action ?>">
<head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : 'Application' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?= asset('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">    
    <link href="<?= asset('vendors/jquery-ui/css/smoothness/jquery-ui-1.10.0.custom.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendors/jquery-mobile/jquery.mobile-1.3.0.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/layouts.mobile.css') ?>" rel="stylesheet">

    <script src="<?= asset('vendors/jquery/jquery-1.9.0.min.js') ?>"></script>
    <script src="<?= asset('vendors/jquery-ui/js/jquery-ui-1.10.0.custom.min.js') ?>"></script>
    <script src="<?= asset('vendors/underscore/underscore-min.js') ?>"></script>
    <script src="<?= asset('vendors/backbone/backbone.js') ?>"></script>
    <script src="<?= asset('vendors/jquery-mobile/jquery.mobile-1.3.0.min.js') ?>"></script>
    <script src="<?= asset('vendors/bootstrap/js/bootstrap.min.js') ?>"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>

    <div data-role="page">
        <?= $content ?>
    </div>

</body>
</html>