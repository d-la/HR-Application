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
            <h1>Dashboard</h1>
          </div>
        </div><!-- end .col-md-12 -->
        <div class="col-md-3 col-xs-12">
          <div class="widget application-background">
            <div class="stats-icon">
              <i class="fa fa-building-o"></i>
            </div><!-- end .stats-icon -->
            <div class="stats-info">
              <h4>Total Organizations</h4>
              <p>12</p>
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
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include '../include/panelbuttons.php'; ?>
              <h4>Data</h4>
            </div>
            <div class="panel-body">
            </div>
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-6 -->
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include '../include/panelbuttons.php'; ?>
              <h4>Data</h4>
            </div>
            <div class="panel-body">
            </div><!-- end .panel-body -->
          </div><!-- end .panel -->
        </div><!-- end .col-md-6 -->
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include '../include/panelbuttons.php'; ?>
              <h4>Data</h4>
            </div>
            <div class="panel-body">
            </div>
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-6 -->
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-custom-heading">
              <?php include '../include/panelbuttons.php'; ?>
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
