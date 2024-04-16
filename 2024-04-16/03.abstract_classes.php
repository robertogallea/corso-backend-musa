<?php

// CLASSI ASTRATTE


abstract class Shape
{
    abstract public function getArea(): float;

    public function otherMethod()
    {
        echo 'Questo è un metodo concreto all\'interno di una classe astratta' . "\n";
    }

    public function areaDouble()
    {
        return $this->getArea() * 2;
    }
}

// $shape1 = new Shape; // genera un errore, non posso istanziare una classe astratta

class Square extends Shape
{
    public float $side;

    public function getArea(): float
    {
        return $this->side * $this->side;
    }
}

$shape2 = new Square;
$shape2->side = 2.5;

echo $shape2->getArea() . "\n";

class Triangle extends Shape
{
    public float $base;
    public float $height;

    public function getArea(): float
    {
        return $this->base * $this->height / 2;
    }
}

$shape3 = new Triangle;
$shape3->base = 3;
$shape3->height = 5;

echo $shape3->getArea() . "\n";

echo $shape3->areaDouble() . "\n";