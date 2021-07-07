<?php

interface IAdaptee
{
    public function request();
}

class Adaptee implements IAdaptee
{
    public function request()
    {
        return __CLASS__ . '::' . __METHOD__;
    }
}

interface ITarget
{
    public function query();
}

class Adapter implements ITarget
{
    protected $adaptee;

    public function __construct()
    {
        $this->adaptee = new Adaptee();
    }

    public function query()
    {
        return $this->adaptee->request();
    }
}

$target = new Adapter();
echo $target->query();
