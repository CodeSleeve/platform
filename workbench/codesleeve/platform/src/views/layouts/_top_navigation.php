
<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= action("{$namespace}\HomeController@dashboard") ?>">
            <img src="/assets/platform/images/logo-small.png" style="position: relative; top: -10px;"> 
            <span class="logo text">
                <span class="char1">o</span>
                <span class="char2">d</span>
                <span class="char3">e</span>
                <span class="char4">s</span>
                <span class="char5">l</span>
                <span class="char6">e</span>
                <span class="char7">e</span>
                <span class="char8">v</span>
                <span class="char9">e</span>
            </span>
        </a>
    </div>
    <div class="navbar-collapse collapse">
        <?= render("{$viewpath}::layouts._top_navigation_user", compact('currentUser', 'namespace')) ?>
    </div>
</div>
