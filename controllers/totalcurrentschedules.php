<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/include/sessionstart.php';

// $organizationId = is_numeric($_POST['organizationId']) ? $_POST['organizationId'] : false;
//
// if ($organizationId === false){
//   error_log('Incorrect POST value, expected integer, recieved ' . gettype($_POST['organizationId']) . ' for totalcurrentschedules.php');
//   echo 'Error';
//   die();
// }

$organizationId = 2;

$todaysDate = date('Y-m-d', time());
$numberOfSchedulesToday = 0;
$sql = 'CALL spSelectAllOrganizationUserSchedules(' . $organizationId . ');';
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

echo $numberOfSchedulesToday;
?>
