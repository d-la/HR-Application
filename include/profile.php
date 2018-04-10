<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/include/sessionstart.php';
require_once __ROOT__ . '/models/banner.php';
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
          <?php
          $banner = new Banner();
          if (isset($_SESSION['successMsg'])){
            $banner->setStatus('success');
            $banner->setMessage('Profile updated successfully!');

            echo $banner->getHtml();
            unset($_SESSION['successMsg']);
          } else if (isset($_SESSION['errorMsg'])){
            $banner->setStatus('error');
            $banner->setMessage('Unable to update profile!');
            echo $banner->getHtml();
            unset($_SESSION['errorMsg']);
          }

          $userInformation = array();
          $sql = 'CALL spSelectUserInformation(' . $_SESSION['userId'] . ');';
          $rs = $mysqli->query($sql);
          if ($rs->num_rows > 0){
            while ($row = $rs->fetch_assoc()){
              $userInformation['firstName'] = $row['firstname'];
              $userInformation['middleName'] = $row['middlename'];
              $userInformation['lastName'] = $row['lastname'];
              $userInformation['email'] = $row['email'];
              $userInformation['phoneNumber'] = $row['phonenumber'];
              $userInformation['street1'] = $row['street1'];
              $userInformation['street2'] = $row['street2'];
              $userInformation['city'] = $row['city'];
              $userInformation['state'] = $row['state'];
              $userInformation['zip'] = $row['zip'];
            }
            $rs->close();
            $mysqli->next_result();
          }

          ?>
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4>Use this form to edit your profile information.</h4>
              <?php include '../templates/panel-buttons.php'; ?>
            </div>
            <div class="panel-body">
              <form action="" method="post" name="edit-profile">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">First Name:</div>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $userInformation['firstName']; ?>">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Middle Name:</div>
                    <input type="text" class="form-control" id="middleName" name="middleName" value="<?php echo $userInformation['middleName']; ?>">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Last Name:</div>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $userInformation['lastName']; ?>">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Email:</div>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $userInformation['email']; ?>" disabled="disabled">
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
                    <input type="text" class="form-control" id="address1" name="address1" value="<?php echo $userInformation['street1']; ?>">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Address 2:</div>
                    <input type="text" class="form-control" id="address2" name="address2" value="<?php echo $userInformation['street2']; ?>">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">City:</div>
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $userInformation['city']; ?>">
                      </div><!-- end .input-group -->
                    </div><!-- end .col-md-4 -->

                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">State:</div>
                        <input type="text" class="form-control" id="state" name="state" value="<?php echo $userInformation['state']; ?>">
                      </div><!-- end .input-group -->
                    </div><!-- end .col-md-4 -->

                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">Zip:</div>
                        <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $userInformation['zip']; ?>">
                      </div><!-- end .input-group -->
                    </div><!-- end .col-md-4 -->
                  </div><!-- end .row -->
                </div><!-- end .form-group -->

                <button type="submit" class="btn btn-default" name="submitButton">Update</button>
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
