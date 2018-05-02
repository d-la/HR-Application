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
      if ($row['userid'] !== $_SESSION['userId']){
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


  $todaysDate = date('Y-m-d', time());
  $numberOfSchedulesToday = 0;
  $sql = 'CALL spSelectAllOrganizationUserSchedules(' . $_SESSION['userOrganizationId'] . ');';
  $rs = $mysqli->query($sql);
  if ($rs->num_rows > 0){
    while ($row = $rs->fetch_assoc()){
      if ($todaysDate === $row['startdate']){
        $numberOfSchedulesToday++;
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
            <h1>Dashboard</h1>
          </div>
        </div><!-- end .col-md-12 -->
      </div><!-- end .row -->
      <div class="row">
        <div class="col-md-3 col-xs-12">
          <div class="widget application-background">
            <div class="stats-icon">
              <i class="fa fa-users"></i>
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
              <h4>Number of Shifts</h4>
              <p class="schedule-count"><?php echo $numberOfSchedulesToday; ?></p>
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
              <h4>Current Roles Within Organization</h4>
            </div>
            <div class="panel-body">
              <canvas id="userOverview"></canvas>
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
              <form action="" method="post" enctype="multipart/form-data" name="userSchedule">
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
              </form>
            </div><!-- end .panel-body -->
          </div><!-- end .panel -->
        </div><!-- end .col-md-6 -->
      </div><!-- end .row -->
      <input type="hidden" name="organizationId" value="<?php echo $_SESSION['userOrganizationId']; ?>" />
    </div><!-- end .container-fluid -->
  </div><!-- end .content -->
  <?php require_once __ROOT__ . '/include/javascript.php'; ?>
  <script src="/assets/js/banner-object.js"></script>
  <script src="/assets/js/ajax-function.js"></script>
  <script>
  $(document).ready(() => {
    const doughnutData = {
      url: '/controllers/userdoughnutchart.php',
      method: 'POST',
      data: {
        organizationId: $('input[name="organizationId"]').val()
      }
    };

    callAjax(doughnutData).done((returnedJsonData) => {
      // Populate doughnut chart
      const canvasElement = document.getElementById('userOverview').getContext('2d');
      let userDoughnutChart = new Chart(canvasElement, {
        type: 'doughnut',
        data: JSON.parse(returnedJsonData),
        options: {
          title:{
            display: true,
            position: 'top',
            text: 'Roles Within Organization'
          },
          animation: {
            animateRotate: true,
            animateScale: true
          }
        }
      });
    });
  });

  const userScheduleForm = $('form[name="userSchedule"]');
  $(userScheduleForm).submit((e) => {
    e.preventDefault();

    const scheduleData = {
      url: '/controllers/schedulesubmit.php',
      method: 'POST',
      data: {
        userId: $('select[name="assignedUser"]').val(),
        startDate: $('input[name="startDate"]').val(),
        endDate: $('input[name="endDate"]').val(),
        startTime: $('input[name="startTime"]').val(),
        endTime: $('input[name="endTime"]').val()
      }
    }

    callAjax(scheduleData).done(function(result){
      if (result === 'true'){
        // let todaysDate = new Date();
        // let todaysCompareableDate = `${todaysDate.month}/${todaysDate.day}/${todaysDate.year}`;

        let scheduleBanner = new banner('success', 'Schedule has been assigned successfully!');
        $(userScheduleForm).before(scheduleBanner.returnHtml());

        // if (scheduleData.data.endDate == todaysCompareableDate){
        //   $('p.schedule-count').text($(this).text() + '1');
        // }

        // If successful, remove values from the inputs
        $('form[name="userSchedule"] input').each(function(){
          $(this).val('');
        });

        $('form[name="userSchedule"] select')[0].selectedIndex = 0;
      } else if (result === 'false'){
        let scheduleBanner = new banner('error', 'Schedule was not assigned successfully!');
        $(userScheduleForm).before(scheduleBanner.returnHtml());
      }
    });
  });

  </script>
</body>
</html>
