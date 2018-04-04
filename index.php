<?php
require_once 'root.php';
require_once __ROOT__ . '/include/sessionstart.php';
require_once __ROOT__ . '/models/banner.php';
require_once __ROOT__ . '/include/header.php';
?>
  <body id="index">
    <div class="login-cover">
      <div class="login-cover-image">
        <!-- <img src="assets/img/login_background2.jpg" alt="login background image scenery"/> -->
      </div>
      <div class="login-cover-background">
      </div>
    </div>
    <div class="login">
      <div class="login-form">
        <div class="login-header">
          <i class="fa fa-users fa-2x"></i><h4>HR Management System</h4>
        </div>
        <?php
        if (isset($_SESSION['error'])){
          $banner = new Banner();
          $banner->setStatus('error');
          switch ($_SESSION['error']){
            case 'Username/Password':
              $banner->setMessage('Username and Password do not match!');
              break;

          }
          echo $banner->getHtml();
          unset($_SESSION['error']);
        }

        ?>
        <form action="controllers/login.php" method="post">
          <div class="form-group">
            <div class="input-group margin-bottom-sm">
              <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required="required">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group margin-bottom-sm">
              <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
            </div>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="rememberMe" id="rememberMe"> Remember Me
            </label>
          </div>
          <button type="submit" class="btn btn-default">Log In</button>

          <p class="forgot-password-link"><a href="#">Forgot password?</a></p>
        </form>
      </div><!-- end .login-form -->
    </div><!-- end .login -->
    <?php require_once __ROOT__ . '/include/javascript.php'; ?>
    <script src="/assets/js/load-email.js"></script>
    <script src="/assets/js/remember-me.js"></script>
  </body>
</html>
