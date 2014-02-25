
<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Codesleeve Panel</a>
    </div>
    <div class="navbar-collapse collapse">
        <?= render("{$viewpath}::layouts._top_navigation_user", compact('currentUser', 'namespace')) ?>
    </div>
</div>
