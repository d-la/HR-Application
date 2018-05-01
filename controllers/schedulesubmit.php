<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/include/sessionstart.php';

$dataArray = array();
foreach ($_POST as $postKey => $postValue){
  $dataArray[$postKey] = $postValue;
}

$sql = "CALL spInsertNewSchedule(" . $dataArray['userId'] . ",";
$sql .= "'" . $dataArray['startDate'] . "', ";
$sql .= "'" . $dataArray['endDate'] . "', ";
$sql .= "'" . $dataArray['startTime'] . "', ";
$sql .= "'" . $dataArray['endTime'] . "' ";
$sql .= ");";

$scheduleStatus = 'false';
if ($mysqli->query($sql)){
  $scheduleStatus = 'true';
}

echo $scheduleStatus;
?>
