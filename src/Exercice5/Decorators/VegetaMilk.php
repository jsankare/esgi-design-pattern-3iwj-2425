<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice5\Decorators;

class VegetaMilk extends BeverageDecorator
{
    public function getDescription(): string
    {
        return $this->beverage->getDescription() . ", VegetaMilk";
    }

    public function getCost(): float
    {
        return $this->beverage->getCost() + 1.00;
    }
}
