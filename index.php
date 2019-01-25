<?php
/**
 * Handle all requests
 * 
 * 
 */

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/views/index.php';
        break;
    default: 
        require __DIR__ . '/views/404.php';
        break;
}
?>