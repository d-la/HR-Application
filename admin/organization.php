<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/include/sessionstart.php';

$organizationId = '';
if (empty($_GET['organizationid'])){
  $type = 'Add';
  $buttonName = 'Submit';
} else {
  $type = 'Edit';
  $buttonName = 'Update';

  if (is_numeric($_GET['organizationid'])){
    $organizationId = $_GET['organizationid'];
  } else {
    $_SESSION['errorMsg'] = 'Incorrect Organization';
  }

}
require_once __ROOT__ . '/models/banner.php';
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
            <h1><?php echo $type; ?> Organization</h1>
          </div>
        </div><!-- end .col-md-12 -->
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
          $banner = new Banner();
          if (isset($_SESSION['successMsg'])){
            $banner->setStatus('success');
            switch ($_SESSION['successMsg']){
              case 'Add':
                $banner->setMessage('Organization added successfully!');
                break;

              case 'Update':
                $banner->setMessage('Organization updated successfully!');
                break;
            }
            echo $banner->getHtml();
            unset($_SESSION['successMsg']);
          } else if (isset($_SESSION['errorMsg'])){
            $banner->setStatus('error');
            switch ($_SESSION['errorMsg']){
              case 'Add':
                $banner->setMessage('Unable to add organization!');
                break;

              case 'Update':
                $banner->setMessage('Unable to update organization!');
                break;

              case 'Incorrect Organization':
                $banner->setMessage('Organization cannot be found!');
                break;
            }
            echo $banner->getHtml();
            unset($_SESSION['errorMsg']);
          }

          $organizationInformation = array();
          if (!empty($organizationId)){
            $sql = 'CALL spSelectOrganizationInformation(' . $organizationId . ');';
            $rs = $mysqli->query($sql);
            if ($rs->num_rows > 0){
              while ($row = $rs->fetch_assoc()){
                $organizationInformation['organizationName'] = ' value="' . $row['organizationname'] . '" ';
                $organizationInformation['phoneNumber'] = ' value="' . $row['phonenumber'] . '" ';
                $organizationInformation['street1'] = ' value="' . $row['street1'] . '" ';
                $organizationInformation['street2'] = ' value="' . $row['street2'] . '" ';
                $organizationInformation['city'] = ' value="' . $row['city'] . '" ';
                $organizationInformation['state'] = ' value="' . $row['state'] . '" ';
                $organizationInformation['zip'] = ' value="' . $row['zip'] . '" ';
              }

              $rs->close();
              $mysqli->next_result();
            }
          }
          ?>
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include __ROOT__ . '/templates/panel-buttons.php'; ?>
              <h4 class="panel-header">Fill out all required fields to add new organization</h4>
            </div>
            <div class="panel-body" style="display:none;">
              <div class="form-container">
                <fieldset>
                  <legend>Organization Information</legend>
                  <form action="/controllers/organizationsubmit.php" method="post">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">Organization Name:</div>
                        <input type="text" class="form-control" id="organizationName" name="organizationName" <?php echo !empty($organizationId) ? $organizationInformation['organizationName'] : ''; ?> required="required" />
                      </div>
                    </div><!-- end .form-group -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">Phone Number:</div>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" <?php echo !empty($organizationId) ? $organizationInformation['phoneNumber'] : ''; ?> required="required" />
                      </div>
                    </div><!-- end .form-group -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">Address 1:</div>
                        <input type="text" class="form-control" id="street1" name="street1" <?php echo !empty($organizationId) ? $organizationInformation['street1'] : ''; ?> required="required" />
                      </div>
                    </div><!-- end .form-group -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">Address 2:</div>
                        <input type="text" class="form-control" id="street2" name="street2" <?php echo !empty($organizationId) ? $organizationInformation['street2'] : ''; ?> />
                      </div>
                    </div><!-- end .form-group -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="input-group">
                            <div class="input-group-addon input-max-width">City:</div>
                            <input type="text" class="form-control" id="city" name="city" <?php echo !empty($organizationId) ? $organizationInformation['city'] : ''; ?> required="required" />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="input-group">
                            <div class="input-group-addon input-max-width">State:</div>
                            <input type="text" class="form-control" id="state" name="state" <?php echo !empty($organizationId) ? $organizationInformation['state'] : ''; ?> required="required" />
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="input-group">
                            <div class="input-group-addon input-max-width">Zip:</div>
                            <input type="text" class="form-control" id="zip" name="zip" <?php echo !empty($organizationId) ? $organizationInformation['zip'] : ''; ?> required="required" />
                          </div><!-- end .input-group -->
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="input-group">
                        <button type="submit" class="btn btn-default" value="<?php echo $buttonName; ?>" name="submitButton"><?php echo $buttonName; ?></button>
                      </div>
                    </div>

                    <?php if (!empty($organizationId)){ ?>
                    <input type="hidden" name="organizationId" value="<?php echo $organizationId; ?>" />
                    <?php } ?>
                  </form><!-- end form -->
                </fieldset>
              </div>
            </div><!-- end .panel-body -->
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-12 -->

      </div><!-- end .row -->
    </div><!-- end .container-fluid -->
  </div><!-- end .content -->
  <?php require_once __ROOT__ . '/include/javascript.php'; ?>
  <script>
    $(document).ready(function(){
      let panelBody = $('div.panel-body');
      $(panelBody).slideDown('linear');
    });
  </script>
</body>
</html>
