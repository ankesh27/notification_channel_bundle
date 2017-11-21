<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);


require_once('sendNotificationBundle/SendNotificationInterface.php');
require_once('NotificationChannel.php');
require_once('sendNotificationBundle/email/SendEmailNotification.php');
require_once('sendNotificationBundle/sms/SendSmsNotification.php');


class AnyRandomClass {
    
    
    public function sendEmail($dataArray)
    {
        $nc = new NotificationChannel();
        
        $nc->setChannel(new SendEmailNotification($dataArray));

        // send notification
        return $data = $nc->sendChannelNotification();

        
    }
    
    
    public function sendSms($dataArray)
    {
        $nc = new NotificationChannel();
        
        $nc->setChannel(new SendSmsNotification($dataArray));

        // send notification
        return $data = $nc->sendChannelNotification();
        
    }
    
    
}

$object = new AnyRandomClass();

//print_r($argv);
if(in_array('email',$argv))
{
    $dataArray = array
    (
        'to'=>"ankesh27@gmail.com",
        'name' => "Ankesh S",
        'message' => "Hi, this is a test emial for multiple channel notification",
        'subject' => "Test for multiple channel notification",
        'cc' => array('abc@abc.com', 'xyz@xyz.com')
    );

    
    
    echo $object->sendEmail($dataArray);
    
}

if(in_array('sms',$argv))
{
        $dataArray = array
    (
        'to'=>"919911504422",
        'name' => "Ankesh S",
        'message' => "Hi, this is a test sms for multiple channel notification",
    );

    echo $object->sendSms($dataArray);
}

?>