<?php 
function initializeMySqlConnection(){
    $hostName = 'localhost';
    $user = 'root';
    $pass = 'root';
    $dbName = 'hr_app';
    $port = '8889';
    
    $mysqli = new mysqli($hostName, $user, $pass, $dbName);
    
    if ($mysqli->connect_error){
        error_log($mysqli->connect_error);
        echo 'Unable to connect to mysql database!';
        die;
    }

    return $mysqli;
}

?>