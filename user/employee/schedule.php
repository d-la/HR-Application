<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
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

        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4 class="panel-header">Information</h4>
            </div>
            <div class="panel-body">
              <div class="employee-schedule">
                <p>Remaining Vacation Days: 13</p>
                <p>Remaining Sick Days: 20</p>
                <p>Remaining PTO Days: 7</p>
                <p>Pending Requests: 0</p>
              </div>

            </div><!-- end .panel-body -->
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-12 -->

        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4 class="panel-header">Current Schedules</h4>
            </div>
            <div class="panel-body">
              <div class="employee-schedule">
                <p class="schedule-look">
                  Day: May 1st, 2017
                  <br />
                  <span class="fa fa-calendar-check-o"></span>
                  &nbsp; Start Time : 9:00 AM
                  &nbsp;<span class="fa fa-arrows-h"></span>&nbsp;
                  <span class="fa fa-calendar-check-o"></span>
                  &nbsp; End Time : 5:00 PM
                </p>

                <p class="schedule-look">
                  Day: May 1st, 2017
                  <br />
                  <span class="fa fa-calendar-check-o"></span>
                  &nbsp; Start Time : 9:00 AM
                  &nbsp;<span class="fa fa-arrows-h"></span>&nbsp;
                  <span class="fa fa-calendar-check-o"></span>
                  &nbsp; End Time : 5:00 PM
                </p>
              </div>

            </div><!-- end .panel-body -->
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-12 -->

        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <h4>Request PTO or Vacation Days</h4>
            </div>
            <div class="panel-body">
              <form action="" method="post">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Request Type:</div>
                    <select name="requestType" id="requestType" class="form-control" required="required">
                      <option value="0">Vacation</option>
                      <option value="1">Paid Time Off (PTO)</option>
                      <option value="2">Sick Leave</option>
                    </select>
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">Start Date:</div>
                    <input type="date" class="form-control" id="startDate" name="startDate" required="required">
                  </div><!-- end .input-group -->
                </div><!-- end .form-group -->
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon input-max-width">End Date:</div>
                    <input type="date" class="form-control" id="endDate" name="endDate" required="required">
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
