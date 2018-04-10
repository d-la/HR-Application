<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/include/functions.php';
require_once __ROOT__ . '/include/sessionstart.php';

$dataList = array();

foreach ($_POST as $postKey => $postValue){
  $dataList[$postKey] = $postValue;
}

if (filter_var($dataList['phoneNumber'], FILTER_SANITIZE_NUMBER_INT) === false){
  $_SESSION['errorMsg'] = 'Invalid Phone Number';
  header('Location: /admin/organization.php' . isset($dataList['organizationId']) ? 'organizationid=' . $dataList['organizationId'] : '');
  die();
}


if ($_POST['submitButton'] === 'Submit'){
  $sql = "CALL spInsertNewOrganization('" . $mysqli->escape_string($dataList['organizationName']) . "',";
  $sql .= "'" . $mysqli->escape_string($dataList['phoneNumber']) . "',";
  $sql .= "'" . $mysqli->escape_string($dataList['street1']) . "',";
  $sql .= "'" . $mysqli->escape_string($dataList['street2']) . "',";
  $sql .= "'" . $mysqli->escape_string($dataList['city']) . "',";
  $sql .= "'" . $dataList['state'] . "',";
  $sql .= "'" . $dataList['zip'] . "'";
  $sql .= ");";

  $rs = $mysqli->query($sql);
  if ($rs->num_rows > 0){
    while ($row = $rs->fetch_assoc()){
      $organizationId = $row['organizationId'];
      $_SESSION['successMsg'] = 'Add';
    }
    $rs->close();
    $mysqli->next_result();
  } else {
    $_SESSION['errorMsg'] = 'Add';
  }
} else if ($_POST['submitButton'] === 'Update'){
  $sql = "CALL spUpdateOrganizationInformation('" . $dataList['organizationId'] . "',";
  $sql .= "'" . $mysqli->escape_string($dataList['organizationName'] ). "',";
  $sql .= "'" . $mysqli->escape_string($dataList['phoneNumber']) . "',";
  $sql .= "'" . $mysqli->escape_string($dataList['street1']) . "',";
  $sql .= "'" . $mysqli->escape_string($dataList['street2']) . "',";
  $sql .= "'" . $mysqli->escape_string($dataList['city']) . "',";
  $sql .= "'" . $dataList['state'] . "',";
  $sql .= "'" . $dataList['zip'] . "'";
  $sql .= ");";

  if ($mysqli->query($sql)){
    $_SESSION['successMsg'] = 'Update';
  } else {
    $_SESSION['errorMsg'] = 'Update';
  }

}

header('Location: /admin/organization.php?organizationid=' . !empty($organizationId) ? $organizationId : $dataList['organizationId']);
die();

?>
