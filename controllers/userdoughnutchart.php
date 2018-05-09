<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/include/sessionstart.php';

$organizationId = is_numeric($_POST['organizationId']) ? $_POST['organizationId'] : false;

if ($organizationId === false){
  echo 'Incorrect Data';
  error_log('Incorrect POST value for userdonutchart - expected INT, got ' . gettype($_POST['organizationId']));
  die();
}

$doughnutData = array();
$sql = 'CALL spSelectOrganizationUsers(' . $organizationId . ');';

$doughnutDataRoles = array();
$rs = $mysqli->query($sql);
if ($rs->num_rows > 0){
  while ($row = $rs->fetch_assoc()){
    $doughnutDataRoles[] = $row['role'];
  }
  $rs->close();
  $mysqli->next_result();
}

$doughnutDataColors = array();
$rolesCount = array_count_values($doughnutDataRoles);
$numberOfValuesPerRole = array();
foreach ($rolesCount as $roleTitle => $roleCount){
  $numberOfValuesPerRole[] = $roleCount;

  $doughnutDataColors[] = 'rgba(' . rand(0, 255) . ',' . rand(0, 255) . ',' .  rand(0, 255) . ', 1)';
}

$doughnutDataRoles = array_unique($doughnutDataRoles);

$doughnutDataSets = array(
  'label' => 'Dataset 1',
  'data' => $numberOfValuesPerRole,
  'backgroundColor' => $doughnutDataColors
);
$doughnutData = array('labels' => $doughnutDataRoles, 'datasets' => array($doughnutDataSets));

echo json_encode($doughnutData);


?>
