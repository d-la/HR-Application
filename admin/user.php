<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/models/banner.php';
require_once __ROOT__ . '/include/sessionstart.php';
require_once __ROOT__ . '/include/header.php';

$userId = '';
if (empty($_GET['userid'])){
  $pageType = 'Add';
} else {
  $pageType = 'Edit';

  if (is_numeric($_GET['userid'])){
    $userId = $_GET['userid'];
  } else {
    $_SESSION['errorMsg'] = 'Incorrect Organization';
  }
}

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
            <h1><?php echo $pageType;?> Employee</h1>
          </div>
        </div><!-- end .col-md-12 -->
      </div><!-- end .row -->
      <div class="row">
        <div class="col-md-12">

          <?php
          $banner = new Banner();
          if (isset($_SESSION['successMsg'])){
            $banner->setStatus('success');
            switch ($_SESSION['successMsg']){
              case 'Add':
                $banner->setMessage('User added successfully!');
                break;

              case 'Update':
                $banner->setMessage('User updated successfully!');
                break;
            }
            echo $banner->getHtml();
            unset($_SESSION['successMsg']);
          } else if (isset($_SESSION['errorMsg'])){
            $banner->setStatus('error');
            switch ($_SESSION['errorMsg']){
              case 'Add':
                $banner->setMessage('Unable to add user!');
                break;

              case 'Update':
                $banner->setMessage('Unable to update user!');
                break;

              default:
                $banner->setMessage('User cannot be found!');
                break;
            }
            echo $banner->getHtml();
            unset($_SESSION['errorMsg']);
          }

          $userInformation = array();
          if (!empty($userId)){
            $sql = 'CALL spSelectUserInformation(' . $userId . ');';
            $rs = $mysqli->query($sql);
            if ($rs->num_rows > 0){
              while ($row = $rs->fetch_assoc()){
                $userInformation['firstName'] = ' value="' . $row['firstname'] . '" ';
                $userInformation['middleName'] = ' value="' . $row['middlename'] . '" ';
                $userInformation['lastName'] = ' value="' . $row['lastname'] . '" ';
                $userInformation['email'] = ' value="' . $row['email'] . '" ';
                $userInformation['dateOfBirth'] = ' value="' . $row['dob'] . '" ';
                $userInformation['phoneNumber'] = ' value="' . $row['phonenumber'] . '" ';
                $userInformation['organizationId'] = ' value="' . $row['organizationid'] . '" ';
                $userInformation['role'] = ' value="' . $row['role'] . '" ';
                $userInformation['userTypeId'] = ' value="' . $row['usertypeid'] . '" ';
                $userInformation['street1'] = ' value="' . $row['street1'] . '" ';
                $userInformation['street2'] = ' value="' . $row['street2'] . '" ';
                $userInformation['city'] = ' value="' . $row['city'] . '" ';
                $userInformation['state'] = ' value="' . $row['state'] . '" ';
                $userInformation['zip'] = ' value="' . $row['zip'] . '" ';
              }

              $rs->close();
              $mysqli->next_result();
            }
          }
          ?>

          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4>Fill out all required fields to add a new employee to the system</h4>
            </div>
            <div class="panel-body">
              <form action="/controllers/usersubmit.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">First Name:</div>
                    <input type="text" class="form-control" id="firstName" name="firstName" <?php echo !empty($userId) ? $userInformation['firstName'] : ''; ?> required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Middle Name:</div>
                    <input type="text" class="form-control" id="middleName" name="middleName" <?php echo !empty($userId) ? $userInformation['middleName'] : ''; ?>>
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Last Name:</div>
                    <input type="text" class="form-control" id="lastName" name="lastName" <?php echo !empty($userId) ? $userInformation['lastName'] : ''; ?> required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Email:</div>
                    <input type="email" class="form-control" id="email" name="email" <?php echo !empty($userId) ? $userInformation['email'] : ''; ?> required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <?php
                  if (empty($userId)){ ?>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Password:</div>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <?php
                    include __ROOT__ . '/templates/password-requirements.php';
                  }
                  ?>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Date of Birth:</div>
                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" <?php echo !empty($userId) ? $userInformation['dateOfBirth'] : ''; ?> required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Phone Number:</div>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" <?php echo !empty($userId) ? $userInformation['phoneNumber'] : ''; ?> required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Company:</div>
                    <select class="form-control" id="organizationId" name="organizationId" required="required">
                      <?php
                      $sql = 'CALL spSelectAllOrganizations();';
                      $rs = $mysqli->query($sql);
                      if ($rs->num_rows > 0){
                        while ($row = $rs->fetch_assoc()){

                          if (($pageType === 'Edit') && ($row['id'] == substr($userInformation['organizationId'], 8, 1))){
                            $selected = 'selected="selected"';
                          } else {
                            $selected = '';
                          }

                          echo '<option value="' . $row['id'] . '" ' . $selected . ' >' . $row['organizationname'] . '</option>';
                        }
                        $rs->close();
                        $mysqli->next_result();
                      }
                      ?>
                    </select>
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Role:</div>
                    <input type="text" class="form-control" id="role" name="role" <?php echo !empty($userId) ? $userInformation['role'] : ''; ?> required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">User Type:</div>
                    <select class="form-control" id="userType" name="userType" required="required">
                      <?php
                      $sql = 'CALL spSelectAllUserTypes();';
                      $rs = $mysqli->query($sql);
                      if ($rs->num_rows > 0){
                        while ($row = $rs->fetch_assoc()){

                          if (($pageType === 'Edit') && ($row['id'] == substr($userInformation['userTypeId'], 8, 1) )){
                            $selected = 'selected="selected"';
                          } else {
                            $selected = '';
                          }

                          echo '<option value="' . $row['id'] . '" ' . $selected . ' >' . $row['type'] . '</option>';
                        }
                        $rs->close();
                        $mysqli->next_result();
                      }
                      ?>
                    </select>
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <?php require_once __ROOT__ . '/templates/password-requirements.php'; ?>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Address 1:</div>
                    <input type="text" class="form-control" id="street1" name="street1" <?php echo !empty($userId) ? $userInformation['street1'] : ''; ?> required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Address 2:</div>
                    <input type="text" class="form-control" id="street2" name="street2" <?php echo !empty($userId) ? $userInformation['street2'] : ''; ?> required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <!-- <div class="col-xs-12 col-md-4"> -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">City:</div>
                        <input type="text" class="form-control" id="city" name="city" <?php echo !empty($userId) ? $userInformation['city'] : ''; ?> required="required">
                      </div><!-- end .input-group -->
                    </div><!-- end .col-md-4 -->

                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">State:</div>
                        <input type="text" class="form-control" id="state" name="state" <?php echo !empty($userId) ? $userInformation['state'] : ''; ?> required="required">
                      </div><!-- end .input-group -->
                    </div><!-- end .col-md-4 -->

                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">Zip:</div>
                        <input type="text" class="form-control" id="zip" name="zip" <?php echo !empty($userId) ? $userInformation['zip'] : ''; ?> required="required">
                      </div><!-- end .input-group -->
                    </div><!-- end .col-md-4 -->
                  </div><!-- end .row -->
                </div><!-- end .form-group -->

                <?php if (!empty($userId)){ ?>
                  <input type="hidden" name="userId" id="userId" value="<?php echo $userId; ?>" />
                <?php } ?>
                <button type="submit" class="btn btn-default" name="submitButton" value="<?php echo $pageType; ?>">Submit</button>
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
