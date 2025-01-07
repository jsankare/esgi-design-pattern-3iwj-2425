<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5\Decorators;

class Syrup extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ", Syrup";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 0.75;
    }
}
