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
            <h1> Schedule</h1>
          </div>
        </div><!-- end .col-md-12 -->
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4 class="panel-header">Vacation and PTO (Paid Time Off) Requests</h4>
            </div>
            <div class="panel-body">
              <form action="" method="post">
                <div class="table-responsive">
                  <table class="table table-striped table-hover text-center">
                    <thead>
                      <th class="text-center">User</th>
                      <th class="text-center">Start Day</th>
                      <th class="text-center">End Day</th>
                      <th class="text-center">Options</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <!-- <td>
                          <div class="text-right approve-deny-div">
                            <button type="button" class="btn btn-default">Approve</button>
                            <button type="button" class="btn btn-default">Deny</button>
                          </div>
                        </td> -->
                      </tr>
                      <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <!-- <td>
                          <div class="text-right approve-deny-div">
                            <button type="button" class="btn btn-default">Approve</button>
                            <button type="button" class="btn btn-default">Deny</button>
                          </div>
                        </td> -->
                      </tr>
                      <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <!-- <td>
                          <div class="text-right approve-deny-div">
                            <button type="button" class="btn btn-default">Approve</button>
                            <button type="button" class="btn btn-default">Deny</button>
                          </div>
                        </td> -->
                      </tr>
                    </tbody>
                  </table>
                </div><!-- end .table-responsive -->
              </form><!-- end form -->
            </div><!-- end .panel-body -->
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-12 -->

        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4 class="panel-header">Current Schedules</h4>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped">
                  <?php
                  $schedulesToday = false;
                  $todaysDate = date('Y-m-d', time());
                  $sql = 'CALL spSelectAllOrganizationUserSchedules(' . $_SESSION['userOrganizationId'] . ');';
                  $rs = $mysqli->query($sql);
                  if ($rs->num_rows > 0){
                    echo '<thead><th>User</th><th>Day</th><th>Time</th></thead>';
                    while ($row = $rs->fetch_assoc()){
                      if ($row['startdate'] === $todaysDate){
                        echo '<td>' . $row['firstname'] . ' ' . $row['lastname'] . '</td><td>' . $row['startdate'] . ' -> ' . $row['enddate'] . '</td><td>' . $row['starttime'] . ' -> ' . $row['endtime'] . '</td>';
                      }
                    }
                    $rs->close();
                    $mysqli->query($sql);
                  } else {
                    echo '<td colspan="3">No Schedules Available</td>';
                  }
                  ?>
                </table>
              </div><!-- end .table-responsive -->
            </div><!-- end .panel-body -->
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-12 -->

        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4>Use this form to assign schedules or days off</h4>
            </div>
            <div class="panel-body">
              <form action="" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Email:</div>
                    <input type="email" class="form-control" id="email" name="email" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Password:</div>
                    <input type="password" class="form-control" id="password" name="password" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Password:</div>
                    <input type="password" class="form-control" id="password" name="password" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Password:</div>
                    <input type="password" class="form-control" id="password" name="password" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <button type="submit" class="btn btn-default">Submit</button>
              </form><!-- end form -->
            </div><!-- end .panel-body -->
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-12 -->
      </div><!-- end .row -->
    </div><!-- end .container-fluid -->
  </div><!-- end .content -->
  <?php require_once __ROOT__ . '/include/javascript.php'; ?>
</body>
</html>
