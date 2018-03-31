<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/sessionstart.php';
require_once __ROOT__ . '/include/header.php';
$pageType = $_GET['type'];
?>
<body>
  <?php
  require_once 'include/sidebar.php';
  require_once __ROOT__ . '/include/navigation.php';

  $pageHeaderPre = '';
  switch ($pageType){
    case 'add':
      $pageHeaderPre = 'Add';
      break;

    case 'edit';
      $pageHeaderPre = 'Edit';
      break;
  }
  ?>
  <div id="content" class="content content-mobile">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="content-header">
            <h1><?php echo $pageHeaderPre; ?> Department</h1>
          </div>
        </div><!-- end .col-md-12 -->
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
              <form action="" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Email:</div>
                    <input type="email" class="form-control" id="email" name="email" required="required">
                  </div>
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Password:</div>
                    <input type="password" class="form-control" id="password" name="password" required="required">
                  </div>
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Password:</div>
                    <input type="password" class="form-control" id="password" name="password" required="required">
                  </div>
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Password:</div>
                    <input type="password" class="form-control" id="password" name="password" required="required">
                  </div>
                </div><!-- end .form-group -->

                <button type="submit" class="btn btn-default">Submit</button>
              </form><!-- end form -->
            </div>
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-12 -->

      </div><!-- end .row -->
    </div><!-- end .container-fluid -->
  </div><!-- end .content -->
  <?php require_once __ROOT__ . '/include/javascript.php'; ?>
</body>
</html>
