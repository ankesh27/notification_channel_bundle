<?php

/*
 * Extended Interface only use for sending the emails
 * Add as many methods as available in the base Email class
 *
 */
interface SendNotificationEmailInterface
{
    public function sendNotificationEmailSubject();
    
    public function sendNotificationEmailCC();
    
    public function sendNotificationEmailReplyTo();
    
    public function sendNotificationEmailFrom();
    
    public function sendNotificationEmailBcc();
    
    // We can add all features of email like attachment / Headers etc
}



?>
