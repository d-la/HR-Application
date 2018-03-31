<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
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
    $_SESSION['errormsg'] = 'Incorrect Organization';
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
          if (isset($_SESSION['errormsg'])){
            $banner->setStatus('error');
            $banner->setMessage('Organization cannot be found!');
            echo $banner->getHtml();
            unset($_SESSION['errormsg']);
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
                  <form action="" method="post">
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">Organization Name:</div>
                        <input type="text" class="form-control" id="organizationName" name="organizationName" required="required">
                      </div>
                    </div><!-- end .form-group -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">Address 1:</div>
                        <input type="text" class="form-control" id="address1" name="address2" required="required">
                      </div>
                    </div><!-- end .form-group -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon input-max-width">Address 2:</div>
                        <input type="text" class="form-control" id="address2" name="address2" required="required">
                      </div>
                    </div><!-- end .form-group -->
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="input-group">
                            <div class="input-group-addon input-max-width">City:</div>
                            <select class="form-control" id="city" name="city">
                              <option value="0">N/A</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="input-group">
                            <div class="input-group-addon input-max-width">State:</div>
                            <select class="form-control" id="state" name="state">
                              <option value="0">N/A</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="input-group">
                            <div class="input-group-addon input-max-width">Zip:</div>
                            <input type="text" class="form-control" id="zip" name="zip">
                          </div><!-- end .input-group -->
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="input-group">
                        <button type="submit" class="btn btn-default"><?php echo $buttonName; ?></button>
                      </div>
                    </div>
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
