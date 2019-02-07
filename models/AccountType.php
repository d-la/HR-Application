<?php
namespace HRApplication;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php';

class AccountType{

    private $accountTypeId, $accountTitle;

    /**
     * Select all employment types from the database
     * 
     * @return object mysql Object
     */
    public function selectAllAccountTypes(){

        $mysqli = initializeMySqlConnection();

        $sqlQuery = 'CALL spSelectAllAccountTypes()';

        $resultSet = $mysqli->query($sqlQuery);

        return $resultSet;
    }
}

?>