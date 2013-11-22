
<div class="navbar navbar-static-top navbar-inverse">
    <div class="navbar-inner">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        
        <?php if ($currentUser): ?>
            <div class="btn-group pull-right">
                <a href="#" data-toggle="dropdown" class="btn dropdown-toggle">
                    <i class="icon-user"></i>
                    <?= $currentUser->email ?>
                    <span class="caret"></span>
                </a>
                
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= action('Admin\UsersController@edit', [$currentUser->id]) ?>">My Account</a>
                    </li>
                    
                    <li class="divider"></li>
                        
                    <li>
                        <a href="<?= action('Admin\UsersController@logout') ?>">Log Out</a>
                    </li>
                </ul>
            </div>
        <?php endif ?>
        
        <div class="nav-collapse">
            <a class="brand" href="<?= action('Admin\HomeController@dashboard') ?>">Code Sleeve Platform</a>

            <ul class="nav">
                <li class="<?= active('Admin\HomeController@dashboard') ?>">
                    <a href="<?= action('Admin\HomeController@dashboard') ?>">
                        <i class="icon-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                
                <li>
                    <a href="<?= action('HomeController@index') ?>" target="_blank">
                        <i class="icon-home"></i>
                        View Site
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
