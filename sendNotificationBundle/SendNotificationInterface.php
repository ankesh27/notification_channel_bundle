<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
interface SendNotificationInterface
{
    public function sendNotification();
    
    public function sendNotificationTo();
    
    public function sendNotificationMessage();
}



?>
