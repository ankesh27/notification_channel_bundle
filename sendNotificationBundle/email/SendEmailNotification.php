<?php
require_once('SendNotificationEmailInterface.php');
require_once('Email.php');

/**
 * To send email notification 
 * 
 * 
 * 
 *
 *
 */
class SendEmailNotification extends Email implements SendNotificationInterface, SendNotificationEmailInterface
{
    private $dataArray;
    
    
    function __construct($array) {
        $this->dataArray = $array;
    }
    
    
    public function sendNotificationTo()
    {
        $email = "";
        $name = "";
        if(!empty($this->dataArray['to']))
        {
            $email = $this->dataArray['to'];
        }
        
        if(!empty($this->dataArray['name']))
        {
            $name = $this->dataArray['name'];
        }
        $this->setTo($email, $name);
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
    
    
    public function sendNotificationEmailCC()
    {
        $pairs = array();
        if(!empty($this->dataArray['cc']) && is_array($this->dataArray['cc']))
        {
            $pairs = $this->dataArray['cc'];
            $this->setCc($pairs);
        }
        
        
    }
    
    
    public function sendNotificationEmailSubject()
    {
        $subject = "";
        if(!empty($this->dataArray['subject']))
        {
            $subject = $this->dataArray['subject'];
        }
        
        $this->setSubject($subject);
    }
    
    
    public function sendNotificationEmailReplyTo()
    {
        $replyto = "";
        $replytoName = "";
        if(!empty($this->dataArray['replyto']))
        {
            $replyto = $this->dataArray['replyto'];
        }
        if(!empty($this->dataArray['replytoname']))
        {
            $replytoName = $this->dataArray['replytoname'];
        }
        $this->setReplyTo($replyto, $replytoName);
    }
    
    public function sendNotificationEmailFrom()
    {
        $fromEmail = "";
        $fromName = "";
        if(!empty($this->dataArray['fromemail']))
        {
            $fromEmail = $this->dataArray['fromemail'];
        }
        if(!empty($this->dataArray['fromname']))
        {
            $fromName = $this->dataArray['fromname'];
        }
        $this->setReplyTo($fromEmail, $fromName);
    }
    
    public function sendNotificationEmailBcc()
    {
        if(!empty($this->dataArray['bcc']) && is_array($this->dataArray['bcc']))
        {
            $pairs = $this->dataArray['bcc'];
            $this->setBcc($pairs);
        }
        
        
        
    }
    
    private function setAllVars()
    {
        // set to address
        $this->sendNotificationTo();
        
        // set message
        $this->sendNotificationMessage();
        
        // set subject
        $this->sendNotificationEmailSubject();
        
        // set cc
        $this->sendNotificationEmailCC();
        
        // set bcc
        $this->sendNotificationEmailBcc();
        
        // set email from address/name
        $this->sendNotificationEmailFrom();
        
        // set reply to address/name
        $this->sendNotificationEmailReplyTo();
        
        // ++ add all other params
    }
    
    public function sendNotification()
    {
        
        $this->setAllVars();
        $this->send();
        return "EOK";
    }
    
    
    
}

?>