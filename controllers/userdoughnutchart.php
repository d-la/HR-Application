<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/include/sessionstart.php';

// $organizationId = is_numeric($_POST['organizationId']) ? $_POST['organizationId'] : false;
//
// if ($organizationId === false){
//   echo 'Incorrect Data';
//   error_log('Incorrect POST value for userdonutchart - expected INT, got ' . gettype($_POST['organizationId']));
//   die();
// }
$organizationId = 2;
$doughnutData = array();
$sql = 'CALL spSelectOrganizationUsers(' . $organizationId . ');';

$doughnutDataRoles = array();
$rs = $mysqli->query($sql);
if ($rs->num_rows > 0){
  while ($row = $rs->fetch_assoc()){
    $currentCount = 0;
    if (!in_array($row['role'], $doughnutDataRoles)){
      $doughnutDataRoles[] = $row['role'];
    }
  }
  $rs->close();
  $mysqli->next_result();
}

$numberOfValuesPerRole = array_count_values($doughnutDataRoles);
$doughnutDataRoleValues = array();
$doughnutColors = array();
foreach ($doughnutDataRoles as $arrayIndex => $role){
  foreach ($numberOfValuesPerRole as $currentRole => $currentRoleValue){
    if ($role === $currentRole){
      $doughnutDataRoleValues[] = $currentRoleValue;
    }
  }
  $doughnutColors[] = 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' .  rand(0, 255) . ', 1)';
}

$backgroundColors = array(
  'rgba(255, 99, 132, 1)',
  'rgba(54, 162, 235, 1)',
  'rgba(255, 206, 86, 1)',
  'rgba(75, 192, 192, 1)',
  'rgba(153, 102, 255, 1)'
);


// $doughnutData['datasets'] = array('data' => $doughnutDataRoleValues);
// $doughnutData['datasets'] = array(array('data' => $doughnutDataRoleValues, 'backgroundColor' => $doughnutColors, 'label' => 'Dataset 1'));
// $doughnutData['labels'] = $doughnutDataRoles;
$doughnutDataSets = array(
  'label' => 'Dataset 1',
  'data' => $doughnutDataRoleValues,
  'backgroundColor' => $backgroundColors
);
$doughnutData = array('labels' => $doughnutDataRoles, 'datasets' => array($doughnutDataSets));

echo json_encode($doughnutData);


?>
