<!-- NAVBAR
================================================== -->
<div class="navbar-wrapper">
  <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
  <div class="container">

    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="#">Nobel App</a>
        <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="active"><a href="<?= action('HomeController@index') ?>">Home</a></li>
            <!--        
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="nav-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            -->
          </ul>

          <?php if (Auth::check()): ?>

              <!-- right side of the navigation bar -->
              <ul class="nav pull-right" id="main-menu-right">
                  <li>
                      <a rel="tooltip" href="<?= action('UsersController@edit', [Auth::user()->id]) ?>">
                          <i class="icon-user"></i>
                      </a>
                  </li> 
                                                            
                  <li>
                      <a rel="tooltip" href="<?= action('UsersController@logout') ?>">
                          <i class="icon-signout"></i>
                      </a>
                  </li>
              </ul>

          <?php else: ?>
              <ul class="nav pull-right" id="main-menu-right">
<!--                 
                  <li class="user-login-fields">
                      <?= Form::open(action('UsersController@login'), 'POST', ['class' => 'navbar-form']) ?>
                      <?= Form::token() ?>
                      <input class="span2" type="text" placeholder="Email" name="username">
                      <input class="span2" type="password" placeholder="Password" name="password">
                      <button type="submit" class="btn">Sign in</button>
                      <?= Form::close() ?>
                  </li>
 -->
                  <li><a rel="tooltip" href="<?= action('UsersController@login') ?>">Login <i class="icon-share-alt"></i></a></li>
              </ul>
          <?php endif ?>

        </div><!--/.nav-collapse -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->

  </div> <!-- /.container -->
</div><!-- /.navbar-wrapper -->
