
<ul class="nav navbar-nav navbar-right">
    <li>
        <a href="<?= action("{$namespace}\UserController@edit", [$currentUser->id]) ?>">My Account</a>
    </li>
        
    <li>
        <a href="<?= action("{$namespace}\AuthController@destroy") ?>">Log Out</a>
    </li>
</ul>