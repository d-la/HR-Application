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
            <h1>View Users</h1>
          </div>
        </div><!-- end .col-md-12 -->
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include __ROOT__ . '/templates/panel-buttons.php'; ?>
              <h4 class="panel-header">All User Information</h4>
            </div>
            <div class="panel-body" style="display:none;">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>Company</th>
                    <th>Role</th>
                    <th>User Type</th>
                    <th>Address</th>
                    <th class="text-right"><i class="fa fa-ellipsis-v"></i></th>
                  </thead>
                  <tbody>
                    <?php
                    $sql = 'CALL spSelectAllUsers();';
                    $rs = $mysqli->query($sql);
                    if ($rs->num_rows > 0){
                      while ($row = $rs->fetch_assoc()){
                        echo '<tr><td>' . $row['firstname'] . ' ';
                        echo strtoupper(substr($row['middlename'], 0, 1)) . ' ';
                        echo $row['lastname'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['dob'] . '</td>';
                        echo '<td>' . $row['phonenumber'] . '</td>';
                        echo '<td>' . $row['organizationname'] . '</td>';
                        echo '<td>' . $row['role'] . '</td>';
                        echo '<td>' . $row['type'] . '</td>';
                        echo '<td>';
                        echo $row['street1'] . '<br />';
                        echo !empty($row['street2']) ? $row['street2'] : '';
                        echo '<br />' . $row['city'] . ' ' . $row['state'] . ' ' . $row['zip'];
                        echo '</td><td class="ellipsis-column">';
                        echo '<a href="user.php?userid=' . $row['id'] . '"><i class="fa fa-ellipsis-v"></i></a>';
                        echo '</td>';
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
