<?php 

class AlertBanner{

    private $allowedAlertTypes = array('success', 'warning', 'error');
    
    private $alertType, $alertMessage, $alertHtml, $alertTypeClass;


    public function __construct($alertType, $alertMessage = null){
        if (!empty($alertType) && (in_array($alertType, $this->allowedAlertTypes))){
            $this->alertType = $alertType;
        }

        if ( !is_null($alertMessage) && (is_string($alertMessage)) ){
            $this->alertMessage = $alertMessage;
        }
    }

    /**
     * Return the html for a banner. Alert type and message must be set
     * 
     * @return string html
     */
    public function getAlertBannerHtml(){
        $this->alertHtml = '';

        if ( isset($this->alertType) && (isset($this->alertMessage)) ){
            switch ($this->alertType){
                case 'success':
                    $this->alertTypeClass = 'alert-success';
                    break;
                
                case 'warning':
                    $this->alertTypeClass = 'alert-warning';
                    break;
                
                case 'error':
                    $this->alertTypeClass = 'alert-danger';
                    break;
            }
        }

        $this->alertHtml = '<div class="col-lg-12"><div class="alert ' . $this->alertTypeClass . ' alert-dismissible" role="alert">';
        $this->alertHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $this->alertHtml .= $this->alertMessage . '</div></div>';

        return $this->alertHtml;
    }

    /**
     * Set the alert message. Should be called before AlertBanner::getAlertBannerHtml
     * 
     * @param string $alertMessage: the message to be printed
     *
     */
    public function setAlertMessage($alertMessage){
        if (isset($alertMessage) && (is_string($alertMessage)) ){
            $this->alertMessage = $alertMessage;
        }
    }
}
?>