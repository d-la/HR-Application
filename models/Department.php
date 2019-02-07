<?php 
namespace HRApplication;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php';

class Department{

    private $departmentId, $departmentName, $departmentDesc, $organizationId, $managerId;
    
    /**
     * Insert a new department
     * 
     * @param string $departmentName
     * @param string $departmentDesc
     * @param int $organizationId
     */
    public function insertNewDepartment(){

    }
    
}


?>