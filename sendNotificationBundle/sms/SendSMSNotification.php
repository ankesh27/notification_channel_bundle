<?php
require_once('Sms.php');

/**
 * To send email notification 
 * 
 * 
 * 
 *
 *
 */
class SendSmsNotification extends Sms implements SendNotificationInterface
{
    private $dataArray;
    
    
    function __construct($array) {
        $this->dataArray = $array;
    }
    
    
    public function sendNotificationTo()
    {
        $to = "";
        if(!empty($this->dataArray['to']))
        {
            $to = $this->dataArray['to'];
        }
        
        
        $this->setTo($to);
    }
    
    
    public function sendNotificationMessage()
    {
        $message = "";
        if(!empty($this->dataArray['message']))
        {
            $message = $this->dataArray['message'];
        }
        
        $this->setMessage($message);
    }
    
    
    private function setAllVars()
    {
        // set to address
        $this->sendNotificationTo();
        
        // set message
        $this->sendNotificationMessage();
        
        // set subject
        
        // ++ add all other params
    }
    
    public function sendNotification()
    {
        
        $this->setAllVars();
        
        
        $this->send();
        return "SOK";
    }
    
}

?>