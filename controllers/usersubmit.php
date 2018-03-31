<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/root.php';
require_once __ROOT__ . '/include/mysqlconn.php';
require_once __ROOT__ . '/include/sessionstart.php';

foreach ($_POST as $postKey => $postValue){
  echo $postKey . ' => ' . $postValue . '<br />';
}


?>
