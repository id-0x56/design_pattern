<?php

interface INotification
{
    public function send($message);
}

class EmailNotification implements INotification
{
    public function send($message)
    {
        echo 'Email: ' . $message;
    }
}

class NotificationService
{
    private $notification;

    public function __construct(INotification $notification)
    {
        $this->notification = $notification;
    }

    public function run($message)
    {
        return $this->notification->send($message);
    }
}

$email = new EmailNotification();
$notificationService = new NotificationService($email);

$notificationService->run('Hello World!');
