<?php
require_once '../root.php';
require_once __ROOT__ . '/include/sessionstart.php';
require_once __ROOT__ . '/include/mysqlconn.php';

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ? $_POST['email'] : false;
$password = addslashes($_POST['password']);

if (!$email){
  // Email is not valid, return user to login page
  $_SESSION['error'] = 'Invalid Email';
  header('Location: /index.php');
  die();
} else {
  $sql = "CALL spSelectUserLogin('" . $email . "', '" . $password . "');";
  $rs = $mysqli->query($sql);
  if ($rs->num_rows > 0){
    while ($row = $rs->fetch_assoc()){
      $_SESSION['userId'] = $row['id'];
      $_SESSION['userFullName'] = $row['firstname'] . ' ' . $row['lastname'];
      $_SESSION['userRole'] = $row['role'];
      $_SESSION['userCompanyName'] = $row['companyname'];
      $userTypeId = $row['usertypeid'];
    }
    $rs->close();
    $mysqli->next_result();

    switch ($userTypeId){
      case '1':
        $location = '/admin/dashboard.php';
        break;

      case '2':
        $location = '/user/admin/dashboard.php';
        break;

      case '3':
        $location = '/user/employee/dashboard.php';
        break;
    }

    header('Location: ' . $location);
    die();
  } else {
    $_SESSION['error'] = 'Username/Password';
    header('Location: /index.php');
    die();
  }

}


?>
