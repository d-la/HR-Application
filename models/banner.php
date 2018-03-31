<?php

class Banner{
  private $currentStatus;
  private $bannerHtml;
  private $bannerMessage;

  public function setStatus($status){
    $this->currentStatus = $status;
  }

  public function setMessage($message){
    $this->bannerMessage = $message;
  }

  public function unsetMessage(){
    unset($this->bannerMessage);
  }

  public function getHtml(){
    if (isset($this->bannerMessage)){
      switch ($this->currentStatus){
        case 'success':
          $this->bannerHtml  = '<div class="alert alert-success fade in m-b-15">';
          $this->bannerHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
          $this->bannerHtml .= '<span aria-hidden="true">&times;</span></button>';

          $this->bannerHtml .= $this->bannerMessage;

          $this->bannerHtml .= '</div>';

          break;

        case 'warning':
          $this->bannerHtml  = '<div class="alert alert-warning fade in m-b-15">';
          $this->bannerHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
          $this->bannerHtml .= '<span aria-hidden="true">&times;</span></button>';

          $this->bannerHtml .= $this->bannerMessage;

          $this->bannerHtml .= '</div>';
          break;

        case 'error':
          $this->bannerHtml  = '<div class="alert alert-danger fade in m-b-15">';
          $this->bannerHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
          $this->bannerHtml .= '<span aria-hidden="true">&times;</span></button>';

          $this->bannerHtml .= $this->bannerMessage;

          $this->bannerHtml .= '</div>';

          break;

        default:
          break;
      }
    } else {
      return false;
    }

    return $this->bannerHtml;
  }
}



?>
