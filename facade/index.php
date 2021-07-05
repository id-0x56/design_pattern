<?php

class Airplane
{
    public function getPower()
    {
        echo 'Getting power';
    }

    public function blink()
    {
        echo 'Blinking lights';
    }

    public function makeNoise()
    {
        echo 'Beep beep beep';
    }

    public function leaveTheGround()
    {
        echo 'Leaving the ground';
    }

    public function getBackOnTheGround()
    {
        echo 'Getting back on the ground';
    }

    public function turnOffEngine()
    {
        echo 'Turning engine off';
    }

    public function switchOffTheLights()
    {
        echo 'Switching off the lights';
    }
}

class AirplaneFacade
{
    protected $airplane;

    public function __construct(Airplane $airplane)
    {
        $this->airplane = $airplane;
    }

    public function takeOff()
    {
        $this->airplane->getPower();
        $this->airplane->blink();
        $this->airplane->makeNoise();
        $this->airplane->leaveTheGround();
    }

    public function landOn()
    {
        $this->airplane->getBackOnTheGround();
        $this->airplane->turnOffEngine();
        $this->airplane->switchOffTheLights();
    }
}

$airplane = new AirplaneFacade(new Airplane());

$airplane->takeOff();
$airplane->landOn();
