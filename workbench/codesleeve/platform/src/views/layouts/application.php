<!DOCTYPE html>
<html lang="en" class="<?= $currentRoute ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="<?= csrf_token() ?>">

    <link rel="shortcut icon" href="/favicon.ico">

    <title><?= isset($title) ? $title : 'Codesleeve' ?></title>

    <?= stylesheet_link_tag('platform/application') ?>
    <?= javascript_include_tag('platform/application') ?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?= render("{$viewpath}::layouts._top_navigation") ?>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?= render("{$viewpath}::layouts._side_navigation") ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <?= render("{$viewpath}::layouts._messages") ?>
                <?= render("{$viewpath}::layouts._breadcrumbs", compact("breadcrumbs")) ?>
                <?= $content ?>
            </div>
        </div>
    </div>
</body>
</html>