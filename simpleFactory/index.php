<?php

class Bicycle
{
    public function driveTo(string $destination)
    {
        //
    }
}

class Car
{
    public function driveTo(string $destination)
    {
        //
    }
}

class SimpleFactory
{
    public function createBicycle() : Bicycle
    {
        return new Bicycle();
    }

    public function createCar() : Car
    {
        return new Car();
    }
}

$bicycle = (new SimpleFactory())->createBicycle();
$car = (new SimpleFactory())->createCar();

echo '<pre>';
    var_dump($bicycle);
    var_dump($car);
echo '</pre>';
