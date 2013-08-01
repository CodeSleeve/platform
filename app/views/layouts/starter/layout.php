<!DOCTYPE html>
<html lang="en" class="<?= Request::$route->controller ?> <?= Request::$route->controller_action ?>">
  <head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : 'Application' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?= asset('vendors/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendors/bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendors/fancybox/jquery.fancybox.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">    
    <link href="<?= asset('vendors/jquery-ui/css/smoothness/jquery-ui-1.10.0.custom.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/layouts/starter.css') ?>" rel="stylesheet">

    <script src="<?= asset('vendors/jquery/jquery-1.9.0.min.js') ?>" rel="stylesheet"></script>
    <script src="<?= asset('vendors/jquery-ui/js/jquery-ui-1.10.0.custom.min.js') ?>"></script>
    <script src="<?= asset('vendors/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('vendors/fancybox/jquery.fancybox.js') ?>"></script>
    <script src="<?= asset('vendors/jeditable/jeditable.min.js') ?>"></script>
    <script src="<?= asset('js/layouts/starter.js') ?>"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="<?= asset('vendors/html5shiv/html5shiv.js') ?>"></script>
    <![endif]-->
  </head>
  <body>

    <?= render('layouts.starter.navbar') ?>

    <?= render('layouts.starter.alerts') ?>
    
    <div class="container" id="content">
      <?= $content ?>
    </div>

    <footer>
      <p>© 2013 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
    
  </body>
</html>