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

  $totalAmountOfOrganizations = 0;
  $organizationsHtml = '';
  $sql = 'CALL spSelectAllOrganizations();';
  $rs = $mysqli->query($sql);
  if ($rs->num_rows > 0){
    while ($row = $rs->fetch_assoc()){
      $organizationsHtml .= '<tr><td>' . $row['organizationname'];
      $organizationsHtml .= '<div class="inline-button"><a href="organization.php?organizationid=' . $row['id'] . '"><i class="fa fa-cogs"></i></a></div>';
      $organizationsHtml .= '</td></tr>';
      $totalAmountOfOrganizations++;
    }
    $rs->close();
    $mysqli->next_result();
  }

  $totalAmountOfUsers = 0;
  $usersHtml = '';
  $sql = 'CALL spSelectAllUsers();';
  $rs = $mysqli->query($sql);
  if ($rs->num_rows > 0){
    while ($row = $rs->fetch_assoc()){
      $usersHtml .= '<tr><td>' . $row['firstname'] . ' ';
      if (!is_null($row['middlename'])){
        $usersHtml .= strtoupper(substr($row['middlename'], 0, 1)) . ' ';
      }
      $usersHtml .= $row['lastname'] . '</td>';
      $usersHtml .= '<td>' . $row['email'];
      $usersHtml .= '<div class="inline-button"><a href="#?userid=' . $row['organizationid'] . '"><i class="fa fa-cogs"></i></a></div>';
      $usersHtml .= '</td></tr>';
      $totalAmountOfUsers++;
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
      </div>
      <div class="row">
        <div class="col-md-3 col-xs-12">
          <div class="widget application-background">
            <div class="stats-icon">
              <i class="fa fa-building-o"></i>
            </div><!-- end .stats-icon -->
            <div class="stats-info">
              <h4>Total Organizations</h4>
              <p><?php echo $totalAmountOfOrganizations; ?></p>
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
              <p><?php echo $totalAmountOfUsers; ?></p>
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
              <h4>Organization Quick View</h4>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <th>Organization Name <a href="vieworganization.php" class="badge-link float-right"><span class="badge">View All</span></a></th>
                  </thead>
                  <tbody>
                    <?php
                    echo $organizationsHtml;
                    ?>
                  </tbody>
                </table>
              </div><!-- end .table-responsive -->
            </div>
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-6 -->
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include __ROOT__ . '/templates/panel-buttons.php'; ?>
              <h4>User Quick View</h4>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
                <table class='table table-hover'>
                  <thead>
                    <th>Full Name</th>
                    <th>Email <a href="viewusers.php" class="badge-link float-right"><span class="badge">View All</span></a></th>
                  </thead>
                  <tbody>
                    <?php
                    echo $usersHtml;
                    ?>
                  </tbody>
                </table>
              </div><!-- end .table-responsive -->
            </div><!-- end .panel-body -->
          </div><!-- end .panel -->
        </div><!-- end .col-md-6 -->
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
    </div><!-- end .container-fluid -->
  </div><!-- end .content -->
  <?php require_once __ROOT__ . '/include/javascript.php'; ?>
</body>
</html>
