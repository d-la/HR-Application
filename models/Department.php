<?php 
namespace HRApplication;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Session.php';

class Department{

    private $departmentId, $departmentName, $departmentDesc, $organizationId, $managerId;
    
    /**
     * Insert a new department
     * 
     * @param string $departmentName
     * @param string $departmentDesc
     * @param int $organizationId
     * 
     * @return boolean true if query is successfull, false if not
     */
    public function insertNewDepartment($departmentName, $departmentDesc, $organizationId){

        if (is_numeric($organizationId)){
            $mysqli = initializeMysqlConnection();

            $sqlQuery = "CALL spInsertNewOrganization('";
            $sqlQuery .= addslashes($mysqli->real_escape_string($departmentName)) . "', ";
            $sqlQuery .= addslashes($mysqli->real_escape_string($departmentDesc)) . "', ";
            $sqlQuery .= $organizationId . ');';

            $result = $mysqli->query($sqlQuery);

            $session = new HRApplication\Session;

            if ($result === true){
                $session->setSession('alert', 'success');
                return true;
            } else {
                error_log($mysqli->error);
                $session->setSession('alert', 'error');
                return false;
            }
        }
    }

    /**
     * Update a departments information. Used mainly by organization admins
     * 
     * @param int $departmentId;
     * @param string $departmentName
     * @param string $departmentDesc
     * @param int $organizationId: the organization the deparment belongs to
     * 
     * 
     * @return boolean true if succesfull, false if not
     */
    public function updateDepartmentInformation($departmentId, $departmentName, $departmentDesc, $organizationId){
        if ( is_numeric($organizationId) && is_numeric($departmentId) ){
            $mysqli = initializeMysqlConnection();

            $sqlQuery = "CALL spUpdateDepartmentInformation($departmentId, ";
            $sqlQuery .=  "'" . addslashes($mysqli->real_escape_string($departmentName)) . "', ";
            $sqlQuery .=  "'" . addslashes($mysqli->real_escape_string($departmentDesc)) . "', ";
            $sqlQuery .= $organizationId . ');';

            $result = $mysqli->query($sqlQuery);
            $session = new HRApplication\Session;

            if ($result === true){
                $session->setSession('alert', 'success');
                return true;
            } else {
                error_log($mysqli->error);
                $session->setSession('alert', 'error');
                return false;
            }
        }
    }
    
    /**
     * Return all departments. Might be used by super admin but no one else.
     * 
     * @return object Mysql object
     */
    public function selectAllDepartments(){
        $mysqli = initializeMysqlConnection();

        $sqlQuery = 'CALL spSelectAllDepartments();';
        $resultSet = $mysqli->query($sqlQuery);

        return $resultSet;
    }

    /**
     * Selects all departments within an organization. Can be used by both admins and super admins
     * 
     * @param int $organizationId 
     * 
     * @return object mysql object
     */
    public function selectAllDepartmentsFromOrganization($organizationId){
        if (is_numeric($organizationId)){
            $mysqli = initializeMysqlConnection();

            $sqlQuery = "CALL spSelectAllDepartmentsFromOrganization($organizationId);";

            $resultSet = $mysqli->query($sqlQuery);

            return $resultSet;
        }
    }

    /**
     * Select a departments information
     * 
     * @param int $departmentId
     * 
     * @return object mysql object
     */
    public function selectDepartmentInformation($departmentId){
        if (is_numeric($departmentId)){
            $mysqli = initializeMysqlConnection();

            $sqlQuery = "CALL spSelectDepartmentInformation($departmentId);";

            $resultSet = $mysqli->query($sqlQuery);

            return $resultSet;
        }
    }
}


?>