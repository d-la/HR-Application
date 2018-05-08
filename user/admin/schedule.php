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

  $usersValidForSchedule = '';
  $sql = 'CALL spSelectOrganizationUsers(' . $_SESSION['userOrganizationId'] . ');';
  $rs = $mysqli->query($sql);
  if ($rs->num_rows > 0){
    while ($row = $rs->fetch_assoc()){
      if ($row['usertypeid'] == 3){
        $usersValidForSchedule .= '<option value="' . $row['userid'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>';
      }
    }
    $rs->close();
    $mysqli->next_result();
  }
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
                    </thead>
                    <tbody>
                      <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                      </tr>
                      <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                      </tr>
                      <tr>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
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
                  $scheduleCount = 0;
                  $todaysDate = date('Y-m-d', time());
                  $sql = 'CALL spSelectAllOrganizationUserSchedules(' . $_SESSION['userOrganizationId'] . ');';
                  $rs = $mysqli->query($sql);
                  if ($rs->num_rows > 0){
                    echo '<thead><th>User</th><th>Day</th><th>Time</th></thead>';
                    while ($row = $rs->fetch_assoc()){
                      if ($row['startdate'] === $todaysDate){
                        echo '<td>' . $row['firstname'] . ' ' . $row['lastname'] . '</td><td>' . $row['startdate'] . ' -> ' . $row['enddate'] . '</td><td>' . $row['starttime'] . ' -> ' . $row['endtime'] . '</td>';
                        $scheduleCount++;
                      }
                    }
                    $rs->close();
                    $mysqli->query($sql);
                  } else {
                    echo '<td colspan="3" class="text-center">No Schedules Today</td>';
                  }

                  if ($scheduleCount === 0){
                    echo '<td colspan="3" class="text-center">No Schedules Today</td>';
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
              <h4>Fill out this form to assign a user a schedule</h4>
            </div>
            <div class="panel-body">
              <form action="" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <label for="assignedUser">User</label>
                    <select name="assignedUser" class="form-control" required="required">
                      <option value="0">None Selected</option>
                      <?php echo !empty($usersValidForSchedule) ? $usersValidForSchedule : ''; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row m-b-10">
                    <div class="col-md-6 col-xs-12">
                      <label for="startDate">Start Date:</label>
                      <input type="date" name="startDate" class="form-control" required="required">
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <label for="endDate">End Date:</label>
                      <input type="date" name="endDate" class="form-control" required="required">
                    </div>
                  </div>
                  <div class="row m-b-10">
                    <div class="col-md-6 col-xs-12">
                      <label for="startTime">Start Time:</label>
                      <input type="time" name="startTime" class="form-control" required="required">
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <label for="endTime">End Time:</label>
                      <input type="time" name="endTime" class="form-control" required="required">
                    </div>
                  </div>
                  <button type="submit" name="scheduleSubmit" class="btn btn-default">Submit Schedule</button>
                </div>
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
