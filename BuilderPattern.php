<?php
// class Vihicle{
//     public Wheels $wheels;
//     public Color $color;
// }

interface Builder
{
    public function setWheels($wheels);
    public function setColor($color);
    public function getVehicle();
}


class CarBuilder implements Builder
{
    private $car;

    public function __construct()
    {
        $this->car = new Car(); // ConcreteProduct
    }
    
    public function setWheels($wheelsNumber)
    {
        $this->car->wheels = $wheelsNumber;
    }

    public function setColor($color)
    {
        $this->car->color = $color;
    }

    public function getVehicle()
    {
        return $this->car;
    }
}


class Director
{
    public $builder;

    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function buildVehicle()
    {
        return $this->builder->getVehicle();
    }
}


abstract class Vehicle
{
    private $wheels;
    private $color;
    public function getVehicle()
    {
        return $this;
    }
}


class Car extends Vehicle
{
}

$director = new Director();
$mercedesC300 = new CarBuilder();
$mercedesC300->setWheels('4');
$mercedesC300->setColor('red');
$director->setBuilder($mercedesC300);
$rs = $director->buildVehicle();
var_dump($rs) ;
