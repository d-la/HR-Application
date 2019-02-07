<?php
namespace HRApplication;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php';

class EmploymentType{

    private $employmentTypeId, $employmentTypeTitle;

    /**
     * Select all employment types from the database
     * 
     * @return object mysql Object
     */
    public function selectAllEmploymentTypes(){

        $mysqli = initializeMySqlConnection();

        $sqlQuery = 'CALL spSelectAllEmploymentTypes()';

        $resultSet = $mysqli->query($sqlQuery);

        return $resultSet;
    }
}

?>