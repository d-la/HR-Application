<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
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
            <h1>View Organizations</h1>
          </div>
        </div><!-- end .col-md-12 -->
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include __ROOT__ . '/templates/panel-buttons.php'; ?>
              <h4 class="panel-header">All Organization information</h4>
            </div>
            <div class="panel-body" style="display:none;">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <th>Organization Name</th>
                    <th>Phone Number</th>
                    <th>Street 1</th>
                    <th>Street 2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = 'CALL spSelectAllOrganizations();';
                    $rs = $mysqli->query($sql);
                    if ($rs->num_rows > 0){
                      while ($row = $rs->fetch_assoc()){
                        echo '<tr>';
                        echo '<td>' . $row['organizationname'] . '</td>';
                        echo '<td>' . $row['phonenumber'] . '</td>';
                        echo '<td>' . $row['street1'] . '</td>';
                        echo '<td>' . $row['street2'] . '</td>';
                        echo '<td>' . $row['city'] . '</td>';
                        echo '<td>' . $row['state'] . '</td>';
                        echo '<td>' . $row['zip'] . '<div class="inline-button"><a href="organization.php?organizationid=' . $row['id'] . '"><i class="fa fa-cogs"></i></a></div></td>';
                        echo '</tr>';
                      }
                      $rs->close();
                      $mysqli->next_result();
                    }
                    ?>
                  </tbody>
                </table>
              </div><!-- end .table-responsive -->
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
