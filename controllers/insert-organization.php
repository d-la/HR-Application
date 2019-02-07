<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Session';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Organization.php';

// Gather POST data and assign them to an array
$organizationData = array();
if (!empty($_POST)){
    foreach ($_POST as $postKey => $postValue){
        $organizationData[$postKey] = $postValue;
    }
}

$organization = new HRApplication\Organization();
$organizationResult = $organization->insertNewOrganization($organizationData['organization_name'], $organizationData['street_1'], $organizationData['street_2'], $organizationData['city'], $organizationData['state'], $organizationData['zip']);


$session = new HRApplication\Session();
if ($organizationResult === true){
    $session->setSession('alert', 'success');
} else {
    $session->setSession('alert', 'error');
}

header('Location: /admin/organization');
die();
?>