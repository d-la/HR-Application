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
    

    // Admins
    case '/admin/dashboard':
        require __DIR__ . '/views/admin/dashboard.php';
        break;
    case '/admin/organizations':
        require __DIR__ . '/views/admin/organization.php';
        break;
    case '/admin/users':
        require __DIR__ . '/views/admin/users.php';
        break;
    case '/admin/departments':
        require __DIR__ . '/views/admin/department.php';
        break;
    case '/admin/schedules':
        require __DIR__ . '/views/admin/schedule.php';
        break;
    default: 
        require __DIR__ . '/views/404.php';
        break;
}
?>