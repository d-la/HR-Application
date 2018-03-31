<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/sessionstart.php';
require_once __ROOT__ . '/include/header.php';
?>
<body>
  <?php
  require_once 'include/sidebar.php';
  require_once __ROOT__ . '/include/navigation.php';
  ?>
  <div id="content" class="content content-mobile">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="content-header">
            <h1> Employee</h1>
          </div>
        </div><!-- end .col-md-12 -->
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4>Fill out all required fields to add a new employee to the system</h4>
            </div>
            <div class="panel-body">
              <form action="" method="post" name="edit-profile">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Email:</div>
                    <input type="email" class="form-control" id="email" name="email">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Password:</div>
                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <?php require_once __ROOT__ . '/templates/password-requirements.php'; ?>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Address 1:</div>
                    <input type="text" class="form-control" id="address1" name="address1">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Address 2:</div>
                    <input type="text" class="form-control" id="address2" name="address2">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <!-- <div class="col-xs-12 col-md-4"> -->
                <div class="form-inline">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon input-max-width">City:</div>
                      <select class="form-control" id="city" name="city">
                        <option value="0">N/A</option>
                      </select>
                    </div><!-- end .input-group -->
                    <div class="input-group">
                      <div class="input-group-addon input-max-width">State:</div>
                      <select class="form-control" id="state" name="state">
                        <option value="0">N/A</option>
                      </select>
                    </div><!-- end .input-group -->
                    <div class="input-group">
                      <div class="input-group-addon input-max-width">Zip:</div>
                      <input type="text" class="form-control" id="zip" name="zip">
                    </div><!-- end .input-group -->
                  </div><!-- end .form-group -->
                </div><!-- end .form-inline -->

                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-12 -->

      </div><!-- end .row -->
    </div><!-- end .container-fluid -->
  </div><!-- end .content -->
  <?php require_once __ROOT__ . '/include/javascript.php'; ?>
  <script src="/assets/js/password-validation.js"></script>
</body>
</html>
