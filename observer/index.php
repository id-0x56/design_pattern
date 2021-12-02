<?php

interface IObserver
{
    public function update(): void;
}

interface ISubject
{
    public function attach(IObserver $observer): void;
    public function detach(IObserver $observer): void;
    public function notify(): void;
}

class Subject implements ISubject
{
    private $observers = [];

    public function attach(IObserver $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(IObserver $observer): void
    {
        //
    }

    public function notify(): void
    {
        echo 'Subject: Notifying observers...';
        echo '<br>';

        foreach($this->observers as $observer) {
            $observer->update();
        }
    }
}

class ObserverFirst implements IObserver
{
    public function __construct(ISubject $subject)
    {
        $subject->attach($this);
    }

    public function update(): void
    {
        echo 'ObserverFirst: Updates comes!';
        echo '<br>';
    }
}

class ObserverSecond implements IObserver
{
    public function __construct(ISubject $subject)
    {
        $subject->attach($this);
    }

    public function update(): void
    {
        echo 'ObserverSecond: Updates comes!';
        echo '<br>';
    }
}

$subject = new Subject();

$observerFirst = new ObserverFirst($subject);
$observerSecond = new ObserverSecond($subject);

$subject->notify();
