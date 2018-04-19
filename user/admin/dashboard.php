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

  $organizationUserCount = 0;
  $organizationUsersHtml = '';

  $usersValidForSchedule = '';
  $sql = 'CALL spSelectOrganizationUsers(' . $_SESSION['userOrganizationId'] . ');';
  $rs = $mysqli->query($sql);
  if ($rs->num_rows > 0){
    while ($row = $rs->fetch_assoc()){
      $organizationUsersHtml .= '<tr><td>' . $row['firstname'] . ' ' . $row['lastname'] . '</td><td>' . $row['role'];
      if (!$row['userid'] == $_SESSION['userId']){
        $organizationUsersHtml .= '<div class="inline-button"><a href="?userid=' . $row['organizationid'] . '"><i class="fa fa-cogs"></i></a></div>';
      }
      $organizationUsersHtml .= '</tr>';
      $organizationUserCount++;

      if ($row['usertypeid'] == 3){
        $usersValidForSchedule .= '<option value="' . $row['userid'] . '">' . $row['firstname'] . ' ' . $row['lastname'] . '</option>';
      }
    }
    $rs->close();
    $mysqli->next_result();
  } else {
    $organizationUsersHtml .= '<tr><td colspan="2">No Users saved in system</td>';
  }
  ?>
  <div id="content" class="content content-mobile">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="content-header">
            <h1>Dashboard</h1>
          </div>
        </div><!-- end .col-md-12 -->
      </div><!-- end .row -->
      <div class="row">
        <div class="col-md-3 col-xs-12">
          <div class="widget application-background">
            <div class="stats-icon">
              <i class="fa fa-building-o"></i>
            </div><!-- end .stats-icon -->
            <div class="stats-info">
              <h4>Total Users</h4>
              <p><?php echo $organizationUserCount; ?></p>
            </div><!-- end .stats-info -->
            <div class="stats-link">
              <a href="javascript:;">
                View Detail
                <i class="fa fa-arrow-circle-o-right"></i>
              </a>
            </div><!-- end .stats-link -->
          </div><!-- end .widget -->
        </div><!-- end .col-md-3 -->
        <div class="col-md-3 col-xs-12">
          <div class="widget application-background">
            <div class="stats-icon">
              <i class="fa fa-users"></i>
            </div><!-- end .stats-icon -->
            <div class="stats-info">
              <h4>Total Employees</h4>
              <p>23</p>
            </div><!-- end .stats-info -->
            <div class="stats-link">
              <a href="javascript:;">
                View Detail
                <i class="fa fa-arrow-circle-o-right"></i>
              </a>
            </div><!-- end .stats-link -->
          </div><!-- end .widget -->
        </div><!-- end .col-md-3 -->
        <div class="col-md-3 col-xs-12">
          <div class="widget application-background">
            <div class="stats-icon">
              <i class="fa fa-user"></i>
            </div><!-- end .stats-icon -->
            <div class="stats-info">
              <h4>Total Employees</h4>
              <p>23</p>
            </div><!-- end .stats-info -->
            <div class="stats-link">
              <a href="javascript:;">
                View Detail
                <i class="fa fa-arrow-circle-o-right"></i>
              </a>
            </div><!-- end .stats-link -->
          </div><!-- end .widget -->
        </div><!-- end .col-md-3 -->
        <div class="col-md-3 col-xs-12">
          <div class="widget application-background">
            <div class="stats-icon">
              <i class="fa fa-calendar"></i>
            </div><!-- end .stats-icon -->
            <div class="stats-info">
              <h4>Time Off Requests</h4>
              <p>15</p>
            </div><!-- end .stats-info -->
            <div class="stats-link">
              <a href="javascript:;">
                View Detail
                <i class="fa fa-arrow-circle-o-right"></i>
              </a>
            </div><!-- end .stats-link -->
          </div><!-- end .widget -->
        </div><!-- end .col-md-3 -->
      </div><!-- end .row -->
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include __ROOT__ . '/templates/panel-buttons.php'; ?>
              <h4>Data</h4>
            </div>
            <div class="panel-body">
            </div>
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-6 -->
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include __ROOT__ . '/templates/panel-buttons.php'; ?>
              <h4>Data</h4>
            </div>
            <div class="panel-body">
            </div><!-- end .panel-body -->
          </div><!-- end .panel -->
        </div><!-- end .col-md-6 -->
      </div><!-- end .row -->
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include __ROOT__ . '/templates/panel-buttons.php'; ?>
              <h4>All Organization Users</h4>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <th>Name</th>
                    <th>User Role</th>
                  </thead>
                  <?php
                  echo $organizationUsersHtml;
                  ?>
                </table>
              </div>
            </div>
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-6 -->
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include __ROOT__ . '/templates/panel-buttons.php'; ?>
              <h4>Assign Schedule</h4>
            </div>
            <div class="panel-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="input-group">
                    <label for="assignedUser">User</label>
                    <select name="assignedUser" class="form-control">
                      <option value="0">None Selected</option>
                      <?php echo !empty($usersValidForSchedule) ? $usersValidForSchedule : ''; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row m-b-10">
                    <div class="col-md-6 col-xs-12">
                      <label for="startDate">Start Date:</label>
                      <input type="date" name="startDate" class="form-control">
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <label for="endDate">End Date:</label>
                      <input type="date" name="endDate" class="form-control">
                    </div>
                  </div>
                  <div class="row m-b-10">
                    <div class="col-md-6 col-xs-12">
                      <label for="startTime">Start Time:</label>
                      <input type="time" name="startTime" class="form-control">
                    </div>
                    <div class="col-md-6 col-xs-12">
                      <label for="endTime">End Time:</label>
                      <input type="time" name="endTime" class="form-control">
                    </div>
                  </div>
                  <button type="submit" name="scheduleSubmit" class="btn btn-default">Submit Schedule</button>
                </div>
              </form>
            </div><!-- end .panel-body -->
          </div><!-- end .panel -->
        </div><!-- end .col-md-6 -->
      </div><!-- end .row -->
    </div><!-- end .container-fluid -->
  </div><!-- end .content -->
  <?php require_once __ROOT__ . '/include/javascript.php'; ?>
</body>
</html>
