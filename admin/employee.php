<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/include/sessionstart.php';
require_once __ROOT__ . '/include/header.php';

if (empty($_GET['employeeid'])){
  $pageType = 'Add';
} else {
  $pageType = 'Edit';
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
            <h1><?php echo $pageType; ?> Employee</h1>
          </div>
        </div><!-- end .col-md-12 -->
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4>Fill out all required fields to add a new employee to the system</h4>
            </div>
            <div class="panel-body">
              <form action="/controllers/usersubmit.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">First Name:</div>
                    <input type="text" class="form-control" id="firstName" name="firstName" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Middle Name:</div>
                    <input type="text" class="form-control" id="middleName" name="middleName">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Last Name:</div>
                    <input type="text" class="form-control" id="lastName" name="lastName" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Email:</div>
                    <input type="email" class="form-control" id="email" name="email" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Password:</div>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <?php include __ROOT__ . '/templates/password-requirements.php'; ?>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Date of Birth:</div>
                    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Phone Number:</div>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Company:</div>
                    <select class="form-control" id="company" name="company" required="required">
                      <option value="0">None Selected</option>
                      <?php
                      $sql = 'CALL spSelectAllCompanies();';
                      $rs = $mysqli->query($sql);
                      if ($rs->num_rows > 0){
                        while ($row = $rs->fetch_assoc()){
                          echo '<option value="' . $row['id'] . '">' . $row['companyname'] . '</option>';
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
                    <input type="text" class="form-control" id="role" name="role" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">User Type:</div>
                    <select class="form-control" id="userType" name="userType" required="required">
                      <option value="0">None Selected</option>
                      <?php
                      $sql = 'CALL spSelectAllUserTypes();';
                      $rs = $mysqli->query($sql);
                      if ($rs->num_rows > 0){
                        while ($row = $rs->fetch_assoc()){
                          echo '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
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
                    <input type="text" class="form-control" id="address1" name="address1" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Address 2:</div>
                    <input type="text" class="form-control" id="address2" name="address2" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <!-- <div class="col-xs-12 col-md-4"> -->
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">City:</div>
                        <input type="text" class="form-control" id="city" name="city" required="required">
                      </div><!-- end .input-group -->
                    </div><!-- end .col-md-4 -->

                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">State:</div>
                        <input type="text" class="form-control" id="state" name="state" required="required">
                      </div><!-- end .input-group -->
                    </div><!-- end .col-md-4 -->

                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">Zip:</div>
                        <input type="text" class="form-control" id="zip" name="zip" required="required">
                      </div><!-- end .input-group -->
                    </div><!-- end .col-md-4 -->
                  </div><!-- end .row -->
                </div><!-- end .form-group -->

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
