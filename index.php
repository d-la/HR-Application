<?php
/**
 * Handle all requests
 * 
 * 
 */

$request = $_SERVER['REQUEST_URI'];

$editId = -1;
$requestArray = explode('/', $request);
$allowedEditingPages = array(
    'users',
    'department',
    'schedules'
);
if (is_numeric($requestArray[3])){
    if (in_array($requestArray[2], $allowedEditingPages)){
        $editId = $requestArray[3];
    }
}

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
    case '/admin/users/' . $editId:
        require __DIR__ . '/views/admin/edituser.php';
        break;
    case '/admin/departments':
        require __DIR__ . '/views/admin/department.php';
        break;
    case '/admin/department/' . $editId:
        require __DIR__ . '/views/admin/editdepartment.php';
        break;
    case '/admin/schedules':
        require __DIR__ . '/views/admin/schedule.php';
        break;
    default: 
        require __DIR__ . '/views/404.php';
        break;
}
?>