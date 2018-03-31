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
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
            </div>
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-6 -->
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading text-center">
            </div>
            <div class="panel-body">
            </div><!-- end .panel-body -->
          </div><!-- end .panel -->
        </div><!-- end .col-md-6 -->
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
            </div>
          </div><!-- end .panel-default -->
        </div><!-- end .col-md-6 -->
        <div class="col-xs-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading text-center">
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
