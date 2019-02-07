<?php
namespace HRApplication;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Session.php';

class Roles{

    private $roleId, $roleName, $roleDesc, $departmentId;


    /**
     * Insert a new role within a department into the system
     * 
     * @param string $roleName 
     * @param string $roleDesc 
     * @param string $departmentId
     * 
     * @return boolean true if successful, false if not
     */
    public function insertNewRole($roleName, $roleDesc, $departmentId){
        $mysqli = initilizeMysqlConnection();

        $this->roleName = addslashes($mysqli->real_escape_string($roleName));
        $this->roleDesc = addslashes($mysqli->real_escape_string($roleDesc));

        if (is_numeric($departmentId)){
            $sqlQuery = "CALL spInsertNewRole('$this->roleName', '$this->roleDesc', $departmentId);";

            $result = $mysqli->query($sqlQuery);
            $session = new HRApplication\Session;

            // Based on query results, set a session status to show the user
            if ($result === true){
                $session->setSession('alert', 'success');
            } else {
                $session->setSession('alert', 'error');
            }
        } else {
            $session->setSession('alert', 'error');
            return false;
        }
    }

    /**
     * Select all roles from a department. Used on UI when adding users to the system
     * 
     * @param int $departmentId: the id of the department to query
     * 
     * @return mixed Either the mysql object or false if the department id is not a number
     */
    public function selectAllRolesFromDepartment($departmentId){

        if (is_numeric($departmentId)){
            $mysqli = initializeMysqlConnection();

            $sqlQuery = "CALL spSelectAllRolesFromDepartment($departmentId);";
            $resultSet = $mysqli->query($sqlQuery);

            return $resultSet;
        } else {
            return false;
        }
    }
}

?>