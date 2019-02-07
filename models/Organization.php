<?php 
namespace HRApplication;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/mysqlconn.php';

class Organization{

    private $organizationId, $organizationName, $organizationDesc;

    private $addressId, $street1, $street2, $city, $state, $zip;

    public function __construct(){

    }

    // Setters

    public function setOrganizationName($organizationName){
        if ( (is_string($organizationName)) && (!empty($organizationName)) ){
            $this->organizationName = $organizationName;
        }
    }

    public function setOrganizationDesc($organizationDesc){
        if ( (is_string($organizationDesc)) && (!empty($organizationDesc)) ){
            $this->organizationDesc = $organizationDesc;
        }
    }

    public function setStreet1($street1){
        if ( (is_string($street1)) && (!empty($street1)) ){
            $this->street1 = $street1;
        }
    }

    public function setStreet2($street2){
        if ( (is_string($street2)) && (!empty($street2)) ){
            $this->street2 = $street2;
        }
    }

    public function setCity($city){
        if ( (is_string($city)) && (!empty($city)) ){
            $this->city = $city;
        }
    }

    public function setState($state){
        if ( (is_string($state)) && (!empty($state)) ){
            $this->state = $state;
        }
    }

    public function setZip($zip){
        if ( (is_string($zip)) && (!empty($zip)) ){
            $this->zip = $zip;
        }
    }

    // Getters
    public function getOrganizationid(){
        return $this->organizationId;
    }

    public function getOrganizationName(){
        return $this->organizationName;
    }

    public function getOrganizationDesc(){
        return $this->organizationDesc;
    }

    public function getStreet1(){
        return $this->street1;
    }

    public function getStreet2(){
        return $this->street2;
    }

    public function getCity(){
        return $this->city;
    }

    public function getState(){
        return $this->state;
    }

    public function getZip(){
        return $this->zip;
    }

    /**
     * 
     * @param string $organizationName: name of the organization
     * @param string $organizationDesc: description of the organization
     * @param string $street1: main address of the organization
     * @param string $street2: suite number, etc
     * @param string $city
     * @param string $state 
     * @param string $zip
     * 
     * @return boolean true if the query is successful
     */
    public function insertNewOrganization($organizationName, $street1, $street2, $city, $state, $zip){
        // Hold all the data so we can loop through it to build the query
        $organizationData = array(
            $organizationName,
            $street1,
            $street2,
            $city,
            $state,
            $zip
        );

        // Initialize MySQL connection
        $mysqli = initializeMySqlConnection();

        // Start building the query
        $sqlQuery = "CALL spInsertNewOrganization(";
        foreach ($organizationData as $arrayKey => $organizationValue){
            $sqlQuery .= "'" . addslashes($mysqli->real_escape_string($organizationValue)) . "', ";
        }
        // Remove trailing comma and whitespace
        $sqlQuery = substr($sqlQuery, 0, strlen($sqlQuery) - 2);
        $sqlQuery .= ');';

        $result = $mysqli->query($sqlQuery);

        return $result;
    }
}


?>