<?php

interface INotification
{
    public function send($message);
}

class Notification implements INotification
{
    public function send($message)
    {
        //
    }
}

abstract class NotificationDecorator implements INotification
{
    protected $notifier;

    public function __construct(INotification $notifier)
    {
        $this->notifier = $notifier;
    }
}

class EmailNotification extends NotificationDecorator
{
    public function send($message)
    {
        echo 'Email notification: ' . $message . '<br/>';
        $this->notifier->send($message);
    }
}

$decorator = new EmailNotification(
    new Notification()
);
$decorator->send('Hello world');
