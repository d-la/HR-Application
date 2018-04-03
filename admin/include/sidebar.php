<aside id="side-bar" class="slide-in aside-mobile">
  <ul class="sidebar-top">
    <li><a href="#"><?php echo $_SESSION['userOrganizationName'] ?></a></li>
    <li class="profile">
      <span class="oi oi-person"></span>
      <p><span class="name"><?php echo $_SESSION['userFullName'] ?></span><br/><span class="role"><?php echo $_SESSION['userRole'] ?></a></p>
    </li>
  </ul>

  <div class="list-group">
    <a class="list-group-item custom-item" href="/admin/dashboard.php"><i class="fa fa-area-chart fa-fw" aria-hidden="true"></i>&nbsp; Dashboard</a>
    <a class="list-group-item custom-item" href="/admin/organization.php"><i class="fa fa-university fa-fw" aria-hidden="true"></i>&nbsp; Add Organization</a>
    <a class="list-group-item custom-item" href="/admin/vieworganization.php"><i class="fa fa-list fa-fw" aria-hidden="true"></i>&nbsp; View Organizations</a>
    <a class="list-group-item custom-item" href="/admin/user.php"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>&nbsp; Add User</a>
    <a class="list-group-item custom-item" href="/admin/viewusers.php"><i class="fa fa-users fa-fw" aria-hidden="true"></i>&nbsp; View Users</a>
  </div>
</aside>
<div id="side-bar-bottom" class="slide-in aside-mobile">
</div>
