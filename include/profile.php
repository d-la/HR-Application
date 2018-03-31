<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/sessionstart.php';
require_once __ROOT__ . '/include/header.php';
?>
<body>
  <?php
  require_once __ROOT__ . '/user/admin/include/sidebar.php';
  require_once __ROOT__ . '/include/navigation.php';
  ?>
  <div id="content" id="content" class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="content-header">
            <h1>Edit Profile</h1>
          </div>
        </div><!-- end .col-md-12 -->
        <div class="col-xs-12 col-md-12">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4>Use this form to edit your profile information.</h4>
              <?php include '../templates/panel-buttons.php'; ?>
            </div>
            <div class="panel-body">
              <form action="" method="post" name="edit-profile">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Email:</div>
                    <input type="email" class="form-control" id="email" name="email" disabled="disabled">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Current Password:</div>
                    <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">New Password:</div>
                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <?php require_once __ROOT__ . '/templates/password-requirements.php'; ?>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Confirm Password:</div>
                    <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" disabled="disabled">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <?php require_once __ROOT__ . '/templates/confirm-new-password.php'; ?>
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
              </form>
            </div><!-- end .panel-body -->
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-6 -->
      </div><!-- end .row -->
    </div><!-- end .container-fluid -->
  </div><!-- end .content -->
  <?php require_once __ROOT__ . '/include/javascript.php'; ?>
  <script src="/assets/js/password-validation.js"></script>
</body>
</html>
