<?php 
namespace HRApplication;

class Session{

    public function __construct(){
        // Start the session if it isnt set
        if (!isset($_SESSION)){
            session_start();
        }
    }

    /**
     * Set a session key/value pair
     * 
     * @param string $sessionKey
     * @param string $sessionValue
     */
    public function setSession($sessionKey, $sessionValue){
        $_SESSION[$sessionKey] = $sessionValue;
    }

    /**
     * Return the value of the session by key lookup
     * 
     * @param string $sessionKey 
     * 
     * @return string session value
     */
    public function getSessionValue($sessionKey){
        if (isset($_SESSION[$sessionKey])){
            return $_SESSSION[$sessionKey];
        }
    }
}


?>