<?php 
namespace App\User;
class Schedule{
    private $assignedUserId, $startDate, $endDate, $startTime, $endTime;

    public function setAssignedUser($assignedUser){
        $this->assignedUserId = (is_numeric($assignedUser)) ? $assignedUser : false;
    }
    
    public function setStartDate($startDate){
        $this->startDate = is_time($startDate) ? $startDate : false;
    }
}





?>