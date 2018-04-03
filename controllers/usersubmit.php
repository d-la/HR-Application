<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/include/sessionstart.php';

$dataList = array();

foreach ($_POST as $postKey => $postValue){
  $dataList[$postKey] = $postValue;
}

// Validate the email
if (!filter_var($dataList['email'], FILTER_VALIDATE_EMAIL)){
  $_SESSION['errorMsg'] = 'Invalid Email';
  header('Location: /admin/organization.php');
  die();
}

if ($_POST['submitButton'] === 'Add'){
  $sql = "CALL spInsertNewUser(";
  $sql .= "'" . addslashes($dataList['firstName']) . "', ";
  $sql .= "'" . addslashes($dataList['middleName']) . "', ";
  $sql .= "'" . addslashes($dataList['lastName']) . "', ";
  $sql .= "'" . $dataList['email'] . "', ";
  $sql .= "'" . $dataList['newPassword'] . "', ";
  $sql .= "'" . $dataList['dateOfBirth'] . "', ";
  $sql .= "'" . $dataList['phoneNumber'] . "', ";
  $sql .= "'" . $dataList['role'] . "', ";
  $sql .= "'" . $dataList['organizationId'] . "', ";
  $sql .= "'" . $dataList['userType'] . "', ";
  $sql .= "'" . addslashes($dataList['street1']) . "', ";
  $sql .= "'" . addslashes($dataList['street2']) . "', ";
  $sql .= "'" . addslashes($dataList['city']) . "', ";
  $sql .= "'" . $dataList['state'] . "', ";
  $sql .= "'" . $dataList['zip'] . "'";
  $sql .= ");";

  $rs = $mysqli->query($sql);
  if ($rs->num_rows > 0){
    while ($row = $rs->fetch_assoc()){
      $_SESSION['succssMsg'] = 'Add';
      $userId = $row['userId'];
    }
    $rs->close();
    $mysqli->next_result();
  } else {
    $_SESSION['errorMsg'] = 'Add';
  }
} else if ($_POST['submitButton'] === 'Edit'){
  $sql = "CALL spUpdateUserInformation(";
  $sql .= $dataList['userId'] . ', ';
  $sql .= "'" . addslashes($dataList['firstName']) . "', ";
  $sql .= "'" . addslashes($dataList['middleName']) . "', ";
  $sql .= "'" . addslashes($dataList['lastName']) . "', ";
  $sql .= "'" . $dataList['email'] . "', ";
  $sql .= "'" . $dataList['dateOfBirth'] . "', ";
  $sql .= "'" . $dataList['phoneNumber'] . "', ";
  $sql .= "'" . $dataList['organizationId'] . "', ";
  $sql .= "'" . $dataList['role'] . "', ";
  $sql .= "'" . $dataList['userType'] . "', ";
  $sql .= "'" . addslashes($dataList['street1']) . "', ";
  $sql .= "'" . addslashes($dataList['street2']) . "', ";
  $sql .= "'" . addslashes($dataList['city']) . "', ";
  $sql .= "'" . $dataList['state'] . "', ";
  $sql .= "'" . $dataList['zip'] . "'";
  $sql .= ");";

  if ($mysqli->query($sql)){
    $_SESSION['successMsg'] = 'Update';
  } else {
    $_SESSION['errorMsg'] = 'Update';
  }

}

$url = '/admin/user.php?userid=';

$sendBackId = ($_POST['submitButton'] == 'Add') ? $userId : $dataList['userId'];

header('Location: ' . $url . $sendBackId);
die();
?>
