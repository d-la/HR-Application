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
    case '/admin/dashboard':
        require __DIR__ . '/views/admin/dashboard.php';
        break;
    case '/admin/organizations':
        require __DIR__ . '/views/admin/organization.php';
        break;
    default: 
        require __DIR__ . '/views/404.php';
        break;
}
?>