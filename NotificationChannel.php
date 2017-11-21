<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class NotificationChannel
{
    
    private $channel;

    public function setChannel(SendNotificationInterface $sendType)
    {
        $this->channel = $sendType;
    }

    public function sendChannelNotification()
    {
        return $this->channel->sendNotification();
    }
}
?>